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

if (isset($_POST['bouton']) AND $_POST['bouton'] == 'Connection') {
    if ($_POST['Email'] == "" || $_POST['mdp'] == "") {
        $smarty->assign('Email', $_POST['Email']);
        $smarty->assign('mdp', $_POST['mdp']);
    } else {
        $email = $_POST['Email'];
        $mdp = $_POST['mdp'];
        $sth = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = :email AND mdp = :mdp");
        $sth->bindValue(':email', $email, PDO::PARAM_STR);
        $sth->bindValue(':mdp', $mdp, PDO::PARAM_STR);
        $sth->execute();
        $count = $sth->rowCount();
        $result = $sth->fetchAll(PDO::FETCH_BOTH);
        if ($count == 0) {
            $smarty->assign('count', $count);
        } else {
            $nom = $result[0]['nom'];
            $prenom = $result[0]['prenom'];
            $id = $result[0]['id'];
            $sid = md5($email . time());
            $upd = $bdd->prepare("UPDATE utilisateurs SET sid = :sid WHERE email = :email AND mdp = :mdp AND id = :id");
            $upd->bindValue(':sid', $sid, PDO::PARAM_STR);
            $upd->bindValue(':email', $email, PDO::PARAM_STR);
            $upd->bindValue(':mdp', $mdp, PDO::PARAM_STR);
            $upd->bindValue(':id', $id, PDO::PARAM_INT);
            $upd->execute();

            setcookie('sid', $sid, time() + 31536000);
            //$_SESSION['Connexion'] = array('Nom' => $nom, 'Prenom' => $prenom, 'Status' => TRUE);            
            header('Location: index.php');
            exit();
        }
    }
}
include_once 'includes/header.inc.php'; // Permet d'insérer l'en-tête de la page web. (fichier: /includes/header.inc.php)
$smarty->display('connexion.tpl');// Permet d'afficher le contenu de la page "connexion.tpl".
include_once 'includes/recherche.inc.php';
include_once 'includes/menu.inc.php'; // Permet d'insérer le menu à droite de la page web. (fichier: /includes/menu.inc.php)
include_once 'includes/footer.inc.php'; // Permet d'insérer le bas de la page web contenant le copyright, etc. (fichier: /includes/footer.inc.php)
?>
