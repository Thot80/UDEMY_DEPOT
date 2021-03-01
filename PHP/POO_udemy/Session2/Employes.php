<?php


class Employes
{
    private $nom;
    private $prenom;
    private $age;

    public function __construct($nom, $prenom, $age)
    {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setAge($age);

    }

    public function setNom($nom)
    {
        if (isset($nom))
        {
            $this->nom = $nom;
        }
        else {
             throw new Exception('Ce champ est obligatoire');
        }
    }
    public function setPrenom($prenom)
    {
        if(isset($prenom))
        {
            $this->prenom = $prenom;
        }
        else
        {
            throw new Exception('Ce champ est obligatoire');
        }
    }
    public function setAge($age)
    {
        if((isset($age)) &&(is_int($age)) && ($age>= 18) &&($age <= 65))
        {
            $this->age = $age;
        }
        else
        {
            throw new Exception('Ce champ est obligatoire, l\'âge est compri entre 18ans et 65 ans)');
        }
    }

}

