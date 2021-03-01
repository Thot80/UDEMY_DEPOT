<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 5 : Boucle for"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php

$random = rand(5,15);

for ($i = 0; $i <= 10; $i++ )
{
    echo "$i * $random = ". ($i*$random)."<br/>";
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
