<?php ob_start(); //NE PAS MODIFIER
$titre = "Partie 5 : Approche orientée objet Bis"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->

<?php
require 'ArmesBis.php';
$arme1 = new ArmesBis('épée', 'Une arme tranchante');
$arme2 = new ArmesBis('arc', 'Une arme à distance');
$arme3 = new ArmesBis('hache', 'Une arme tranchante affectionnée par les nains');
$arme4 = new ArmesBis('fleau', 'Une arme tranchante');

$armes = [$arme1, $arme2, $arme3, $arme4];
?>
<?php foreach ($armes as $arme):?>
<div class="row">
    <div class="col-3">
        <img src="<?=$arme->getChemin()?>" alt="Photo d'une arme">
    </div>
    <div class="col-3">
        <h2><?=$arme->getNom()?></h2> <br>
        <p><?= $arme->getDescription()?></p>
    </div>
    <div class="col-auto">
        <?= $arme ?>
    </div>
</div>
<?php
endforeach;
?>

<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
$content = ob_get_clean();
require "../../global/common/template.php";
?>
