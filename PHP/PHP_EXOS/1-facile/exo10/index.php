<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 9 : Fonctions"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php

$monMot = "Coucou";
$monMotSansVoyelle = voyelleCut($monMot);

function voyelleCut ($chaine)
{
   $voyelle = ["a","e","i","o","u","y"];
   $resultat = str_replace($voyelle, "", $chaine);
   return $resultat;
}

echo voyelleCut($monMot);

?>


<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
