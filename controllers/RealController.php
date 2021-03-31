<?php 

require_once "bdd/DAO.php";

class RealController{

    public function findReals()
    {

        $dao = new DAO;

        $sql = "SELECT realisateur_id, CONCAT(prenom, ' ', nom) AS realisateur, sexe, date_naissance
                FROM realisateur r
                ORDER BY realisateur ASC";
        $reals = $dao->executerRequete($sql);

        require "views/realisateur/listReal.php";
    }

    public function findOneById($id){

        $dao = new DAO;

        $sql = "SELECT realisateur_id, CONCAT(r.prenom, ' ', r.nom) AS realisateur, sexe, date_naissance
                FROM realisateur r
                WHERE r.realisateur_id = :id";
        $realisateur = $dao->executerRequete($sql, [":id"=> $id]);
                
        $sql2 = "SELECT f.realisateur_id, titre, f.film_id
                FROM realisateur r
                INNER JOIN film f
                ON f.realisateur_id = r.realisateur_id
                WHERE r.realisateur_id = :id";
        
        $filmoRea = $dao->executerRequete($sql2, [":id" => $id]);

        require "views/realisateur/detailReal.php";
    }

    public function addRealForm(){
        require "views/realisateur/ajouterRealForm.php";

    }


    public function addReal($array){

        $dao = new DAO();

        $sql = "INSERT INTO realisateur(nom, prenom, sexe, date_naissance)
        VALUES (:nom, :prenom, :sexe, :date_naissance)";

        $nom_realisateur = filter_var($array['nom_du_realisateur'], FILTER_SANITIZE_STRING);
        $prenom_realisateur = filter_var($array['prenom_du_realisateur'], FILTER_SANITIZE_STRING);
        $sexe = filter_var($array['sexe'], FILTER_SANITIZE_STRING);
        $date_naissance = filter_var($array['date_de_naissance'], FILTER_SANITIZE_STRING);

        $ajout = $dao->executerRequete($sql, [":nom" => $nom_realisateur, ":prenom" => $prenom_realisateur, ":sexe" => $sexe, ":date_naissance"  => $date_naissance]);

        require "views/realisateur/ajouterRealisateur.php";
    }
    
}