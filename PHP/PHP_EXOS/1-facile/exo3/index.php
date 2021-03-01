<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 3 : Les tests"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php

$nbreAlea = rand(1, 20);
$interval = "";
if($nbreAlea <= 5)
{
    $interval = " 0 et 5";
}
else if ($nbreAlea <= 10)
{
    $interval = " 6 et 10";
}
else if ($nbreAlea <= 15)
{
    $interval = " 11 et 15";
}
else 
{
    $interval = " 16 et 20";
}

echo "Le Nombre est " . $nbreAlea . "<br/>";
echo "Il est compris entre " . $interval;


?>

<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
