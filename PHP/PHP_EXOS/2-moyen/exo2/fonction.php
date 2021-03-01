<?php

function afficherTableau($tableau)
{
    for ($i = 0; $i < count($tableau); $i++)
    {
        if ($i != count($tableau) - 1)
        echo $tableau[$i] . ' - ';
        else
        echo $tableau[$i];
    }
}

function moyenneTableau($tableau)
{
    $somme = 0;
    foreach($tableau as $value)
    {
        $somme += $value;
    }
    return $somme/count($tableau);
}

function estTableauPair($tableau)
{
    foreach ($tableau as $value)
    {
        if ($value % 2 !== 0)
        {
            echo "Le tableau ne contient pas que des valeurs paires";
            return false;
            break;
        }
    }
    echo "Le tableau ne contient que des valeurs paires";
    // return true;
}