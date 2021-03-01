<?php


class Maison
{
    //********************************************* Atributs ***************************************************
    private $identifiant; // Pas de setter pour cet attribut, géré dans le constructeur via le compteur
    private $dateCreation; // Pas de setters non plus, géré dans le constructeur via
    private $surface;
    private $nombreChambre;
    private static $conteur = 1; // Accessible pour tous les objets de la classe

    // ******************************************* Constructeur ******************************************
    public function __construct($nombreChambre, $surface)
    {
        $this->identifiant = self::$conteur;
        $this->dateCreation = new DateTime();
        $this->setNombreChambre($nombreChambre);
        $this->setSurface($surface);
        self::$conteur++;
    }
    // ******************************************* Stteur ************************************************
    /**
     * @param mixed $surface
     */
    public function setSurface($surface): void
    {
        $this->surface = $surface;
    }

    /**
     * @param mixed $nombreChambre
     */
    public function setNombreChambre($nombreChambre): void
    {
        $this->nombreChambre = $nombreChambre;
    }

    /**
     * @param DateTime $dateCreation
     */
    public function setDateCreation(DateTime $dateCreation): void
    {
        $this->dateCreation = $dateCreation;
    }
    // ******************************************* Getteur **********************************************

    /**
     * @return mixed
     */
    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @return mixed
     */
    public function getNombreChambre()
    {
        return $this->nombreChambre;
    }
    /**
     * @return mixed
     */
    public function getSurface()
    {
        return $this->surface;
    }

    /**
     * @return mixed
     */
    public static function getConteur()
    {
        return self::$conteur;
    }
}