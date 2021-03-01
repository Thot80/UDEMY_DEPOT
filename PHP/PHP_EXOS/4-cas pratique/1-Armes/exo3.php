<?php ob_start(); //NE PAS MODIFIER
$titre = "Partie 3 : Tableaux associatifs"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->

<?php
$arme1 = [
        'nom' => 'épée',
        'chemin' => 'sources/epee/epee1.png',
        'description' => 'Une arme tranchante'
    ];
$arme2 = [
    'nom' => 'arc',
    'chemin' => 'sources/arc/arc1.png',
    'description' => 'Une arme à distance'
];
$arme3 = [
    'nom' => 'hache',
    'chemin' => 'sources/hache/hache1.png',
    'description' => 'Une arme tranchante ou un outils qui permet aussi de couper du bois'
];
$arme4 = [
    'nom' => 'fléau',
    'chemin' => 'sources/fleau/fleau1.png',
    'description' => 'Une arme contondante du moyen âge'
];
$armes = [$arme1, $arme2, $arme3, $arme4];
?>
<table class="table">
   <?php foreach ($armes as $arme):?>
    <tr>
        <td><img src="<?=$arme['chemin']?>" alt="Photo d'une arme"></td>
        <td><b><?=$arme['nom']?></b> <br> <?= $arme['description']?></td>
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
