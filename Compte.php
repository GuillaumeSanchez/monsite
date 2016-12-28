<?php

// Cette page sert à afficher les informations sur l'utilisateur qui est connecté.

/* J'ouvre une session pour pouvoir communiquer les informations sur le compte connecté.
 * On se connecte à la base de données MySql pour avoir les informations sur les articles publié les différents comptes,
 * les commentaires, etc.
 * On Insère la librairie Smarty pour pouvoirséparer la partie graphique HTML du PHP.
 * Et on test si un utilisateur est connecté ou non.
 */

session_start(); //permet de conserver les sessions dans nos pages php.
require_once ('settings/bdd.inc.php'); // permet de l'utiliser pour la connexion dans la base de données (/settings/bdd.inc.php).
require_once ('settings/init.inc.php'); // permet de l'utiliser pour afficher touttes les erreurs de php sur la page web (/settings/init.inc.php).
include_once 'includes/connexion.inc.php'; // Permet de vérifier si le cookie de connection est toujours présent dans le navigateur.
require_once('libs/Smarty.class.php'); // Insertion de la librarie du langage Smarty.

/*Je créer une variable Smarty pour permettre de communiquer des informations entre les deux pages (Smarty et PHP)
 * J'indique le répertoire qui contient la page Smarty (extension .tpl) qui contient le code html de notre index.
 * J'indique le répertoire qui va contenir les compilation des pages smarty.
 */

$smarty = new Smarty(); // Création d'une instance smarty. 

$smarty->setTemplateDir('templates/'); // Indique la direction de où se situe les pages en smarty.
$smarty->setCompileDir('templates_c/'); // Indique l'endroit pour stocker la compilation des pages smarty.
//$smarty->setConfigDir('/web/www.example.com/guestbook/configs/');
//$smarty->setCacheDir('/web/www.example.com/guestbook/cache/');

/*On teste si un utilisateur est connecté grâce aux informations stockés dans une variable de session crée lors da sa connection.
 * si un utilisateur est connecté, on créer une requête SQL qui permet de récupérer les informations de
 * l'utilisateur actuellement connecté.
 * on éxécute la requête SQL.
 * et on stocke le résultat sous forme de tableau dans la variable $infos.
 */

