<?php

class Genre
{
    private $id;
    private $libelle;
    private $films = [];

    public function __construct($id, $libelle)
    {
        $this->id = $id;
        $this->libelle = $libelle;
    }

    public function __toString()
    {
        return $this->libelle;
    }

    public function ajouterFilm(Film $film)
    {
        array_push($this->films, $film);
    }

    public function getFilms()
    {
        $str = "Liste de films de genre " . $this->libelle . ": ";
        $str .= '<ul>';
        foreach ($this->films as $film) {
            $str .= '<li>' . $film->getTitre() . '</li>';
        }
        $str .= '</ul>';
        return $str;
    }

    /**
     * Get the value of libelle
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
}
