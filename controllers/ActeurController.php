<?php

require_once "bdd/DAO.php";

class ActeurController
{


    public function findActors()
    {

        $dao = new DAO;

        $sql = "SELECT  a.acteur_id, CONCAT(a.prenom, ' ', a.nom) AS acteur, a.sexe, a.date_naissance
                FROM acteur a
                ORDER BY acteur ASC";
        $acteurs = $dao->executerRequete($sql);

        require "views/acteur/listActeurs.php";
    }

    public function findDetailActor($id)
    {

        $dao = new DAO;

        $sql = "SELECT a.acteur_id, CONCAT(a.prenom, ' ', a.nom) AS acteur, a.sexe, a.date_naissance
                FROM acteur a
                WHERE a.acteur_id = :id";
        $acteur = $dao->executerRequete($sql, [":id" => $id]);

        $sql2 = "SELECT DISTINCT a.acteur_id, titre, f.film_id, CONCAT(a.prenom, ' ', a.nom) AS acteur
                FROM film f
                INNER JOIN casting c
                ON f.film_id = c.film_id
                INNER JOIN acteur a
                ON a.acteur_id = c.acteur_id
                WHERE a.acteur_id = :id";
        
        $filmoActeur = $dao->executerRequete($sql2, [":id" => $id]);

        require "views/acteur/detailActeur.php";
    }

    public function addActorForm(){
        require "views/acteur/ajouterActeurForm.php";

    }

    public function addActor($array){

        $dao = new DAO();

        $sql = "INSERT INTO acteur(nom, prenom, sexe, date_naissance)
        VALUES (:nom, :prenom, :sexe, :date_naissance)";

        $nom_acteur = filter_var($array['nom_du_acteur'], FILTER_SANITIZE_STRING);
        $prenom_acteur = filter_var($array['prenom_du_acteur'], FILTER_SANITIZE_STRING);
        $sexe = filter_var($array['sexe'], FILTER_SANITIZE_STRING);
        $date_naissance = filter_var($array['date_de_naissance'], FILTER_SANITIZE_STRING);

        $ajout = $dao->executerRequete($sql, [":nom" => $nom_acteur, ":prenom" => $prenom_acteur, ":sexe" => $sexe, ":date_naissance"  => $date_naissance]);

        require "views/acteur/ajouterActeur.php";
    }
}
