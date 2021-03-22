<?php

class Role{

    private $id;
    private $personnage;
    private $castings = [];

    public function __construct($id, $personnage){

        $this->id = $id;
        $this->personnage = $personnage;
        
    }

    public function afficherRole(){
            $str = "Le rôle ". $this->personnage .' a été interpreté par : ';
            $str .= '<ul>';
            foreach($this->castings as $casting){
                $str .= '<li>'. $casting[1]->getTitre().' - Acteur :'. $casting[0]->getNom(). '</li>';    
            }
            $str .=  '</ul>';
            return $str;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of personnage
     */ 
    public function getPersonnage()
    {
        return $this->personnage;
    }

    /**
     * Set the value of personnage
     *
     * @return  self
     */ 
    public function setPersonnage($personnage)
    {
        $this->personnage = $personnage;

        return $this;
    }


    public function __toString(){
        return "<br/> Rôle : ".$this->personnage;
    }
    
    public function ajouterCasting(Acteur $acteur, Film $film){
        array_push($this->castings, [$acteur, $film]);
    }

    /**
     * Get the value of castings
     */ 
    public function getCastings()
    {
        return $this->castings;
    }
}