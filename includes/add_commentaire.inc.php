<?php

// Cete page sert à rajouter le commentaire de l'utilisateur.

/* J'ouvre une session pour pouvoir communiquer les informations sur le compte connecté.
 * On se connecte à la base de données MySql pour avoir les informations sur les articles publié les différents comptes,
 * les commentaires, etc.
 * Et on test si un utilisateur est connecté ou non.
 */

session_start(); //permet de conserver les sessions dans nos pages php.
require_once ('../settings/bdd.inc.php'); // permet de l'utiliser pour la connexion dans la base de données (/settings/bdd.inc.php).
require_once ('../settings/init.inc.php'); // permet de l'utiliser pour afficher touttes les erreurs de php sur la page web (/settings/init.inc.php).
include_once 'connexion.inc.php'; // Permet de vérifier si le cookie de connection est toujours présent dans le navigateur

/* On crée la requête SQL qui va permettre d'insérer dans la base de donnée les informations du commentaire.
 * on insère les informations en question.
 * on éxécute la requête.
 * on redirige l'utilisateur sur la page de l'article où le commentaire a été insérer.
 */


$sth = $bdd->prepare("INSERT INTO commentaires (titre, commentaire, id_article, id_utilisateur, date) VALUES(:titre, :commentaire, :id_article, :id_utilisateur, :date)");
$sth->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
$sth->bindValue(':commentaire', $_POST['commentaire'], PDO::PARAM_STR);
$sth->bindValue(':id_article', $_POST['id_article'], PDO::PARAM_STR);
$sth->bindValue(':id_utilisateur', $_POST['id_utilisateur'], PDO::PARAM_STR);
$sth->bindValue(':date', $_POST["date"], PDO::PARAM_INT);
$sth->execute();
header("Location: ".$_POST['url']);
?>