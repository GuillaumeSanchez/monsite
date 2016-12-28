<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
<link href="css/CSS.css" rel="stylesheet" type="text/css"/>
<?php
if (isset($_SESSION['Connexion']) && $_SESSION['Connexion']['Status'] == TRUE) {
    ?>
    <div class ="col-lg-3">
        <div class="menu">
            <center>
                <h3>Menu</h3>
            </center>
        </div>
        <nav class="span4 ">
            <ul>
                <li><a href="http://monsuperblog.esy.es/monsite/index.php?p=1">Accueil</a></li>
                <li><a href = "http://monsuperblog.esy.es/monsite/Compte.php">Mon Compte</a></li>
                <li><a href = "http://monsuperblog.esy.es/monsite/articles.php">Rédiger un article</a></li>
                <li><a href = "http://monsuperblog.esy.es/monsite/includes/deconnexion.inc.php">Déconnexion</a></li>
            </ul>
        </nav>
    </div>
    <?php
} else { // Sinon ...
    ?>
    <div class ="col-lg-3">
        <div class="menu">
            <center>
                <h3>Menu</h3>
            </center>
        </div>
        <ul>
            <li><a href="http://monsuperblog.esy.es/monsite/index.php?p=1">Accueil</a></li>
            <li><a href = "http://monsuperblog.esy.es/monsite/connexion.php">Se connecter</a></li>
            <li><a href = "http://monsuperblog.esy.es/monsite/Inscription.php">S'inscrire</a></li>
            <?php
        }
        ?>
    </ul>
</nav>
</div>
</div>
<div class="row">

