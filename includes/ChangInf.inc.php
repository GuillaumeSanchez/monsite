<?php

//Cette page sert à remettre à jour les informations du compte de l'utilisateur.

/* J'ouvre une session pour pouvoir communiquer les informations sur le compte connecté.
 * On se connecte à la base de données MySql pour avoir les informations sur les articles publié les différents comptes,
 * les commentaires, etc.
 * Et on test si un utilisateur est connecté ou non.
 */

session_start();
require_once ('../settings/bdd.inc.php');
require_once ('../settings/init.inc.php');
include_once 'connexion.inc.php';

/* on teste si l'utilisateur est connecté grâce à la variable $_SESSION['Connexion'].
 * si c'est le cas, alors on prépare la requète SQL qui permet de remettre des valeurs à jour sur les
 * informations de l'utilisateur dans la table.
 * on éxécute la requête.
 * et on redirige l'utilisateur dans la page PHP d'inscription.
 */

if (isset($_SESSION['Connexion']) && $_SESSION['Connexion']['Status'] == TRUE) {
            $sth = $bdd->prepare("UPDATE utilisateurs SET nom = :nom, prenom = :prenom, email = :email WHERE id = :id"); /* Mettre à jour dans articles les valeurs
              dans les colonnes titre, texte, publie, date dans la ligne correspondant à l'ide le l'article à modifier. */
            $sth->bindValue(':nom', $_POST['Nom'], PDO::PARAM_STR); //Insertion de la valeur de :titre
            $sth->bindValue(':prenom', $_POST['Prenom'], PDO::PARAM_STR); //Insertion de la valeur de :texte
            $sth->bindValue(':email', $_POST['Email'], PDO::PARAM_STR); //Insertion de la valeur de :publie
            $sth->bindValue(':id', $_POST['id'], PDO::PARAM_INT); //Insertion de la valeur de :id
            $sth->execute(); //Execution de la requête SQL.
            header("Location: ../Inscription.php");
} else {
    
    // Si l'utilisateur n'est pas connecté alors il est redirigé vers la page index du blog.
    
    header("Location: ../Index.php");
}
?>

