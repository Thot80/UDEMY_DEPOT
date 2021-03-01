<?php


class ArmesBis
{
    private $nom;
    private $chemin;
    private $description;
    private static $accents = ['À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë',
                            'Ì','Í','Î','Ï','Ò','Ó','Ô','Õ','Ö','Ù','Ú','Û','Ü','Ý',
                             'à','á','â','ã','ä','å','ç','è','é','ê','ë','ì',
                            'í','î','ï','ð','ò','ó','ô','õ','ö','ù','ú','û','ü','ý','ÿ'];

    public static $sansAccents = ['A','A','A','A','A','A','C','E','E','E','E','I','I','I',
                                'I','O','O','O','O','O','U','U','U','U','Y','a','a','a','a',
                                'a','a','c','e','e','e','e','i','i','i','i','o','o','o','o','o',
                                    'o','u','u','u','u','y','y'];

    public function __construct($nom, $description)
    {
        $this->setNom($nom);
        $this->setChemin($nom);
        $this->setDescription($description);
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @param string $chemin
     */
    public function setChemin(string $nom): void
    {
        switch ($nom)
        {
            case 'épée':
                $alea = rand(1,5);
                break;
            case 'arc':
                $alea = rand(1,2);
                break;
            case 'hache':
                $alea = rand(1,5);
                break;
            case 'fleau':
                $alea = rand(1,5);
                break;
        }
        $this->chemin =  'sources/'.str_replace(self::$accents, self::$sansAccents, $nom).'/'.str_replace(self::$accents, self::$sansAccents, $nom).$alea.'.png';
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
    public function getChemin()
    {
        return $this->chemin;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    // Méthode 'magique', permet de faire un echo sur un objet
    public function __toString()
    {
        $text ='Arme : '.$this->getNom().'<br>';
        $text .= 'Description : '.$this->getDescription().'<br>';
        $text .= 'Chemin : '.$this->getChemin().'<br>';
        return $text;
    }
}