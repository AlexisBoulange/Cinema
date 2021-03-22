<?php

class Realisateur extends Individu{

    private $films = [];

    public function __toString()
    {
        return 'Réalisateur : '. parent::__toString();
    }

    public function ajouterFilm(Film $film){
        array_push($this->film, [$film]);
    }

    public function getRealisations(){
        $str = "Le réalisateur ". $this->prenom .' '. $this->nom. ' a réalisé les films suivants : ';
        $str .= '<ul>';
        foreach($this->films as $film){
            $str .= '<li>'. $film[1]->getTitre().'</li>';    
        }
        $str .=  '</ul>';
        return $str;
    }
}