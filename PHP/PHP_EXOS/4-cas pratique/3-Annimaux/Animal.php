<?php


class Animal
{
    private $id;
    private $nom;
    private $age;
    private $sexe;
    private $type;
    private $images = [];

    public static $mesAnimaux = [];

    public function __construct($id, $nom, $age, $sexe, $type, $images)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->age = $age;
        $this->sexe = $sexe;
        $this->type = $type;
        $this->images = $images;
        self::$mesAnimaux[] = $this;
    }

    public function setId($id): void{$this->id = $id;}
    public function setNom($nom): void{$this->nom = $nom;}
    public function setAge($age): void{$this->age = $age;}
    public function setSexe($sexe): void{$this->sexe = $sexe;}
    public function setType($type): void{$this->type = $type;}
    public function setImages($images): void{$this->images = $images;}

    public function getId(){return $this->id;}
    public function getNom(){return $this->nom;}
    public function getAge(){return $this->age;}
    public function getSexe()
    {
        if($this->sexe == 0)
        {
            return 'Femelle';
        }
        else
        {
            return 'Male';
        }
    }
    public function getType(){return $this->type;}
    public function getImages(){return $this->images;}
}