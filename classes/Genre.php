<?php

class Genre{

    private $id;
    private $type;

    public function __construct($id, $type){

        $this->id = $id;
        $this->type = $type;
    }
    

    public function getLibelle(){
        $str = "Le réalisateur ". $this->prenom .' '. $this->nom. ' a réalisé les films suivants : ';
        $str .= '<ul>';
        foreach($this->films as $film){
            $str .= '<li>'. $film[1]->getTitre().'</li>';    
        }
        $str .=  '</ul>';
        return $str;
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
     * Get the value of type
     */ 
    public function gettype()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function settype($type)
    {
        $this->type = $type;

        return $this;
    }

    function __toString(){
        return $this->id." ".$this->type;
    }

}
?>