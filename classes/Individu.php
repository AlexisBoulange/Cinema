<?php

class Individu
{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $sexe;
    protected $naissance;

    public function __construct($id, $nom, $prenom, $sexe, $naissance)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->sexe = $sexe;
        $this->naissance = new Datetime($naissance);
    }


    public function __toString()
    {
        return $this->prenom . ' ' . $this->nom . ' (' . $this->getNaissance() . ')';
    }

    /**
     * Get the value of naissance
     */
    public function getNaissance()
    {
        return $this->naissance->format('d/m/Y');
    }
}
