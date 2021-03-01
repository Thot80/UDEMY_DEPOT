<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exercice 5 : Private et Getters"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
require 'Livres.php';
$livre1 = new Livres('tonton', 'babibar', 'toto', '2000');
$livre2 = new Livres('tonton2', 'babibar', 'tata', '2001');
$livre3 = new Livres('abelix', 'bebat', 'titi', '2000');
$livre4 = new Livres('abelix2', 'bebat', 'titi', '2000');
$livre5 = new Livres('abelix3', 'bebat', 'tutu', '2001');
$livres = [$livre1, $livre2, $livre3, $livre4, $livre5];
?>

<form action="" method="POST">

    <label for="edition" id="edition"> Edition : </label>
    <select name="edition" id="edition">
        <option value="tous" selected>Tous</option>
        <option value="babibar">Babibar</option>
        <option value="bebat">Bebat</option>
    </select>

    <br>

    <label for="dateParution" id="dateParution"> Date de Parution : </label>
    <select name="dateParution" id="dateParution">
        <option value="tous" selected>Tous</option>
        <option value="2000">2000</option>
        <option value="2001">2001</option>
    </select>

    <br>

    <input type="submit" name="valider" class="btn btn-primary text-align">
</form>

<?php
if ((isset($_POST['edition'])) && (isset($_POST['dateParution'])))
{

    if (($_POST['edition'] === 'tous') && ($_POST['dateParution'] === 'tous'))
    {
        foreach ($livres as $livre)
        {
            $livre->getInfos();
        }
    }
    elseif ($_POST['edition'] ==='tous')
    {
        foreach ($livres as $livre)
        {
            if ($livre->getDateParution() === $_POST['dateParution'])
            {
                $livre->getInfos();
            }
        }
    }

    elseif ($_POST['dateParution'] === 'tous')
        {
            foreach ($livres as $livre)
            {
                if ($livre->getEdition() === $_POST['edition'])
                {
                    $livre->getInfos();
                }
            }
        }
    else
    {
        foreach ($livres as $livre)
        {
            if ((($livre->getDateParution() === $_POST['dateParution'])) &&  ($livre->getEdition() === $_POST['edition']))
            {
                $livre->getInfos();
            }
        }
    }
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
