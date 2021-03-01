<?php ob_start(); //NE PAS MODIFIER
$titre = "Catalogue PDO"; //Mettre le nom du titre de la page que vous voulez

try {
    $bdd = new PDO('mysql:host=localhost;dbname=catalogue;charset=utf8', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$catalogue = $bdd->query('SELECT * FROM Produits
INNER JOIN Types
ON Produits.id_types = Types.id');

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalogue</title>
</head>
<body>
<div class="container">
    <div class="row align-items-end">
        <?php
        while ($produit = $catalogue->fetch())
        {
            ?>
            <div class="col-4">
                <div class="py-auto">
                    <img src="sources/<?=$produit['image']?>" alt="Une image de présentation du cours" class="img-fluid">
                </div>
                <div>
                    <h2><?=$produit['intitule']?></h2>
                    <p><?=$produit['description']?></p>
                </div>
                <div class="btn btn-primary my-2"><?=$produit['nom']?></div>
            </div>
            <?php
        }
        $catalogue->closeCursor();
        ?>
    </div>
</div>
</body>
</html>


<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
$content = ob_get_clean();
require "../../global/common/template.php";
?>
