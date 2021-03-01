<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 2 : Variables et Ternaires"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
$nom = "Marie";
$age = 30;
$homme = false;
$nom2 = "Pierre";
$age2 = 32;
$homme2 = true;


echo "<br/>" . $nom . " à " . $age . " ans";
if(!$homme){
    echo " et c'est une femme <br/>";
}
else{
    echo " et c'est un homme <br/>";
}

echo "<br/>" . $nom2 . " à " . $age2 . " ans";
if(!$homme2){
    echo " et c'est une femme <br/>";
}
else{
    echo " et c'est un homme <br/>";
}

echo " <br/> Forme alternative utilisant les ternaires <br/>";

echo "<br/>" . $nom . " à " . $age . " ans";
echo (!$homme) ? " et c'est une femme" : " et c'est un homme";

echo "<br/>" . $nom2 . " à " . $age2 . " ans";
echo (!$homme2) ? " et c'est une femme" : " et c'est un homme";

?>
<br/>
<br>
<h2>Méthode d'écriture à dominante de HTML</h2>
<p>
    <?= $nom ?> a <?= $age ?> ans
    <?= (!$homme) ? " et c'est une femme" : " et c'est un homme" ?>
</p>

<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
