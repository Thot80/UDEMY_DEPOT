<?php
require 'User.php';
require 'UserManager.php';
require 'MonPDO.php';
$db = MonPDO::getPDO();
$manager = new UserManager($db);
$userList = $manager->getUserList();
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

    <title>Utilisateurs</title>
</head>
<body>
<h1>Voici la liste des utilisateurs</h1>

<table class="table table-bordered mx-3" >
    <thead>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Tèl</th>
        <th>Email</th>
        <th>Détails</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($userList as $user):?>
        <tr>
            <td> <?= $user->getId()?> </td>
            <td> <?= $user->getNom()?></td>
            <td> <?= $user->getPrenom()?></td>
            <td>  <?= $user->getTel()?></td>
            <td> <?= $user->getEmail()?></td>
            <td> <a href="administration.php/?id=<?= $user->getId()?>" class="btn btn-primary"> Accéder</a> </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br>
<a href="inscription.php" class="mx-3">Inscrivez vous !</a>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>
