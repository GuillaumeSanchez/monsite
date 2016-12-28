<?php

// Cette page sert à déconnecter l'utilisateur actuellement connecté.

/* J'ouvre une session pour pouvoir communiquer les informations sur le compte connecté.
 * On se connecte à la base de données MySql pour avoir les informations sur les articles publié les différents comptes,
 * les commentaires, etc.
 */

session_start(); //permet de conserver les sessions dans nos pages php.
require_once ('../settings/bdd.inc.php'); // permet de l'utiliser pour la connexion dans la base de données (/settings/bdd.inc.php).
require_once ('../settings/init.inc.php'); // permet de l'utiliser pour afficher touttes les erreurs de php sur la page web (/settings/init.inc.php).

/* On crée une requête SQL qui sert à enlever la valeur sid de l'utilisateur connecté qui sert à reconnecté l'utilisateur à l'ouverture du site.
 * on éxécute la commande
 * on supprime le cookie qui contient la valeur sid de l'utilisateur.
 * on détruit la session.
 * on redirige l'utilisateur sur la page index.
 */

$sth = $bdd->prepare("UPDATE utilisateurs SET sid = :sid WHERE id = :id");
$sth->bindValue(':sid', "", PDO::PARAM_STR);
$sth->bindValue(':id', $_SESSION["Connexion"]["id"], PDO::PARAM_INT);
$sth->execute();
//unset($_SESSION);
setcookie("sid", "", time() - 31536000);
session_destroy();
header("Location: ../index.php");
?>

