<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 15 : Tableaux associatifs"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php



$gens =
[
   ["Nom" => "Matthieu", "Age" => 30, "Sexe" => 1 ],
   ["Nom" => "Marie", "Age" => 30, "Sexe" => 0 ]
];

function affichagePersonne($personnes)
{
   foreach ($personnes as $personne)
   {
      foreach($personne as $key => $value)
      {
         echo $key." : ".$value."<br>";
      }
      echo "<hr>";
   }
}
affichagePersonne($gens);
?>


<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
