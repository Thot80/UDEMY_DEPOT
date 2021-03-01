<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exercice 4 : Les objets"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->

<?php

require("Annimalerie.php");

$annimal1 = new Annimalerie("Mina", 2, "chien");
$annimal2 = new Annimalerie("Hocquet", 6, "chien");
$annimal3 = new Annimalerie("Tya", 7, "chat");
$annimal4 = new Annimalerie("Milo", 4, "chat");
    
?>

<button type="button" class="btn btn-primary text-align "><a class="text-white" href="?type=tous"> tous </a></button>
<button type="button" class="btn btn-primary text-align"> <a class="text-white" href="?type=chien"> chiens </a></button>
<button type="button" class="btn btn-primary text-align"> <a class="text-white" href="?type=chat"> chats </a></button>

<?php

if(isset($_GET["type"]))
{
    if($_GET["type"]==='tous')
    {
        $annimal1->afficherAnnimalerie();
        $annimal2->afficherAnnimalerie();
        $annimal3->afficherAnnimalerie();
        $annimal4->afficherAnnimalerie();
    }
    

    if($_GET["type"]==='chien')
    {
        $annimal1->afficherAnnimalerie();
        $annimal2->afficherAnnimalerie();
    }
    if($_GET["type"]==='chat')
    {
        $annimal3->afficherAnnimalerie();
        $annimal4->afficherAnnimalerie();
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
