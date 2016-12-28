<?php

//Cette page sert à remettre à jour le mot de passe de l'utilisateur.

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
 * si c'est le cas, alors on prépare la requète SQL qui permet de remettre à jour le mot de passe de l'utilisateur dans la table.
 * on éxécute la requête.
 * et on redirige l'utilisateur dans la page PHP d'inscription.
 */

if (isset($_SESSION['Connexion']) && $_SESSION['Connexion']['Status'] == TRUE) {
            $sth = $bdd->prepare("UPDATE utilisateurs SET mdp = :mdp WHERE id = :id");
            $sth->bindValue(':mdp', $_POST['newmdp'], PDO::PARAM_STR);
            $sth->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
            $sth->execute();
            header("Location: ../index.php");
} else {
    
    // Si l'utilisateur n'est pas connecté alors il est redirigé vers la page index du blog.
    
    header("Location: ../index.php");
}
?>