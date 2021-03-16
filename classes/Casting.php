<?php
class Casting{


private $id;
private $prenom;
private $nom;
private $sexe;
private $dateNaissance;
private $role;

public function __construct($id, $prenom, $nom, $sexe, $dateNaissance, $role){

    $this->id = $id;
    $this->prenom = $prenom;
    $this->nom = $nom;
    $this->sexe = $sexe;
    $this->dateNaissance = $dateNaissance;
    $this->role = $role;
    
}