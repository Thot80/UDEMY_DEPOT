<?php ob_start(); //NE PAS MODIFIER
$titre = "Mes Animaux"; //Mettre le nom du titre de la page que vous voulez

require 'MonPDO.php';
require 'Animal.php';
require 'AnimalDAO.php';


// Correspond à la partie controller dans un MMVC
$animaux = AnimalDAO::getAnimaux();
foreach ($animaux as $animal)
{
    new Animal($animal['idAnimal'], $animal['nom'], $animal['age'], $animal['sexe'],AnimalDAO::getTypeNom($animal['idType']),
        AnimalDAO::getImagesURL($animal['idAnimal']));
}


?>
<pre>
    <?php
    print_r(Animal::$mesAnimaux);
    ?>
</pre>
<div class="table-responsive">
    <table class="table">
        <thead>
            <th>#</th>
            <th>Nom</th>
            <th>Age</th>
            <th>Sexe</th>
            <th>Type</th>
            <th>Images</th>
        </thead>
        <tbody>
        <?php
        // Patie Vue Dans un modele MVC
        foreach (Animal::$mesAnimaux as $monAnimal)
        {
        ?>
            <tr>
                <td>
                    <?= $monAnimal->getId() ?>
                </td>
                <td>
                    <?= $monAnimal->getNom() ?>
                </td>
                <td>
                    <?= $monAnimal->getAge() ?>
                </td>
                <td>
                    <?= $monAnimal->getSexe() ?>
                </td>
                <td>
                    <?= $monAnimal->getType() ?>
                </td>
                <td>
                    <?php foreach ($monAnimal->getImages() as $url):?>
                    <td>
                        <img class="img-fluid" src="sources/<?= $url['url'] ?>" alt="<?=AnimalDAO::getImagesLibelle($url['url']) ?>">
                    <br>
                    </td>
                    <?php endforeach;?>
                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div>

<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
$content = ob_get_clean();
require "../../global/common/template.php";
?>
