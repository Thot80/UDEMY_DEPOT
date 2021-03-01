<?php


class Auteur extends Utilisateurs
{
    private $note;
    private $avis;

    // Nous allons étendre le constructeur de la classe mère et l'adapter à la classe fille

    public function __construct($nom, $prenom, $age, $email, $note, $avis)
    {
        parent::__construct($nom, $prenom, $age, $email);
        $this->setNote($note);
        $this->setAvis($avis);
    }

    /**
     * @param mixed $note
     */
    public function setNote($note): void
    {
        $this->note = $note;
    }

    /**
     * @param mixed $avis
     */
    public function setAvis($avis): void
    {
        $this->avis = $avis;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @return mixed
     */
    public function getAvis()
    {
        return $this->avis;
    }
}