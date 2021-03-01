<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 16 : Tableaux complexes"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php

$j1 = 
[
   "Nom" => "Mathieu",
   "Age" => 30,
   "Sexe" => true,
   "Notes" => [2, 5, 15, 10]
];
$j2 = 
[
   "Nom" => "Marie",
   "Age" => 32,
   "Sexe" => false,
   "Notes" => [10, 12, 11, 11]
];
$j3 = 
[
   "Nom" => "Marc",
   "Age" => 25,
   "Sexe" => true,
   "Notes" => [15, 5, 20, 15]
];
$j4 = 
[
   "Nom" => "Mathilde",
   "Age" => 21,
   "Sexe" => false,
   "Notes" => [3, 6, 9, 12]
];


$joueurs = [$j1, $j2, $j3, $j4];

foreach($joueurs as $joueur)
{
   afficherJoueur($joueur);
   echo "<hr>";
}


function afficherJoueur($joueur)
{
   foreach($joueur as $key => $value)
   {
      if (!(gettype($value)=="array"))
      {
         echo $key." : ".$value."<br>";
      }
      else
      {
         for($i = 0; $i < count($value); $i++)
         {
            echo "Note " .($i+1). " : ".$value[$i]."<br>";
         }
         echo "La moyenne est de : " . calculerMoyenne($value). "<br>";
      }
   }
}
function calculerMoyenne($notes)
{
   $somme = 0;
   foreach($notes as $note)
   {
      $somme += $note;
   }
   return ($somme/count($notes));
}
?>
<?php

// --------------------------------- SOLUTION DU COURS -----------------------------------

?>

<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
