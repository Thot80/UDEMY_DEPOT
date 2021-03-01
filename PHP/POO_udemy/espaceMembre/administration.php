<?php
require 'User.php';
require 'UserManager.php';
require 'MonPDO.php';
if (isset($_GET['id']))
{
    $id = (int) htmlspecialchars($_GET['id']);
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8', 'root', '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch ( PDOException $e )
    {
        $message = 'Connexion impossible : ' .$e->getMessage();
        die($message);
    }
    $manager = new UserManager($db);
    $curentUser = $manager->getUser($id);
}
else
{
    header('Location: http://php/udemy/poo/espaceMembre/index.php');
}
$user = [];
if (isset($_POST['soumettre']))
{
    if ($_POST['soumettre'] == 'modifier')
    {
        if (isset($_POST['nom']))
        {
            $user['nom'] = htmlspecialchars($_POST['nom']);
        }
        if (isset($_POST['prenom']))
        {
            $user['prenom'] = htmlspecialchars($_POST['prenom']);
        }
        if (isset($_POST['tel']))
        {
            $user['tel'] = htmlspecialchars($_POST['tel']);
        }
        if (isset($_POST['email']))
        {
            $user['email'] = htmlspecialchars($_POST['email']);
        }
        $user['id'] = $id;
        $userObjet = new User($user);
        var_dump($userObjet);
        if(!$userObjet->isUserValid())
        {
            foreach($userObjet->getErreurs() as $key => $value)
            {
                $erreur[$key] = ucfirst($key).' invalide';
            }
        }
        else
        {
            $manager->updateUser($userObjet);
            header('Location: http://php/udemy/poo/espaceMembre/index.php');
        }
    }
    elseif ($_POST['soumettre'] == 'retour')
    {
        header('Location: http://php/udemy/poo/espaceMembre/index.php');
    }
    else
    {
        $manager->deleteUser($id);
        header('Location: http://php/udemy/poo/espaceMembre/index.php');
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Administration</title>
</head>
<body>
<h1 class="txt-center">Informations</h1>
<form action="" method="post">

    <div class="mx-3">
        <label class="form-label" for="nom" id="nom">Nom :</label>
        <input class="form-control" type="text" id="nom" name="nom" placeholder="Dupont"
            <?= (isset($user['nom'])) ? 'value="'.$user['nom'].'"' : 'value="'.$curentUser->getNom().'"'?>>
        <span class="erreur text-danger" id="erreur_nom"><?=(isset($erreur['nom'])) ? $erreur['nom'] : ''?></span>
    </div>
    <br>
    <div class="mx-3">
        <label class="form-label" for="prenom" id="prenom">Prenom :</label>
        <input class="form-control" type="text" id="prenom" name="prenom" placeholder="Camille"
            <?= (isset($user['prenom'])) ? 'value="'.$user['prenom'].'"' :'value="'.$curentUser->getPrenom().'"'?>>
        <span class="erreur text-danger" id="erreur_prenom"><?=(isset($erreur['prenom'])) ? $erreur['prenom'] : ''?></span>
    </div>
    <br>
    <div class="mx-3">
        <label class="form-label" for="tel" id="tel">Tel :</label>
        <input class="form-control" type="text" id="tel" name="tel" placeholder="06 00 01 02 03"
            <?= (isset($user['tel'])) ? 'value="'.$user['tel'].'"' : 'value="'.$curentUser->getTel().'"'?>>
        <span class="erreur text-danger" id="erreur_tel"><?=(isset($erreur['tel'])) ? $erreur['tel'] : ''?></span>
    </div>
    <br>
    <div class="mx-3">
        <label class="form-label" for="email" id="email">Email :</label>
        <input class="form-control" type="email" id="email" name="email" placeholder="dupont.camille@mail.com"
            <?= (isset($user['email'])) ? 'value="'.$user['email'].'"' :'value="'.$curentUser->getEmail().'"'?>>
        <span class="erreur text-danger" id="erreur_email"><?=(isset($erreur['email'])) ? $erreur['email'] : ''?></span>
    </div>
    <br>
    <div class="mx-3 mt-3">
        <input type="submit" class="btn btn-success" name="soumettre" value="modifier">
        <input type="submit" class="btn btn-warning" name="soumettre" value="retour">
        <input type="submit" class="btn btn-danger" name="soumettre" value="supprimer">
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>
