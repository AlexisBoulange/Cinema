<?php

class Acteur extends Individu{

    private $casting =[];
    
    public function __toString()
    {
        return 'Acteur : '. parent::__toString();
    }

    public function ajouterCasting(Role $role, Film $film){
        array_push($this->castings, [$role, $film]);
    }

    public function afficherRoles(){
        $str = $this->prenom . ' ' . $this-> nom . ' a joué dans : <br>';
        foreach ($this->castings as $casting){
            $str .= $casting[0]->getPersonnage() . ' - film : ' . $casting[1]->getTitre(). '<br>';
        }
        return $str;
    }

    public function getFilmographie(){
        $str = "L'acteur ". $this->prenom .' '. $this->nom. ' a joué dans : ';
        $str .= '<ul>';
        foreach($this->castings as $casting){
            $str .= '<li>'. $casting[1]->getTitre(). ' - '.$casting[0]->getPersonnage().'</li>';    
        }
        $str .=  '</ul>';
        return $str;
    }


    public function getNom(){
        return $this->prenom . ' ' . $this->nom;
    }
}