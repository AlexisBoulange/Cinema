<?php

class Casting
{
    private $id;
    private $acteur;
    private $role;
    private $film;

    public function __construct($id, Acteur $acteur, Role $role, Film $film)
    {
        $this->id = $id;
        $this->acteur = $acteur;
        $this->role = $role;
        $this->film = $film;
        $this->role->ajouterCasting($acteur, $film);
        $this->acteur->ajouterCasting($role, $film);
        $this->film->ajouterCasting($acteur, $role);
    }

    public function __toString()
    {
        return $this->acteur->getNom() . ' (' . $this->role . ') - ' . $this->film->getTitre();
    }
}
