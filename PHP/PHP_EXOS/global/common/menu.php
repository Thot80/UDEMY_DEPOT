<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="../../global/accueil/index.php">accueil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Facile
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php for($i=1;$i <= 20;$i++) : ?>
                <a class="dropdown-item" href="../../1-facile/exo<?=$i?>/index.php">exo<?=$i?></a>
            <?php endfor; ?>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Moyen
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php for($i=1;$i <= 7;$i++) : ?>
                <a class="dropdown-item" href="../../2-moyen/exo<?=$i?>/index.php">exo<?=$i?></a>
            <?php endfor; ?>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Armes
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../../4-cas pratique/1-Armes/exo1.php">exo1</a>
                <a class="dropdown-item" href="../../4-cas pratique/1-Armes/exo2.php">exo2</a>
                <a class="dropdown-item" href="../../4-cas pratique/1-Armes/exo3.php">exo3</a>
                <a class="dropdown-item" href="../../4-cas pratique/1-Armes/exo4.php">exo4</a>
                <a class="dropdown-item" href="../../4-cas pratique/1-Armes/exo5.php">exo5</a>
                <a class="dropdown-item" href="../../4-cas%20pratique/1-Armes/exo6.php">exo6</a>
                <a class="dropdown-item" href="../../4-cas%20pratique/1-Armes/exo7.php">exo7</a>
                <a class="dropdown-item" href="../../4-cas pratique/1-Armes/exo8.php">exo8</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href= "../../4-cas pratique/2-catalogueProduit/index.php" >
                Catalogue
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href= "../../4-cas pratique/3-Annimaux/index.php" >
                Animaux
            </a>
        </li>
    </ul>
    </div>
</nav>