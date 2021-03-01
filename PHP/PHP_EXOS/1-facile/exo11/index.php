<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 11 : Les tableaux"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php

$hommes = array("Mathieu", "Pierre", "Marc", "Jean");
$femmes = array("Morgane", "Mathilde", "Julie");

foreach($hommes as $key => $value)
{
   echo $key . " : " . $value . "<br>";
}

echo "<hr>";

foreach($femmes as $key => $value)
{
   echo $key . " : " . $value . "<br>";
}
echo "<hr>";
echo "Affichage avec la fonction print_r() <br>";
print_r($hommes);
echo "<br>";
print_r($femmes);
echo "<br>";


?>


<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
