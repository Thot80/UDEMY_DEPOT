<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 7 : Switch"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php

$random = rand(1,12);

$mois = "";
switch ($random){
   case 1 :
      $mois = "Janvier";
   break;
   case 2 :
      $mois = "Février";
   break;
   case 3 :
      $mois = "Mars";
   break;
   case 4 :
      $mois = "Avril";
   break;
   case 5 :
      $mois = "Mai";
   break;
   case 6 :
      $mois = "Juin";
   break;
   case 7 :
      $mois = "Juillet";
   break;
   case 8 :
      $mois = "Août";
   break;
   case 9 :
      $mois = "Septembre";
   break;
   case 10 :
      $mois = "Octobre";
   break;
   case 11 :
      $mois = "Novembre";
   break;
   case 12 :
      $mois = "Décembre";
   break;
}

echo "Le mois <b>" . $random . " </b> en chiffre correspond au mois de <b>" . $mois . " </b>en lettre";
?>

<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
