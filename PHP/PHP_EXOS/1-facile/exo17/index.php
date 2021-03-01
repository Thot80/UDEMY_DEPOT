<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exercice 17 : TAbleaux complexes"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
    $j1 = [
        "nom" => "Matthieu",
        "age" => 30,
        "sexe" => true,
        "notes" => [2,5,15,10]
    ];
    $j2 = [
        "nom" => "Marie",
        "age" => 32,
        "sexe" => false,
        "notes" => [10,12,11,11]
    ];
    $j3 = [
        "nom" => "Marc",
        "age" => 25,
        "sexe" => true,
        "notes" => [15,5,20,15]
    ];
    $j4 = [
        "nom" => "Mathilde",
        "age" => 21,
        "sexe" => false,
        "notes" => [3,6,9,12]
    ];
    $joueurs = [$j1,$j2,$j3,$j4];
    foreach($joueurs as $joueur){
        afficherJoueur($joueur);
        echo "------------------------ <br />";
    }

    function afficherJoueur($joueur){
        echo "Nom : " . $joueur["nom"] . "<br />";
        echo "age : " . $joueur["age"] . "<br />";
        if($joueur["sexe"]){
            echo "sexe : Homme <br />";
        } else {
            echo "sexe : Femme  <br />";
        }
        $resultat = 0;
        foreach($joueur["notes"] as $indice => $note){
            $resultat += $note;
            echo "Note : ". ($indice + 1). " : " . $note. "<br />";
        }
        echo "La moyenne est de : ". ($resultat / count($joueur["notes"])). "<br />";
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
