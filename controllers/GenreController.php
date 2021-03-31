<?php 


require_once "bdd/DAO.php";

class GenreController{

    public function findGenres(){
        $dao = new DAO();

        $sql = "SELECT genre_id, libelle
                FROM genre g
                ORDER BY libelle ASC";

        $genres = $dao->executerRequete($sql); ;

        require "views/genre/listGenres.php";

    }


    public function findGenreFilm($id){
        $dao = new DAO();

        $sql = "SELECT DISTINCT g.genre_id, libelle, f.film_id, titre
                FROM genre g
                INNER JOIN possede p
                ON g.genre_id = p.genre_id
                INNER JOIN film f
                ON f.film_id = p.film_id
                WHERE g.genre_id = :id";

        $filmGenre = $dao->executerRequete($sql, [":id" => $id]); ;

        require "views/genre/detailGenre.php";

    }



    public function addGenreForm(){
        require "views/genre/ajouterGenreForm.php";

    }


    public function addGenre($array){

        $dao = new DAO();

        $sql = "INSERT INTO genre(libelle)
        VALUES (:libelle)";

        $libelle = filter_var($array['nom_du_genre'], FILTER_SANITIZE_STRING);

        $ajout = $dao->executerRequete($sql, [":libelle" => $libelle]);

        require "views/genre/ajouterGenre.php";
    }
}