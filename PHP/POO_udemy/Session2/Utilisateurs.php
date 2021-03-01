<?php
class Utilisateurs
{
    // Attribut pour nos utilisateurs
    protected $nom;
    protected $prenom;
    protected $age;
    protected $email;

    // Déclaration de constantes de classe, appartiennent à la classe mais ne peuvent pas être modifiées
    // On y accède également via l'opérateur self::
    const NREF_BASSE = 10;
    const NREF_HAUTE = 15;

    public function __construct($nom, $prenom, $age, $email)
    {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setAge($age);
        $this->setEmail($email);
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
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $this->email = $email;
        }
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
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

}