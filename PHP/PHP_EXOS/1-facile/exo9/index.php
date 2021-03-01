<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 9 : Fonctions"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
$a = 5;
$b = 122;

function parite($nombre){
   if ($nombre % 2 === 0){
      return true;
   }
   else{
      return false;
   }
}
echo (parite($a)) ? "Le nombre $a est pair" : "Le nombre $a est impair <br>";
echo (parite($b)) ? "Le nombre $b est pair" : "Le nombre $b est impair";
?>


<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
