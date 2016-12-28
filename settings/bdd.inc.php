<?php
/*Cette page permet de créer une variable de connection pour pouvoir se connecter à la base de donnée MySQL.
 */
try {
    
    /* On crée une variable de connexion PDO pour la base de donnée MySQL
     * on éxécute les coordonnées contenue dans la variable.
     * Si il y a une erreur le programme l'affiche. 
     */
    
    $bdd = new PDO("mysql:host=mysql.hostinger.fr;dbname=u268005880_bdd01", "u268005880_guill", "Nintendones1987");
    $bdd->exec('set names utf8');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur :' . $e->getMessage()); //Affiche l'erreur de connexion si il y en a une.
}