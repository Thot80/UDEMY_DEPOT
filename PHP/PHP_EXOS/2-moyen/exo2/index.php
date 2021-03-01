<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exercice 2 : Fichier de fonctions et tableaux"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->

<?php

require("fonction.php");
$tableau1 = [2, 6, 10, 20, 9, 14];
$tableau2 = [4, 8, 2, 26, 18, 14];

?>

<div class="container">
<div class="row">
<div class="col-6">
<h2>Tableau 1 :</h2>
<?= afficherTableau($tableau1); ?> <br>
<?= moyenneTableau($tableau1); ?> <br>
<?= estTableauPair($tableau1); ?> <br>
</div>

<div class="col-6">
<h2>Tableau 2 :</h2>
<?= afficherTableau($tableau2); ?> <br>
<?= moyenneTableau($tableau2); ?> <br>
<?= estTableauPair($tableau2); ?> <br>
</div>
</div> 
</div>

<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
