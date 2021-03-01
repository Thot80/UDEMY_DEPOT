<?php

class Annimalerie
{
    public $nom;
    public $age;
    public $type;

    public function __construct($nom, $age, $type)
    {
        $this->nom = $nom;
        $this->age = $age;
        $this->type = $type;
    }
    public function afficherAnnimalerie()
    {
        echo '<br> Nom : ' .$this->nom . '<br>  Age : ' . $this->age .'<br>  Type : '. $this->type."<br> <hr>";
    }
    
}