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

    public function findDetailActor($id, $edit = false)
    {

        $dao = new DAO;

        $sql = "SELECT a.acteur_id, CONCAT(a.prenom, ' ', a.nom) AS acteur, a.sexe, a.date_naissance, prenom, nom
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


        if(!$edit){
            require "views/acteur/detailActeur.php";
        }else {
            return $acteur;
        }
    }

    public function addActorForm(){
        require "views/acteur/ajouterActeurForm.php";

    }

    public function addActor($array){

        $dao = new DAO();

        $sql = "INSERT INTO acteur(nom, prenom, sexe, date_naissance)
        VALUES (:nom, :prenom, :sexe, :date_naissance)";

        $nom_acteur = filter_var($array['nom_acteur'], FILTER_SANITIZE_STRING);
        $prenom_acteur = filter_var($array['prenom_acteur'], FILTER_SANITIZE_STRING);
        $sexe = filter_var($array['sexe'], FILTER_SANITIZE_STRING);
        $date_naissance = filter_var($array['date_de_naissance'], FILTER_SANITIZE_STRING);

        $ajout = $dao->executerRequete($sql, [":nom" => $nom_acteur, ":prenom" => $prenom_acteur, ":sexe" => $sexe, ":date_naissance"  => $date_naissance]);

        require "views/acteur/ajouterActeur.php";
    }

    //Modifier un acteur

    public function editActeurForm($id){
        $acteur =  $this->findDetailActor($id, true);
        require "views/acteur/editActeur.php";
    }

    public function editActeur($id, $array){

        $dao = new DAO();

        $nom_acteur = filter_var($array['nom_acteur'], FILTER_SANITIZE_STRING);
        $prenom_acteur = filter_var($array['prenom_acteur'], FILTER_SANITIZE_STRING);

        $sql = "UPDATE acteur
                SET nom = :nom,
                prenom = :prenom
                WHERE acteur_id = :id";

        
        $modifier = $dao->executerRequete($sql, [":id" => $id, ":nom" => $nom_acteur, ":prenom" => $prenom_acteur]);

        header("Location: index.php?action=listActeurs");
    }

    //Supprimer Acteur

    public function deleteActeur($id){

        $dao = new DAO();

        $sql = "DELETE FROM acteur
                WHERE acteur_id = :id";

        $supprimer = $dao->executerRequete($sql, [':id' => $id]);

        require "views/acteur/deleteActeur.php";
    }
}
