<?php


class Armes
{
    public $nom;
    public $photo;
    public $description;
    public static $accents = ['À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë',
                            'Ì','Í','Î','Ï','Ò','Ó','Ô','Õ','Ö','Ù','Ú','Û','Ü','Ý',
                             'à','á','â','ã','ä','å','ç','è','é','ê','ë','ì',
                            'í','î','ï','ð','ò','ó','ô','õ','ö','ù','ú','û','ü','ý','ÿ'];

    public static $sansAccents = ['A','A','A','A','A','A','C','E','E','E','E','I','I','I',
                                'I','O','O','O','O','O','U','U','U','U','Y','a','a','a','a',
                                'a','a','c','e','e','e','e','i','i','i','i','o','o','o','o','o',
                                    'o','u','u','u','u','y','y'];

    public function __construct($nom, $description)
    {
        $this->nom = $nom;
        $this->photo = 'sources/'.str_replace(self::$accents, self::$sansAccents, $nom).'/'.str_replace(self::$accents, self::$sansAccents, $nom).'1.png';
        $this->description = $description;
    }
}