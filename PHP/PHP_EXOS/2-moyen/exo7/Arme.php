<?php


class Arme
{
    private $id;
    private $nom;
    private $degats;

    private static $compteur = 1;
    private static $listeArme = [];

    public function __construct($nom, $degats)
    {
        $this->id = self::$compteur;
        $this->setNom($nom);
        $this->setDegats($degats);
        self::$listeArme[self::$compteur] = [
            'ID' => $this->id,
            'nom' => $this->nom,
            'degats' => $this->degats
        ];
        self::$compteur++;
    }
    public static function getListeArme($id)
    {
        return self::$listeArme[$id];
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $degats
     */
    public function setDegats($degats): void
    {
        $this->degats = $degats;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
    public function getDegats()
    {
        return $this->degats;
    }
}

