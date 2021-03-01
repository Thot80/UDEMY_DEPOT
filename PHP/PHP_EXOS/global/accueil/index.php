<?php ob_start(); ?>

<!-- mettre ici le code -->

<?php
    $titre = "Mon super site d'exercice";
    $content = ob_get_clean();
    require "../common/template.php";
?>
