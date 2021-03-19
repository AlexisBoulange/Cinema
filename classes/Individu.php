<?php

class Individu{


    protected $id;
    protected $prenom;
    protected $nom;
    protected $sexe;
    protected $dateNaissance;
    protected $cast; 

    public function __construct($id, $prenom, $nom, $sexe, $dateNaissance, $cast){

        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->sexe = $sexe;
        $this->dateNaissance = $dateNaissance;
        $this->cast = $cast;
        
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
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of sexe
     */ 
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set the value of sexe
     *
     * @return  self
     */ 
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get the value of dateNaissance
     */ 
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set the value of dateNaissance
     *
     * @return  self
     */ 
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get the value of cast
     */ 
    public function getcast()
    {
        return $this->cast;
    }

    /**
     * Set the value of cast
     *
     * @return  self
     */ 
    public function setcast($cast)
    {
        $this->cast = $cast;

        return $this;
    }

    public function getAge(){
        $date1 = new DateTime ("now");
        $date2 = new DateTime ($this->getDateNaissance());
        $interval = $date1->diff($date2);
        $age = $interval->format('%y');
        return $age;
        
    }

    public function __toString(){
        return $this->id.
            "<br/> Prenom : ".$this->prenom.
            "<br/> Nom : ".$this->nom.
            "<br/> Sexe : ".$this->sexe.
            "<br/> Date de naissance : ".$this->dateNaissance." (".$this->getAge(). " ans)
            <br/> Rôle : ".$this->cast;
    }
}