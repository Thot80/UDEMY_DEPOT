<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exercice 6 : Attributs statiques"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
require 'Maison.php';
$maison1 = new Maison(3, 98);
$maison2 = new Maison(4,120);
$maison3 = new Maison(4,130);
$maison1->setDateCreation(DateTime::createFromFormat('Y','2018'));
$maison2->setDateCreation(DateTime::createFromFormat('Y','2019'));
$maison3->setDateCreation(DateTime::createFromFormat('Y','2017'));

?>
<table class="table px-auto">
    <thead>
    <tr>
        <th>#</th>
        <th>Date</th>
        <th>Nombre de chambre</th>
        <th>Surface</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td> <?= $maison1->getIdentifiant()?> </td>
        <td> <?= $maison1->getDateCreation()->format('Y')?> </td>
        <td> <?= $maison1->getNombreChambre()?> </td>
        <td> <?= $maison1->getSurface()?> </td>
    </tr>
    <tr>
        <td> <?= $maison2->getIdentifiant()?> </td>
        <td> <?= $maison2->getDateCreation()->format('Y')?> </td>
        <td> <?= $maison2->getNombreChambre()?> </td>
        <td> <?= $maison2->getSurface()?> </td>
    </tr>
    <tr>
        <td> <?= $maison3->getIdentifiant()?> </td>
        <td> <?= $maison3->getDateCreation()->format('Y')?> </td>
        <td> <?= $maison3->getNombreChambre()?> </td>
        <td> <?= $maison3->getSurface()?> </td>
    </tr>
    </tbody>
</table>



<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
