<?php

class Realisateur extends Individu
{
    private $films = [];
    // Aucune propriété supplémentaire à gérer -> le constructeur parent va suffire

    public function __toString()
    {
        return 'Réalisateur: ' . parent::__toString();
    }

    public function ajouterFilm(Film $film)
    {
        array_push($this->films, $film);
    }

    public function getRealisations()
    {
        $str = "Le réalisateur " . $this->prenom . " " . $this->nom . " a réalisé les films suivants: ";
        $str .= '<ul>';
        foreach ($this->films as $film) {
            $str .= '<li>' . $film->getTitre() . '</li>';
        }
        $str .= '</ul>';
        return $str;
    }
}
