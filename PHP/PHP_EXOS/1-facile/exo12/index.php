<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 12 : Tableaux et Moyenne"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php

$notesMarc = [12, 15,13,7,18];
$notesMatthieu = [11,14,10,4,20,8,2];
$somme = 0;
foreach($notesMarc as $note)
{
   $somme += $note;
}
$moyenneMarc = $somme/count($notesMarc);

$somme = 0 ;

foreach($notesMatthieu as $note)
{
   $somme += $note;
}
$moyenneMatthieu = $somme/count($notesMatthieu);

echo "La moyenne des notes de <strong>Marc</strong> est de <strong>$moyenneMarc</strong> <br>";
echo "La moyenne des notes de <strong>Matthieu</strong> est de <strong>$moyenneMatthieu</strong>";
?>


<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
