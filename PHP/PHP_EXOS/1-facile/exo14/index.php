<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 14 : Tableau de tableaux"; //Mettre le nom du titre de la page que vous voulez
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

$eleves = [$Marc, $Matthieu, $Pierre, $Paul];

foreach ($eleves as $index => $noteEleve)
{
   echo "La moyenne des notes du <b>$index ème</b> élève est de <b> ".average($noteEleve)."</b> <br>";
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
