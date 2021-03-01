<?php

// Pour faire dériver une classe à partir d'une interface, on utilise le mot clé implements
// Une même classe peut implémenter plusieurs interfaces
class Professeurs implements Personnels, Fonctionnaires
{
    private $nom;
    private $anciennete;
    private $indice;

    public function __construct($nom, $anciennete,$indice)
    {
        $this->setNom($nom);
        $this->setAnciennete($anciennete);
        $this->setIndice($indice);
    }
    public function passerExamen()
    {
        return true;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $anciennete
     */
    public function setAnciennete($anciennete): void
    {
        $this->anciennete = $anciennete;
    }

    /**
     * @param mixed $indice
     */
    public function setIndice($indice): void
    {
        $this->indice = $indice;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    public function getAnciennete()
    {
        return $this->anciennete;
    }

    public function getIndice()
    {
        return $this->indice;
    }

    public function calculerSalaire()
    {
        return 1000*(1+$this->getIndice());
    }
}