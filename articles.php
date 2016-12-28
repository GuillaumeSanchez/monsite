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

function InfosArticle($bdd, $id) { // Fonction permettant de récupérer les données de l'article à modifier.
    $sql = $bdd->prepare("SELECT id, titre, texte, publie FROM articles WHERE id = :id"); /* Permet de sélectionner l'id, le titre, le texte et la valeur de publie de l'article correspondant
      à l'id de l'article à modifier */
    $sql->bindValue(':id', $id, PDO::PARAM_INT); // rajout de la valeur de l'id.
    $sql->execute(); // éxécution de la requête SQL.
    $infos = $sql->fetchAll(PDO::FETCH_BOTH); //Récupération des résultats sous forme de tableaux stockés dans la variable $infos.
    return $infos; // retourne la variable $infos.
}

if (isset($_SESSION['Connexion']) && $_SESSION['Connexion']['Status'] == TRUE) {
    if (isset($_POST['bouton'])) {// Si la variable $_POST['bouton'] existe alors ...
        switch ($_POST['bouton']) {//Si la variable $_POST['bouton'] a pour valeur ..
            case 'Ajouter'://.."ajouter alors ..
                $date_ajout = date("Y-m-d"); //la variable $date_ajout contient la date au format MySQL.
                $_POST['date_ajout'] = $date_ajout; // rajout d'une ligne dans le tableau $_POST avec comme contenue la valeur de la variable $date_ajout.
                if (isset($_POST['publie'])) { // Si la variable $_POST['publie'] existe alors .
                    $_POST['publie'] = 1; // La valeur de $_POST['publie'] = 1
                } else {//.sinon.
                    $_POST['publie'] = 0; // La valeur de $_POST['publie'] = 0
                }
                // Equivalent
                //condition ternaire
                //$_POST['publie'] = isset($_POST['publie']) ? 1: 0;
                //? = alors
                //: = ou si le test est contraire
                print_r($_SESSION['Connexion']['id']);
                if ($_FILES['logo']['error'] == 0) { //Si la variable $_FILES['image']['error'] = 0 alors.
                    $sth = $bdd->prepare("INSERT INTO articles (titre, texte, publie, date, id_utilisateur) VALUES(:titre, :texte, :publie, :date, :id_utilisateur)"); /* Permet d'insérer dans la table articles des valeurs
                      dans les colonnes titre, texte, publie, date. */
                    $sth->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR); //Insertion de la valeur de :titre
                    $sth->bindValue(':texte', $_POST['texte'], PDO::PARAM_STR); //Insertion de la valeur de :texte
                    $sth->bindValue(':publie', $_POST['publie'], PDO::PARAM_INT); //Insertion de la valeur de :publie
                    $sth->bindValue(':date', $_POST['date_ajout'], PDO::PARAM_STR); //Insertion de la valeur de :date
                    $sth->bindValue(':id_utilisateur', $_SESSION['Connexion']['id'], PDO::PARAM_INT); //Insertion de la valeur de :publie
                    $sth->execute(); //Execution de la requête SQL.
                    $id = $bdd->lastInsertId(); //donne l'id de la dernière ligne que l'on a r'ajouter dans la table de la base de données.
                    move_uploaded_file($_FILES['logo']['tmp_name'], dirname(__FILE__) . "/img/articles/$id.png"); /* Permet de déplacer l'image de son emplacement temporaire dans un autre dossier
                      Ici "/img" et de le renommer par l'id de la ligne insérer précedement. */
                    $_SESSION['ajout_article'] = TRUE; //Création d'une variable de session s'appellant $_SESSION['ajout_article'] et ayant pour valeur TRUE. (pas forcément booléen).
                    header("Location: articles.php"); //Permet de diriger l'utilisateur vers une autre page ici "articles.php".
                } else {//.sinon.
                    echo 'Erreur dans le chargment de l\'image'; //Affiche qu'il y a une erreur avec l'image.
                    exit(); // Permet d'arréter le script courant.
                }
                break; // Permet de sortir de la structure switch.

            case 'Modifier'://.."Modifier" alors ..
                $date_ajout = date("Y-m-d"); //la variable $date_ajout contient la date au format MySQL.
                $_POST['date_ajout'] = $date_ajout; // rajout d'une ligne dans le tableau $_POST avec comme contenue la valeur de la variable $date_ajout.
                if (isset($_POST['publie'])) { // Si la variable $_POST['publie'] existe alors .
                    $_POST['publie'] = 1; // La valeur de $_POST['publie'] = 1
                } else {//.sinon.
                    $_POST['publie'] = 0; // La valeur de $_POST['publie'] = 0
                }
                // Equivalent
                //condition ternaire
                //$_POST['publie'] = isset($_POST['publie']) ? 1: 0;
                //? = alors
                //: = ou si le test est contraire
                if ($_FILES['logo']['error'] == 0) {//Si la variable $_FILES['image']['error'] = 0 alors.
                    $sth = $bdd->prepare("UPDATE articles SET titre = :titre, texte = :texte, publie = :publie, date = :date WHERE id = :id"); /* Mettre à jour dans articles les valeurs
                      dans les colonnes titre, texte, publie, date dans la ligne correspondant à l'ide le l'article à modifier. */
                    $sth->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR); //Insertion de la valeur de :titre
                    $sth->bindValue(':texte', $_POST['texte'], PDO::PARAM_STR); //Insertion de la valeur de :texte
                    $sth->bindValue(':publie', $_POST['publie'], PDO::PARAM_INT); //Insertion de la valeur de :publie
                    $sth->bindValue(':date', $_POST['date_ajout'], PDO::PARAM_STR); //Insertion de la valeur de :date
                    $sth->bindValue(':id', $_POST['id'], PDO::PARAM_INT); //Insertion de la valeur de :id
                    $sth->execute(); //Execution de la requête SQL.
                    $id = $_POST['id']; //Création de la variable $id contenant la valeur de la variable $_POST['id'].
                    unlink("/img/articles/$id.png"); // Supprimer l'image correspondant à l'article modifier.
                    move_uploaded_file($_FILES['logo']['tmp_name'], dirname(__FILE__) . "/img/articles/$id.png"); /* Permet de remplacer l'image par la nouvelle choisie par l'auteur de l'article,
                      Et de la mettre dans le fichier "img" avec pour nom l'id de l'article. */
                    $_SESSION['modifier_article'] = TRUE; //Création d'une variable de session s'appellant $_SESSION['modifier_article'] et ayant pour valeur TRUE. (pas forcément booléen).
                    header("Location: articles.php"); //Permet de diriger l'utilisateur vers une autre page ici "articles.php".
                } else {//.sinon.
                    echo 'Erreur dans le chargment de l\'image'; //Affiche qu'il y a une erreur avec l'image.
                    exit(); // Permet d'arréter le script courant.
                }
                break; // Permet de sortir de la structure switch.
        }
    } else {//...sinon...
        if (isset($_POST['Modifier']) AND $_POST['Modifier'] == 'Modifier') {//Si la variable $_POST['Modifier'] existe et qu'elle est égale à "Modifier" alors ..
            $status = $_POST['Modifier']; //Création de la variable $status qui est égale à la variable $_POST['Modifier']. Elle permet de modifier le texte du bouton.
            $id = $_POST['id']; //Création de la variable $id prennant la valeur de la variable $_POST['id']. Permet de retrouver les informations de l'article.
            $infos = InfosArticle($bdd, $id); //Création de la variable $infos dont la valeur est égale au résultat de la fonction InfosArticle(). Elle permet de remplir les champs de la page.
            $smarty->assign('infos', $infos); //Création d'un variable smarty "infos" qui est égale à la valeur de la variable $infos.
            $smarty->assign('status', $status); //Création d'un variable smarty "status" qui est égale à la valeur de la variable $status.
        } else {//..sinon..
            if (isset($_SESSION['ajout_article'])) {//Si la variable $_SESSION['ajout_article'] exitse alors.
                $smarty->assign('ajout_article', $_SESSION['ajout_article']); //Création de la variable smarty "ajout_article" qui est égale à la variable $_SESSION['ajout_article'].
                unset($_SESSION['ajout_article']); //Permet de supprimer la variable de session $_SESSION['ajout_article'].
            }
            if (isset($_SESSION['modifier_article'])) {//Si la variable $_SESSION['modifier_article'] exitse alors.
                $smarty->assign('modifier_article', $_SESSION['modifier_article']); //Création de la variable smarty "modifier_article" qui est égale à la variable $_SESSION['modifier_article'].
                unset($_SESSION['modifier_article']); //Permet de supprimer la variable de session $_SESSION['modifier_article'].
            }
            $status = "Ajouter"; //Création de la variable $status qui est égale à "Ajouter". Elle permet de modifier le texte du bouton.
            $infos[0]['id'] = ""; //Création du tableau $infos[0], ici on rajoute la valeur $infos[0]['id'] = "". Elle permet de remplir les champs de la page.
            $infos[0]['titre'] = ""; //on rajoute la valeur $infos[0]['titre'] = "".
            $infos[0]['texte'] = ""; //on rajoute la valeur $infos[0texteid'] = "".
            $infos[0]['publie'] = 0; //on rajoute la valeur $infos[0]['publie'] = 0.
            $smarty->assign('infos', $infos); //Création de la variable smarty "infos" qui est égale à la variable $infos.
            $smarty->assign('status', $status); //Création de la variable smarty "status" qui est égale à la variable $status.
        }
        include_once 'includes/header.inc.php'; // Permet d'insérer l'en-tête de la page web. (fichier: /includes/header.inc.php)
        $smarty->display('articles.tpl'); // Permet d'afficher le contenu de la page "articles.tpl".
        include_once 'includes/recherche.inc.php';
        include_once 'includes/menu.inc.php'; // Permet d'insérer le menu à droite de la page web. (fichier: /includes/menu.inc.php)
        include_once 'includes/footer.inc.php'; // Permet d'insérer le bas de la page web contenant le copyright, etc. (fichier: /includes/footer.inc.php)
    }
} else {
    header('Location: index.php');
}
?>

