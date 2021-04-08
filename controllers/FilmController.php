<?php


require_once "bdd/DAO.php";

class FilmController
{

        public function findAll()
        {
                $dao = new DAO();

                $sql = "SELECT f.film_id, f.titre, DATE_FORMAT(f.sortie, ('%d/%m/%Y')) AS  date, CONCAT(FLOOR(f.duree/60),'h ',MOD(f.duree,60),'min') AS duree, f.affiche, r.realisateur_id, CONCAT(r.prenom, ' ', r.nom) AS realisateur, GROUP_CONCAT(libelle ORDER BY libelle SEPARATOR ', ') AS genres
                FROM film f
                INNER JOIN realisateur r
                ON f.realisateur_id = r.realisateur_id
                INNER JOIN possede p
                ON p.film_id = f.film_id
                INNER JOIN genre g
                ON g.genre_id = p.genre_id
                GROUP BY f.film_id
                ORDER BY titre ASC";


                $films = $dao->executerRequete($sql);;

                require "views/film/listFilms.php";
        }

        public function findDetailFilm($id)
        {

                $dao = new DAO();

                $sql = "SELECT f.film_id, f.titre, DATE_FORMAT(f.sortie, ('%d/%m/%Y')) AS  date, CONCAT(FLOOR(f.duree/60),'h ',MOD(f.duree,60),'min') AS duree, f.affiche, GROUP_CONCAT(libelle ORDER BY libelle SEPARATOR ', ') AS genres
                FROM film f
                INNER JOIN possede p
                ON p.film_id = f.film_id
                INNER JOIN genre g
                ON g.genre_id = p.genre_id
                WHERE f.film_id = :id";

                $details = $dao->executerRequete($sql, [':id' => $id]);;

                $sql2 = "SELECT a.acteur_id, CONCAT(a.prenom, ' ', a.nom) AS acteur, a.sexe, a.date_naissance, f.titre, r.personnage
                FROM acteur a
                INNER JOIN casting c
                ON a.acteur_id = c.acteur_id
                INNER JOIN film f
                ON f.film_id = c.film_id
                INNER JOIN role r
                ON r.role_id = c.role_id
                WHERE f.film_id = :id";
                $acteurs = $dao->executerRequete($sql2, [":id" => $id]);

                $sql3 = "SELECT f.film_id, r.realisateur_id, CONCAT(r.prenom, ' ', r.nom) AS realisateur
                FROM film f
                INNER JOIN realisateur r
                ON f.realisateur_id = r.realisateur_id
                WHERE f.film_id = :id";

                $rea = $dao->executerRequete($sql3, [':id' => $id]);;

                $sql4 = "SELECT f.film_id, g.genre_id, GROUP_CONCAT(DISTINCT libelle ORDER BY libelle ASC SEPARATOR ', ') AS genres
                FROM film f
                INNER JOIN possede p
                ON p.film_id = f.film_id
                INNER JOIN genre g
                ON g.genre_id = p.genre_id
                WHERE f.film_id = :id
                GROUP BY p.genre_id";

                $genres = $dao->executerRequete($sql4, [':id' => $id]);;

                require "views/film/detailFilm.php";
        }



        // Ajouter un film

        public function addFilmForm()
        {

                $dao = new DAO();

                $sql = "SELECT realisateur_id, CONCAT(prenom, ' ', nom) AS realisateur
                FROM realisateur r
                ORDER BY realisateur ASC";

                $reals = $dao->executerRequete($sql);

                $sql2 = "SELECT g.genre_id, libelle
                FROM genre g";
                $genres = $dao->executerRequete($sql2);

                require "views/film/ajouterFilmForm.php";
        }


