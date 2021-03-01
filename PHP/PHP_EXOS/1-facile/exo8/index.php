<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 8 : La boucle while"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php

$random = rand(1,20);
$compteur = 1 ;
while ($random <= 15)
{
   echo "Essaie $compteur : $random est trop petit (<15) <br>";
   $compteur+=1;
   $random = rand(1,20);
}
echo "Le chiffre choisi est $random";
?>


<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
