<?php

class Role
{
    private $id;
    private $personnage;
    private $castings = [];

    public function __construct($id, $personnage)
    {
        $this->id = $id;
        $this->personnage = $personnage;
    }

    public function __toString()
    {
        return $this->personnage;
    }

    public function ajouterCasting(Acteur $acteur, Film $film)
    {
        array_push($this->castings, [$acteur, $film]);
    }

    public function afficherRole()
    {
        $str = "Le rôle " . $this->personnage . " a été interprété par:";
        $str .= '<ul>';
        foreach ($this->castings as $casting) {
            // index 0 = acteur et index 1 = film
            $str .= '<li>Acteur: ' . $casting[0]->getNom() . ' - Film: ' . $casting[1]->getTitre() . '</li>';
        }
        $str .= '</ul>';
        return $str;
    }

    /**
     * Get the value of castings
     */
    public function getCastings()
    {
        return var_dump($this->castings);
    }

    /**
     * Get the value of personnage
     */
    public function getPersonnage()
    {
        return $this->personnage;
    }
}
