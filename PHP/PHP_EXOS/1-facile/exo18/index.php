<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exercice 18 : Formulaire et méthode GET"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->

<form action="index.php" method="GET">

<label for="pseudo"> Pseudo </label> <br>
<input type="text" name="pseudo" id="pseudo" class="form-control"> <br>

<label for="age">Age</label><br>
<input type="number" name="age" id="age" class="form-control"> <br>

<input type="submit" value="Envoyer le formulaire" class="btn btn-primary"> 



</form>
<?php
if (isset($_GET) && !empty($_GET)){
  echo $_GET["pseudo"]." à ".$_GET["age"]." ans";
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