if (isset($_SESSION['Connexion']) && $_SESSION['Connexion']['Status'] == TRUE) {
    $sql = $bdd->prepare("SELECT * FROM utilisateurs WHERE nom = :nom AND prenom = :prenom AND sid = :sid");
    $sql->bindValue(':nom', $_SESSION['Connexion']['Nom'], PDO::PARAM_STR);
    $sql->bindValue(':prenom', $_SESSION['Connexion']['Prenom'], PDO::PARAM_STR);
    $sql->bindValue(':sid', $_SESSION['Connexion']['sid'], PDO::PARAM_STR);
    $sql->execute();
    $infos = $sql->fetchAll(PDO::FETCH_BOTH);
    
    /* On fait un test avec la variable $infos[0]["rang"], si il est égale à 1,
     * l'utilisateur est un administrateur, sinon c'est un blogueur.
     * on créer ensuite une variable smarty "infos" avec la valeur de la variable $infos.
     */
    
    if($infos[0]["rang"] == 1){
        $infos[0]["rang"] = "Administrateur";
    }else{
        $infos[0]["rang"] = "Blogueur";
    }
    $smarty->assign('infos', $infos);
    
    /* on crée une variable $fichier qui contient le chemin du logo de l'utilisateur.
     * on crée une variable $dimensions qui permet de connaitre les informations sur le logo.
     * on fait un test sur les dimensions du logo, si 25% de la hauteur est inférieur ou égale à 120 pixels alors,
     * on crée un tableau avec comme données la hauteur et la largeur du logo réduit à 25%
     * on crée une variable smarty"logCompte" qui contient le tableau de la variable $logCompte. 
    */
    
    $fichier = "img/".$infos[0]["logo"];
    $dimensions = getimagesize($fichier);
    if((($dimensions[1])/100)*25 <= 120){
        $logCompte = array("width" => (($dimensions[0])/100)*25, "height" => (($dimensions[1])/100)*25);
        $smarty->assign('logCompte', $logCompte);
    }else {
        
        /* * sinon, si les 25% de la hauteur du logo n'est pas inférieur ou égale à 120 pixel alors,
        * On prend les 25% de la hauteur et de la largeur du logo dans deux variables séparé $oldHeight et $oldWidht.
        * On calcul le nombre diviseur qui permet d'avoir une hauteur égale à 120 pixels et on stocke le résultat dans la variable $div.
        * on calcule la nouvelle hauteur et largeur du logo et ont met les résultats dans deux variables différentes $height et $width.
        * on crée la variable $logCompte qui contient un tableau avec un champ "width" et "height" qui sont remplis avec les valeurs des variables
        * $width et $height.
        * on crée une variable smarty "logCompte" qui contient la valeur de la variable $logCompte.
        */
        
        $oldHeight = (($dimensions[1])/100)*25;
        $oldWidht = (($dimensions[0])/100)*25;
        $div = ((($dimensions[1])/100)*25)/120;
        $height = $oldHeight/$div;
        $width = $oldWidht/$div;
        $logCompte = array("width" => $width, "height" => $height);
        $smarty->assign('logCompte', $logCompte);
    }
    
    /* On teste ci la variable $_POST['bouton'] existe, si il existe cela veut dire que l'utilisateur a appuyé sur le bouton "Modifier logo".
     * Si c'est le cas on teste si le chargement du nouveau logo n'a pas fait d'erreur.
     * Si c'est le cas, on crée une variable $id avec la valeur $_POST["id"]
     * On refait un test pour savoir si il y a déjas un logo dans son dossier de compte, si c'est le cas alors on supprime l'ancien logo.
     */
    
    if (isset($_POST['bouton']) && $_POST['bouton'] == "Modifier logo") {
        if ($_FILES['logo']['error'] == 0) {//Si la variable $_FILES['image']['error'] = 0 alors.
            $id = $_POST['id']; //Création de la variable $id contenant la valeur de la variable $_POST['id'].
            if(file_exists("..\img\Compte\\".$id."\logo.png")){
                unlink("..\img\Compte\\".$id."\logo.png");
            }
            move_uploaded_file($_FILES['logo']['tmp_name'], dirname(__FILE__) ."\img\Compte\\".$id."\logo.png"); /* Permet de remplacer l'image par la nouvelle choisie par l'auteur de l'article,
              Et de la mettre dans le fichier "img" avec pour nom l'id de l'article. */
            $sth = $bdd->prepare("UPDATE utilisateurs SET logo = :logo WHERE id = :id"); /* Mettre à jour dans articles les valeurs
              dans les colonnes titre, texte, publie, date dans la ligne correspondant à l'ide le l'article à modifier. */
            $sth->bindValue(':logo', "Compte/".$id."/logo.png", PDO::PARAM_STR); //Insertion de la valeur de :titre
            $sth->bindValue(':id', $id, PDO::PARAM_INT); //Insertion de la valeur de :id
            $sth->execute(); //Execution de la requête SQL.
            $_SESSION['modifier_logo'] = TRUE; //Création d'une variable de session s'appellant $_SESSION['modifier_article'] et ayant pour valeur TRUE. (pas forcément booléen).
            header("Location: Compte.php"); //Permet de diriger l'utilisateur vers une autre page ici "articles.php".
        }
    }
    include_once 'includes/header.inc.php'; // Permet d'insérer l'en-tête de la page web. (fichier: /includes/header.inc.php)
    $smarty->display('Compte.tpl'); // Permet d'afficher le contenu de la page "articles.tpl".
    include_once 'includes/recherche.inc.php';
    include_once 'includes/menu.inc.php'; // Permet d'insérer le menu à droite de la page web. (fichier: /includes/menu.inc.php)
    include_once 'includes/footer.inc.php'; // Permet d'insérer le bas de la page web contenant le copyright, etc. (fichier: /includes/footer.inc.php)
} else {
    header('Location: index.php');
}