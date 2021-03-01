<?php ob_start(); //NE PAS MODIFIER
$titre = "Partie 4 : Approche orientée objet"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->

<?php
require 'Armes.php';
$arme1 = new Armes('épée', 'Une arme tranchante');
$arme2 = new Armes('arc', 'Une arme à distance');
$arme3 = new Armes('hache', 'Une arme tranchante affectionnée par les nains');
$arme4 = new Armes('fleau', 'Une arme tranchante');

$armes = [$arme1, $arme2, $arme3, $arme4];
?>
<table class="table">
   <?php foreach ($armes as $arme):?>
    <tr>
        <td><img src="<?=$arme->photo?>" alt="Photo d'une arme"></td>
        <td><b><?=$arme->nom?></b> <br> <?= $arme->description?></td>
    </tr>
    <?php
    endforeach;
    ?>
</table>


<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
$content = ob_get_clean();
require "../../global/common/template.php";
?>
