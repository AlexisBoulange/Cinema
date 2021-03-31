<?php

class Film
{
    private $id;
    private $titre;
    private $realisateur;
    private $release;
    private $duree;
    private $resume;
    private $note;
    private $imgPath;
    private $genres = [];
    private $castings = [];

    public function __construct($id, $titre, Realisateur $realisateur, $release, $duree, $note, $imgPath, $resume, Genre ...$genres)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->realisateur = $realisateur;
        $this->release = new Datetime($release);
        $this->duree = $duree;
        $this->note = $note;
        $this->imgPath = $imgPath;
        $this->resume = $resume;
        $this->genres = $genres;

        $this->realisateur->ajouterFilm($this);
        foreach ($this->genres as $genre) {
            $genre->ajouterFilm($this);
        }
    }

    public function __toString()
    {
        $str = $this->titre . ' [' . $this->getRelease() . ' - ' . $this->getDuree() . '] réalisé par ' . $this->realisateur . '<br>';
        $str .= '<img src="' . $this->imgPath . '" /><br>';
        $str .= $this->resume . '<br>';
        $str .= 'Note: ' . $this->note . '/5</br> Genres: ';
        foreach ($this->genres as $genre) {
            $str .= $genre->getLibelle() . ', ';
        }
        $str .= '<br><ul>';
        foreach ($this->castings as $casting) {
            $str .= '<li>' . $casting[0]->getNom() . ' - ' . $casting[1]->getPersonnage() . '</li>';
        }
        $str .= '</ul>';
        return $str;
    }

    public function ajouterCasting(Acteur $acteur, Role $role)
    {
        array_push($this->castings, [$acteur, $role]);
    }

    /**
     * Get the value of release
     */
    public function getRelease()
    {
        return $this->release->format('d/m/Y');
    }

    /**
     * Get the value of duree
     */
    public function getDuree()
    {
        return floor($this->duree / 60) . 'h' . $this->duree % 60;
    }

    /**
     * Get the value of titre
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Get the value of genres
     */
    public function getGenres()
    {
        return var_dump($this->genres);
    }
}
