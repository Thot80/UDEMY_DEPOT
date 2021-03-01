<?php


class agentBanquier
{
    // Attributs
    private $nom;
    private $prenom;
    private $grade;
    private $lieuTravail;

    // Constructeur
    public function __construct($nom, $prenom, $grade, $lieu)
    {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setGrade($grade);
        $this->setLieuTravail($lieu);

    }

    // Setters
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }
    public function setLieuTravail($lieu)
    {
        $this->lieuTravail = $lieu;
    }


    // Getters
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getGrade()
    {
        return $this->grade;
    }
    public function getLieuTravail()
    {
        return $this->lieuTravail;
    }
}