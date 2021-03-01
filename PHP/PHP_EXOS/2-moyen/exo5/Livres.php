<?php


class Livres
{
    private $nom;
    private $edition;
    private $auteur;
    private $dateParution;


    public function __construct($nom, $edition, $auteur, $dateParution)
    {
        $this->setNom($nom);
        $this->setEdition($edition);
        $this->setAuteur($auteur);
        $this->setDateParution($dateParution);
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $edition
     */
    public function setEdition($edition): void
    {
        $this->edition = $edition;
    }

    /**
     * @param mixed $auteur
     */
    public function setAuteur($auteur): void
    {
        $this->auteur = $auteur;
    }

    /**
     * @param mixed $dateParution
     */
    public function setDateParution($dateParution): void
    {
        $this->dateParution = $dateParution;
    }

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
    public function getAuteur()
    {
        return $this->auteur;
    }
    /**
     * @return mixed
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * @return mixed
     */
    public function getDateParution()
    {
        return $this->dateParution;
    }
    public function getInfos()
    {
        echo '<br><hr> Nom : ' .$this->getNom(). '<br> Edition : ' .$this->getEdition(). '<br> Ateur : ' .$this->getAuteur(). '<br> Date : ' .$this->getDateParution();
    }
}