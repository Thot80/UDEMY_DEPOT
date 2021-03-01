<?php


class Produits
{
    // Attributs privés correspondants à nos champs de la BDD
    private $reference;
    private $name;
    private $price;

    // Ici, on déclare un attribut commun à toute la classe et no pas à un objet via le mot STATIC, on initialise cet attribut
    private static $remise = 20;

    // NomDeLaClasse::$attributStatic -> Permet d'accéder à l'attribut static
    // :: S'appelle l'operateur de portée

    public static function setRemise($remise)
    {
        self::$remise = $remise;
    }
    // Une fonction static est accessible depuis la classe, self est l'équivalent de $this mais pour les classes
    public static function getRemise()
    {
        return self::$remise;
    }

    // Fonction pour retourner le prix après remise
    public function getNewPrice()
    {
        return ($this->price - (self::$remise)*($this->price)/100);
    }
    // Contructor
    public function __construct($reference, $name, $price)
    {
        $this->setReference($reference);
        $this->setName($name);
        $this->setPrice($price);
    }

    // Voici nos Setters
    public function setReference($reference)
    {
        $this->reference = $reference;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }

    // Getters
    public function getReference()
    {
        return $this->reference;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
}