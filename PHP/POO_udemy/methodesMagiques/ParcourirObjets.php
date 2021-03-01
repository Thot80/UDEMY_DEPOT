<?php

// Les méthodes magiques sont des méthodes qui vont se déclencher automatiquement à la suite d'un évennement

// __construt() par exemple, se déclenche après l'instantiation d'un nouvel objet


// Imaginons que nous aillons la classe suivante :

class Etudiant
{
    private $nom;
    private $prenom;
    private $eMail;
    private $age;

    // ****************************************************** METHODES MAGIQUES ****************************************

    // Constructeur applelé lors de l'instanciation d'un objet
    public function __construct($nom, $prenom, $eMail, $age)
    {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setEMail($eMail);
        $this->setAge($age);
    }

    // Cette méthode s'execute chaque fois qu'une méthode n'a pas pu s'executer,
    // $methode prendra pour valeur le nom de la méthode en question
    // $arguments sera un tableau contenant tous les arguments passés en paramètre
    public function __call($methode, $arguments)
    {
        echo $methode . ' n\'existe pas ou n\'est pas accessible';
        echo '<br> Arguments : ' . implode('/', $arguments); // implode transforme un tableau en chaine de caractère
    }

    // S'éxecute si on essaye d'accéder à un attribut qui n'existe pas ou qui n'est pas accessible
    // $attribut prend le nom de l'attribut en question
    public function __get($attribut)
    {
        // Code ici
    }

    // Se déclenche si on essaye d'assigner une valeur à un attribut qui n'existe pas ou qui est inaccessible
    public function __set($attribut, $valeur)
    {
        //mettre code ici
    }

    // Cette fonction est invoquée lorsque que la fonction isset() est executée avec un attribut innexistant ou inaccessible
    public function __isset($attribut)
    {
        // Code
    }

    // unset() est une fonction qui sert à détruire une variable

    // S'exécute si on essaye de détruire un attribut qui n'existe pas ou inaccessible
    public function __unset($attribut)
    {
        // Code
    }

    // __toString() va s'executer quand on essaye de traiter un objet comme une chaine de charactère, doit retourner un String

    public function __toString()
    {
        $chaine = 'Mettre une chaine ';
        $chaine .= $this->getNom(); // Etc...
        return $chaine;
    }

    // __invoke(), s'execute lorsqu'on essaye d'utiliser un objet comme une fonction

    public function __invoke($argument)
    {
        // TODO: Implement __invoke() method.
    }




    // **************************************************************************************************************************


    // On peut écrire une méthode qui nous permet de parcourir nos objets comme un tableau associatif

    public function parcourirObjet()
    {
        foreach ($this as $attribut => $valeur)
        {
            echo $attribut.' => '.$valeur.'<br>';
        }
    }

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

    /**
     * @param mixed $eMail
     */
    public function setEMail($eMail): void
    {
        $this->eMail = $eMail;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getEMail()
    {
        return $this->eMail;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }
}
$test = new Etudiant('Kessous', 'Jérémy', 'jeremykessou@yahoo.fr', 32);
$test->parcourirObjet();;

