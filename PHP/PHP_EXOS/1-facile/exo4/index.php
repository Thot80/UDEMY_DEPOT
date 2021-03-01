<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 4 : Les tests"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php

$nbreAlea1 = rand(-100,100);
$nbreAlea2 = rand(-100,100);

if($nbreAlea1 <= $nbreAlea2) 
{
    $valAbs = $nbreAlea2 - $nbreAlea1;
}
else 
{
    $valAbs = $nbreAlea1 - $nbreAlea2;
}

echo "Le Nombre 1 est " . $nbreAlea1 . "<br/>";
echo "Le Nombre 2 est " . $nbreAlea2 . "<br/>";
echo "La valeur absolue est " . $valAbs;
if ($valAbs >= 25 && $valAbs <= 75)
{
    echo "<br/> La valeur absolue est comprise entre 25 et 75";
}


?>

<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
