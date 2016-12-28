<?php
session_start(); //permet de conserver les sessions dans nos pages php.
require_once ('settings/bdd.inc.php'); // permet de l'utiliser pour la connexion dans la base de données (/settings/bdd.inc.php).
require_once ('settings/init.inc.php'); // permet de l'utiliser pour afficher touttes les erreurs de php sur la page web (/settings/init.inc.php).
include_once 'includes/connexion.inc.php'; // Permet de vérifier si le cookie de connection est toujours présent dans le navigateur.
require_once('libs/Smarty.class.php'); // Insertion de la librarie du langage Smarty.

$smarty = new Smarty(); // Création d'une instance smarty. 

$smarty->setTemplateDir('templates/'); // Indique la direction de où se situe les pages en smarty.
$smarty->setCompileDir('templates_c/'); // Indique l'endroit pour stocker la compilation des pages smarty.
//$smarty->setConfigDir('/web/www.example.com/guestbook/configs/');
//$smarty->setCacheDir('/web/www.example.com/guestbook/cache/');

if (isset($_SESSION['Connexion']) && $_SESSION['Connexion']['Status'] == TRUE) {
    $sql = $bdd->prepare("SELECT * FROM utilisateurs WHERE nom = :nom AND prenom = :prenom AND sid = :sid");
    $sql->bindValue(':nom', $_SESSION['Connexion']['Nom'], PDO::PARAM_STR);
    $sql->bindValue(':prenom', $_SESSION['Connexion']['Prenom'], PDO::PARAM_STR);
    $sql->bindValue(':sid', $_SESSION['Connexion']['sid'], PDO::PARAM_STR);
    $sql->execute();
    $infos = $sql->fetchAll(PDO::FETCH_BOTH);
    $smarty->assign('infos', $infos);
    if (isset($_POST['bouton']) && $_POST['bouton'] == "Modifier vos Informations") {
        include_once 'includes/header.inc.php'; // Permet d'insérer l'en-tête de la page web. (fichier: /includes/header.inc.php)
        $smarty->display('Informations.tpl'); // Permet d'afficher le contenu de la page "articles.tpl".
        include_once 'includes/recherche.inc.php';
        include_once 'includes/menu.inc.php'; // Permet d'insérer le menu à droite de la page web. (fichier: /includes/menu.inc.php)
        include_once 'includes/footer.inc.php'; // Permet d'insérer le bas de la page web contenant le copyright, etc. (fichier: /includes/footer.inc.php)
    } else {
        if (isset($_POST['bouton']) && $_POST['bouton'] == "Modifier votre mot de passe") {
            include_once 'includes/header.inc.php'; // Permet d'insérer l'en-tête de la page web. (fichier: /includes/header.inc.php)
            $smarty->display('ChangMDP.tpl'); // Permet d'afficher le contenu de la page "articles.tpl".
            include_once 'includes/recherche.inc.php';
            include_once 'includes/menu.inc.php'; // Permet d'insérer le menu à droite de la page web. (fichier: /includes/menu.inc.php)
            include_once 'includes/footer.inc.php'; // Permet d'insérer le bas de la page web contenant le copyright, etc. (fichier: /includes/footer.inc.php)
        } else {
            header('Location: index.php');
        }
    }
} else {
    include_once 'includes/header.inc.php'; // Permet d'insérer l'en-tête de la page web. (fichier: /includes/header.inc.php)
    $smarty->display('Inscription.tpl'); // Permet d'afficher le contenu de la page "articles.tpl".
    include_once 'includes/recherche.inc.php';
    include_once 'includes/menu.inc.php'; // Permet d'insérer le menu à droite de la page web. (fichier: /includes/menu.inc.php)
    include_once 'includes/footer.inc.php'; // Permet d'insérer le bas de la page web contenant le copyright, etc. (fichier: /includes/footer.inc.php)
}
?>