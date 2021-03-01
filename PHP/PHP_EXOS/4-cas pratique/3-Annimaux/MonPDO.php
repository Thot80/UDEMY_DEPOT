<?php

class MonPDO
{
    private const HOST_NAME = 'localhost';
    private const DB_NAME = 'animaux';
    private const USER_NAME = 'root';
    private const PWD = '';

    private static $monPDO = null;

    public static function getPDO()
    {
        if (is_null(self::$monPDO))
        {
            $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
            try
            {
                $connexion = 'mysql:host='.self::HOST_NAME.';dbname='.self::DB_NAME.';charset=utf8';
                self::$monPDO = new PDO($connexion, self::USER_NAME, self::PWD, $option);
            }
            catch ( PDOException $e )
            {
                $message = 'Connexion impossible : ' .$e->getMessage();
                die($message);
            }
        }
        return self::$monPDO;
    }
}