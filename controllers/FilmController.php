<?php 


require_once "bdd/DAO.php";

class FilmController{

    public function findAll(){
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


        $films = $dao->executerRequete($sql); ;

        require "views/film/listFilms.php";

    }

    public function findDetailFilm($id){

        $dao = new DAO();

        $sql = "SELECT f.film_id, f.titre, DATE_FORMAT(f.sortie, ('%d/%m/%Y')) AS  date, CONCAT(FLOOR(f.duree/60),'h ',MOD(f.duree,60),'min') AS duree, f.affiche, GROUP_CONCAT(libelle ORDER BY libelle SEPARATOR ', ') AS genres
        FROM film f
        INNER JOIN possede p
        ON p.film_id = f.film_id
        INNER JOIN genre g
        ON g.genre_id = p.genre_id
        WHERE f.film_id = :id";

        $details = $dao->executerRequete($sql, [':id' => $id]); ;

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

        $rea = $dao->executerRequete($sql3, [':id' => $id]); ;

        $sql4 = "SELECT f.film_id, g.genre_id, GROUP_CONCAT(DISTINCT libelle ORDER BY libelle ASC SEPARATOR ', ') AS genres
        FROM film f
        INNER JOIN possede p
        ON p.film_id = f.film_id
        INNER JOIN genre g
        ON g.genre_id = p.genre_id
        WHERE f.film_id = :id
        GROUP BY p.genre_id";

        $genres = $dao->executerRequete($sql4, [':id' => $id]); ;

require "views/film/detailFilm.php";
    }
    


}