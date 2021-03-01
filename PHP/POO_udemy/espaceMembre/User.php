<?php


class User
{
    private $id;
    private $nom;
    private $prenom;
    private $tel;
    private $eMail;

    // **************************************** Bloc de gestion des erreurs de saisie ********************************

    // Tableau qui contiendra nos erreurs
    private $erreurs = [];

    const NOM_INVALIDE = 1;
    const PRENOM_INVALIDE = 2;
    const TEL_INVALIDE = 3;
    const EMAIL_INVALIDE = 4;



    // ****************************************************************************************************************

    public function __construct(array $user)
    {
        if (is_array($user))
        {
            if(empty($user))
            {
                $this->erreurs[] = [self::NOM_INVALIDE, self::PRENOM_INVALIDE, self::TEL_INVALIDE,self::EMAIL_INVALIDE];
            }
            else
            {
                $this->hydrate($user);
            }
        }
    }

    public function hydrate(array $user)
    {
        foreach ($user as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }
// ****************************************** SETTERS ***************************************************************
    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        if (!empty($id))
        {
            $this->id = (int) $id;
        }
    }
    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        if (!empty($nom) && is_string($nom))
            $this->nom = $nom;
        else
            $this->erreurs['nom'] = self::NOM_INVALIDE;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        if (!empty($prenom) && is_string($prenom))
            $this->prenom = $prenom;
        else
            $this->erreurs['prenom'] = self::PRENOM_INVALIDE;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel): void
    {
        if (!empty($tel) && is_string($tel))
            $this->tel = $tel;
        else
            $this->erreurs['tel'] = self::TEL_INVALIDE;
    }

    /**
     * @param mixed $eMail
     */
    public function setEmail($eMail): void
    {
        if (!empty($eMail) && filter_var($eMail, FILTER_VALIDATE_EMAIL))
            $this->eMail = $eMail;
        else
            $this->erreurs['email'] = self::EMAIL_INVALIDE;
    }

    // ******************************************************** GETTERS ***********************************************
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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->eMail;
    }

    /**
     * @return array
     */
    public function getErreurs(): array
    {
        return $this->erreurs;
    }

    public function isUserValid()
    {
        return empty($this->erreurs);
    }
}