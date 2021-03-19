<?php

class Film{


    private $id;
    private $titre;
    private $anneeSortie;
    private $duree;
    private $realisateur;
    private $resume;
    private $note;
    private $imgPath;
    private $cast;
    private $genres = []; // tableau car plusieurs genres possibles
    private $_castings = [];

    public function __construct($id, $titre, $anneeSortie, $duree, $realisateur, $resume, $note, $imgPath, Casting $cast, Genre ...$genres){

        $this->id = $id;
        $this->titre = $titre;
        $this->anneeSortie = new Datetime ($anneeSortie);
        $this->duree = $duree;
        $this->realisateur = $realisateur;
        $this->resume = $resume;
        $this->note = $note;
        $this->imgPath = $imgPath;
        $this->cast = $cast;
        $this->genres = $genres;
    }

    // Méthode addCasting() qui va permettre de récupérer le casting et un tableau contenant l'acteur et le rôle

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
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of anneeSortie
     */ 
    public function getAnneeSortie()
    {
        return $this->anneeSortie->format('d/m/Y');
    }

    /**
     * Set the value of anneeSortie
     *
     * @return  self
     */ 
    public function setAnneeSortie($anneeSortie)
    {
        $this->anneeSortie = $anneeSortie;

        return $this;
    }

    /**
     * Get the value of duree
     */ 
    public function getDuree()
    {
        return floor($this->duree/60).'h'.$this->duree%60;
    }

    /**
     * Set the value of duree
     *
     * @return  self
     */ 
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get the value of realisateur
     */ 
    public function getRealisateur()
    {
        return $this->realisateur;
    }

    /**
     * Set the value of realisateur
     *
     * @return  self
     */ 
    public function setRealisateur($realisateur)
    {
        $this->realisateur = $realisateur;

        return $this;
    }

    /**
     * Get the value of resume
     */ 
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set the value of resume
     *
     * @return  self
     */ 
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get the value of note
     */ 
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set the value of note
     *
     * @return  self
     */ 
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get the value of imgPath
     */ 
    public function getImgPath()
    {
        return $this->imgPath;
    }

    /**
     * Set the value of imgPath
     *
     * @return  self
     */ 
    public function setImgPath($imgPath)
    {
        $this->imgPath = $imgPath;

        return $this;
    }

    /**
     * Get the value of cast
     */ 
    public function getCast()
    {
        return $this->cast;
    }

    /**
     * Set the value of cast
     *
     * @return  self
     */ 
    public function setCast($cast)
    {
        $this->cast = $cast;

        return $this;
    }

    /**
     * Get the value of genres
     */ 
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * Set the value of genres
     *
     * @return  self
     */ 
    public function setGenres($genres)
    {
        $this->genres = $genres;

        return $this;
    }
    
    public function __toString(){
        $str = $this->id."<br/> Titre : ".$this->titre."<br/> Année : ".$this->getAnneeSortie."<br/> Durée : ".$this->getDuree. "<br/> Rélisateur : ".$this->realisateur."<br/> Résumé : ".$this->resume."<br/> Note : ".$this->note. "<br/> Acteur : " .$this->getCast()->getActeurs(). "<br/> Genres :";
        foreach ($this->genres as $genre){
            $str .= $genre->getType(). ", ";
        }
        return $str;
    }
}