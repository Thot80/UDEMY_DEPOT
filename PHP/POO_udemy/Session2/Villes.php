<?php


class villes
{
    private $nom;
    private $departement;
    private $region;
    private $nbreHabitant;

    public function __contruct($nom, $departement, $region, $nbreHabitant)
    {
        $this->setNom($nom);
        $this->setdepartement($departement);
        $this->setRegion($region);
        $this->setNbreHabitant($nbreHabitant);
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setdepartement($departement)
    {
        $this->departement = $departement;
    }


    public function setRegion($region)
    {
        $this->region = $region;
    }

    public function setNbreHabitant($nbreHabitant)
    {
        $this->nbreHabitant = $nbreHabitant;
    }
    public function affichageVille()
    {
        echo 'La ville '.$this->nom . ' dans le département ' .$this->departement. ' de la région ' .$this->region. ' a ' .$this->nbreHabitant. '<br>';
    }
}
