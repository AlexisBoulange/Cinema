<?php

class Acteur extends Individu
{
    private $castings = [];

    // Aucune propriété supplémentaire à gérer -> le constructeur parent va suffire

    public function __toString()
    {
        return 'Acteur: ' . parent::__toString();
    }

    //METHODES
    public function ajouterCasting(Role $role, Film $film)
    {
        array_push($this->castings, [$role, $film]);
    }

    public function getFilmographie()
    {
        $str = "L'acteur " . $this->prenom . " " . $this->nom . " a joué dans:";
        $str .= '<ul>';
        foreach ($this->castings as $casting) {
            // index 0 = role et index 1 = film
            $str .= '<li>' . $casting[1]->getTitre() . ' - rôle: ' . $casting[0]->getPersonnage() . '</li>';
        }
        $str .= '</ul>';
        return $str;
    }


    //GETTER

    public function getNom()
    {
        return $this->prenom . ' ' . $this->nom;
    }
}
