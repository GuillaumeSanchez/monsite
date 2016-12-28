<?php

//Cette page sert à Inscrire un nouvel utilisateur.

/* J'ouvre une session pour pouvoir communiquer les informations sur le compte connecté.
 * On se connecte à la base de données MySql pour avoir les informations sur les articles publié les différents comptes,
 * les commentaires, etc.
 * Et on test si un utilisateur est connecté ou non.
 */

session_start();
require_once ('../settings/bdd.inc.php');
require_once ('../settings/init.inc.php');
include_once 'connexion.inc.php';

/* On crée la requête SQL qui va permettre d'insérer dans la base de donnée les informations du nouvel utilisateur.
 * on insère les informations en question.
 * on éxécute la requête.
 * on récupère l'id de l'utilisateur insérer
 * on crée un dossier qui sert à stocké son logo.
 * on redirige l'utilisateur sur la page connexion.php.
 */

$sth = $bdd->prepare("INSERT INTO utilisateurs (nom, prenom, email, mdp, sid, rang, logo) VALUES(:nom, :prenom, :email, :mdp, :sid, :rang, :logo)");
$sth->bindValue(':nom', $_POST['Nom'], PDO::PARAM_STR);
$sth->bindValue(':prenom', $_POST['Prenom'], PDO::PARAM_STR);
$sth->bindValue(':email', $_POST['Email'], PDO::PARAM_STR);
$sth->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);
$sth->bindValue(':sid', 0, PDO::PARAM_INT);
$sth->bindValue(':rang', 0, PDO::PARAM_INT);
$sth->bindValue(':logo', "/Compte/Default.png", PDO::PARAM_STR);
$sth->execute();
$id = $bdd->lastInsertId();
$path = "../img/Compte/".$id;
mkdir($path);
header("Location: ../connexion.php");
?>