<?php


class Personne
{
    // Attributs
    protected $nom;
    protected $prenom;

    // Constructor
    public function __construct($nom, $prenom)
    {
        $this->setNom($nom);
        $this->setPrenom($prenom);
    }

    // Setters

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    // Getters

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
}