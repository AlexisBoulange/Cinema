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
    private $acteurs;
    private $genre;

    public function __construct($id, $titre, $anneeSortie, $duree, $realisateur, $resume, $note, $imgPath, Acteur $acteurs, Genre $genre){

        $this->id = $id;
        $this->titre = $titre;
        $this->anneeSortie = $anneeSortie;
        $this->duree = $duree;
        $this->realisateur = $realisateur;
        $this->resume = $resume;
        $this->note = $note;
        $this->imgPath = $imgPath;
        $this->acteurs = $acteurs;
        $this->genre = $genre;
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
        return $this->anneeSortie;
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
        return $this->duree;
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
     * Get the value of acteurs
     */ 
    public function getActeurs()
    {
        return $this->acteurs;
    }

    /**
     * Set the value of acteurs
     *
     * @return  self
     */ 
    public function setActeurs($acteurs)
    {
        $this->acteurs = $acteurs;

        return $this;
    }

    /**
     * Get the value of genre
     */ 
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of genre
     *
     * @return  self
     */ 
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }
    
    public function __toString(){
        return $this->id."<br/> Titre : ".$this->titre."<br/> Année : ".$this->anneeSortie."<br/> Durée : ".$this->duree. "<br/> Rélisateur : ".$this->realisateur."<br/> Résumé : ".$this->resume."<br/> Note : ".$this->note. "<br/> Acteur : " .$this->getActeurs()->getNom(). "<br/> Genre :" .$this->getGenre()->getType();
    }
}