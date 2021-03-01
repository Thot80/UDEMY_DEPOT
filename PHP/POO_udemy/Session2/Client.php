<?php


class Client extends Personne
{
    private $adresse;

    public function __construct($nom, $prenom, $adresse)
    {
        parent::__construct($nom, $prenom);
        $this->setAdresse($adresse);
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }


    // Méthode qui affiche les coordonnes complète du CLIENT
    public function getCoordonnee()
    {
        echo 'Nom : ' .$this->getNom(). '<br> Prénom : ' .$this->getPrenom(). '<br> Adresse : ' .$this->getAdresse(). '<br>';
    }
}