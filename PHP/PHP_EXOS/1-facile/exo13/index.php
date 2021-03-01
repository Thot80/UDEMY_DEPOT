<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 13 : Tableaux et Fonctions"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php

function average($eleve)
{
   $somme = 0;
   $moyenne = 0;
   foreach($eleve as $note)
   {
      $somme += $note;
   }
   $moyenne = $somme / count($eleve);
   return $moyenne;
}

$Marc = [12,15,13,7,18];
$Matthieu = [11,14,10,4,20,8,2];
$Pierre = [5,13,9,3];
$Paul = [6,11,15,2];
echo "La moyenne des notes de <b>Marc</b> est de <b> ".average($Marc)."</b> <br>";
echo "La moyenne des notes de <b>Matthieu</b> est de <b> ".average($Matthieu)."</b> <br>";
echo "La moyenne des notes de <b>Pierre</b> est de <b> ".average($Pierre)."</b> <br>";
echo "La moyenne des notes de <b>Paul</b> est de <b> ".average($Paul)."</b> <br>";
?>


<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
