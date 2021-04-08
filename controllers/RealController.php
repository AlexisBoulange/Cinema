<?php 

require_once "bdd/DAO.php";

class RealController{

    public function findReals()
    {

        $dao = new DAO;

        $sql = "SELECT realisateur_id, CONCAT(prenom, ' ', nom) AS realisateur,sexe
                FROM realisateur r
                ORDER BY realisateur ASC";
        $reals = $dao->executerRequete($sql);

        require "views/realisateur/listReal.php";
    }

    public function findOneById($id, $edit = false){

        $dao = new DAO;

        $sql = "SELECT realisateur_id, CONCAT(r.prenom, ' ', r.nom) AS realisateur, sexe, date_naissance, prenom, nom
                FROM realisateur r
                WHERE r.realisateur_id = :id";
        $realisateur = $dao->executerRequete($sql, [":id"=> $id]);
                
        $sql2 = "SELECT f.realisateur_id, titre, f.film_id
                FROM realisateur r
                INNER JOIN film f
                ON f.realisateur_id = r.realisateur_id
                WHERE r.realisateur_id = :id";
        
        $filmoRea = $dao->executerRequete($sql2, [":id" => $id]);

        if(!$edit){
            require "views/realisateur/detailReal.php";
        }else {
            return $realisateur;
        }
    }

    //Ajouter un réalisateur

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
    
    //Modifier un réalisateur

    public function editRealForm($id){
        $realisateur =  $this->findOneById($id, true);
        require "views/realisateur/editReal.php";
    }

    public function editReal($id, $array){

        $dao = new DAO();

        $nom_realisateur = filter_var($array['nom_du_realisateur'], FILTER_SANITIZE_STRING);
        $prenom_realisateur = filter_var($array['prenom_du_realisateur'], FILTER_SANITIZE_STRING);

        $sql = "UPDATE realisateur
                SET nom = :nom,
                prenom = :prenom
                WHERE realisateur_id = :id";

        
        $modifier = $dao->executerRequete($sql, [":id" => $id, ":nom" => $nom_realisateur, ":prenom" => $prenom_realisateur]);

        header("Location: index.php?action=listReal");
    }

    //Supprimer un genre

    public function deleteReal($id){

        $dao = new DAO();

        $sql = "DELETE FROM realisateur
                WHERE realisateur_id = :id";

        $supprimer = $dao->executerRequete($sql, [':id' => $id]);

        require "views/realisateur/deleteReal.php";
    }

}