<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exercice 19 : Formulaire et méthode POST"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->

<form action="index.php" method="POST">

<label for="chiffre">Saisir un chiffre</label><br>
<input type="number" name="chiffre" id="chiffre" class="form-control"> <br>

<input type="submit" value="Envoyer le formulaire" class="btn btn-primary"> 



</form>
<?php
if (isset($_POST) && !empty($_POST)){
  
  if (parite($_POST["chiffre"]))
  {
    echo "Le chiffre saisi est pair";
  }
  else
  {
    echo "Le chiffre saisi est impair";
  }
}

function parite($chiffre)
{
  if ($chiffre % 2 == 0)
  {
    return true;
  }
  else{
    return false;
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
