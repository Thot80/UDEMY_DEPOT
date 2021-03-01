<?php ob_start(); //NE PAS MODIFIER
$titre = "Partie 1 : Les Variables"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->

<?php
$arme1 = 'épée';
$arme2 = 'arc';
$arme3 = 'hache';
$arme4 = 'fléau';
$armes = [$arme1, $arme2, $arme3, $arme4];
?>

<h3>Voici toutes les armes :  </h3>
<?php
$i = 0;
foreach ($armes as $arme)
{
    $i++;
    echo 'Arme '.$i.' : '.$arme.'<br>';
}
?>
<select name="armes" id="armes">
    <?php foreach ($armes as $arme): ?>
    <option value="<?=$arme?>"><?=$arme?></option>
    <?php endforeach; ?>
</select>
<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
$content = ob_get_clean();
require "../../global/common/template.php";
?>