        public function addFilm($array)
        {

                $dao = new DAO();

                $sql = "INSERT INTO film(titre, sortie, duree, realisateur_id)
                VALUES (:titre, :sortie, :duree, :realisateur_id)";

                $titre = filter_var($array['titre'], FILTER_SANITIZE_STRING);
                $sortie = filter_var($array['sortie'], FILTER_SANITIZE_STRING);
                $duree = filter_var($array['duree'], FILTER_SANITIZE_STRING);
                $realisateurId = filter_var($array['realisateur_id'], FILTER_SANITIZE_STRING);

                $ajout = $dao->executerRequete($sql, [":titre" => $titre, ":sortie" => $sortie, ":duree" => $duree, ":realisateur_id"  => $realisateurId]);

                $lastId = $dao->getBdd()->lastInsertId();


                $sql3 = "INSERT INTO possede(film_id, genre_id)
                VALUES (:film_id, :genre_id)";

                $genreFilm = filter_var_array($array['genre_id'], FILTER_SANITIZE_STRING);

                foreach ($genreFilm as $genreActuel) {
                        $ajout2 = $dao->executerRequete($sql3, [":film_id" => $lastId, ":genre_id" => $genreActuel]);
                }

                require "views/film/ajouterFilm.php";
        }

        public function editFilmForm($id)
        {

                $dao = new DAO();

                $sql = ("SELECT film_id, titre, sortie, duree, realisateur_id
                        FROM film f
                        WHERE film_id = :id");

                $edit1 = $dao->executerRequete($sql, [":id" => $id]);


                $sql2 = ("SELECT genre_id, film_id FROM possede WHERE film_id = :id");

                $edit2 = $dao->executerRequete($sql2, [":id" => $id]);

                $sql3 =  ("SELECT libelle, genre_id FROM genre");

                $edit3 = $dao->executerRequete($sql3);

                $sql4 = ("SELECT DISTINCT(CONCAT(prenom, ' ', nom)) AS 'realNom', realisateur_id FROM realisateur");

                $edit4 = $dao->executerRequete($sql4);

                require "views/film/editFilmForm.php";
        }

        public function editFilm($id, $array)
        {

                $titre_film = filter_var($array['titre'], FILTER_SANITIZE_STRING);
                $sortie_film = filter_var($array['sortie'], FILTER_SANITIZE_STRING);
                $duree_film = filter_var($array['duree'], FILTER_SANITIZE_STRING);;
                $realisateur_film = filter_var($array['realisateur'], FILTER_SANITIZE_STRING);
                $genref = filter_var_array($array['genre_id'], FILTER_SANITIZE_STRING);


                $dao = new DAO();

                $sql = "UPDATE film
                        SET titre = :titre,
                        sortie = :sortie,
                        duree = :duree,
                        realisateur_id= :realisateur
                        WHERE film_id = :id";

                $dao->executerRequete($sql, [
                        ":id" => $id,
                        ":titre" => $titre_film,
                        ":sortie" => $sortie_film,
                        ":duree" => $duree_film,
                        ":realisateur" => $realisateur_film
                ]);

                $sql2 = "DELETE FROM possede
                WHERE film_id = :id";
                $delete = $dao->executerRequete($sql2, [":id" => $id]);

                //On supprime tous les genres du films en questions pour les remettre ensuite

                $sql3 = "INSERT INTO possede(genre_id, film_id)
                VALUES (:idGenre, :idFilm)";

                foreach ($genref as $genreActuel) {
                        $genreActuel2 = filter_var($genreActuel, FILTER_SANITIZE_STRING);
                        $addGenre = $dao->executerRequete($sql3, [":idGenre" => $genreActuel2, ":idFilm" => $id]);
                }

                header("Location:index.php");
        }

        public function deleteFilm($id)
        {

                $dao = new DAO();
                $sql = "DELETE FROM casting
                        WHERE film_id = :id";
                $sql2 = "DELETE FROM possede
                        WHERE film_id = :id";
                $sql3 = "DELETE FROM film
                        WHERE film_id = :id";

                $supp = $dao->executerRequete($sql, [":id" => $id]);
                $supp = $dao->executerRequete($sql2, [":id" => $id]);
                $supp = $dao->executerRequete($sql3, [":id" => $id]);

                require "views/film/deleteFilm.php";
        }
}
