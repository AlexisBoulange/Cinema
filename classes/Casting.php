<?php
class Casting
{


    private $id;
    private $film;
    private $acteurs;
    private $role;

    public function __construct($id, Film $film, Acteur $acteurs, Role $role)
    {

        $this->id = $id;
        $this->film = $film;
        $this->acteurs = $acteurs;
        $this->role = $role;
        $this->role->ajouterCasting($acteurs, $film);

        // appeler la méthode addCasting de film
        // idem pour rôle et l'acteur
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
     * Get the value of film
     */
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * Set the value of film
     *
     * @return  self
     */
    public function setFilm($film)
    {
        $this->film = $film;

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
     * Set the value of _acteurs
     *
     * @return  self
     */
    public function setActeurs($acteurs)
    {
        $this->acteurs = $acteurs;

        return $this;
    }

    /**
     * Get the value of role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    public function getActeur(){
        $this->_acteurs->getNom()->getPrenom();
    }

    public function __toString()
    {
        return $this->id .
            "<br/> Film : " . $this->film .
            "<br/> Acteurs : " . $this->acteurs->getPrenom(). " ". $this->acteurs->getNom() .
            "<br/> Rôle : " . $this->role->getRole();
    }
}
