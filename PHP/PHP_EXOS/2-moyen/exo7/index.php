<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exercice 7 : Manipuler deux classes"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
require 'Player.php';
require 'Arme.php';
$player1 = new Player('Milo', 5, 100, 1);
$player2= new Player('Tya', 5, 100, 2);
$arme1 = new Arme('Hache', 10);
$arme2 = new Arme('Epée', 8);
$players = [$player1, $player2];

foreach ($players as $player)
{
    echo 'Nom : ' .$player->getNom(). '<br>';
    echo 'Force : ' .$player->getForce(). '<br>';
    echo 'PV : ' .$player->getForce(). '<br>';
    echo 'Arme :  <br>';
    foreach (Arme::getListeArme($player->getArmeId()) as $key => $value)
    {
        echo $key .' : '.$value.'<br>';
    }
    echo '<br>';
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
