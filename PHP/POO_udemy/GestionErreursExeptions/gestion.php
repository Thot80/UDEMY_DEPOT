<?php

function calculerProduit($a, $b)
{
    if ((!is_numeric($a)) || !is_numeric($b)) // Si $a ou $b ne sont pas des nombres
    {
        die('Cette fonction n\'accepte que des nombres en argument'); // die affiche le message et quitte le programme,
                                                                        // quitte tout le bloc php, pas juste celui de la fonction
    }
    else
    {
        return $a * $b;
    }
}