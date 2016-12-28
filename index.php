<?php

/* J'ouvre une session pour pouvoir communiquer les informations sur le compte connecté.
 * On se connecte à la base de données MySql pour avoir les informations sur les articles publié les différents comptes,
 * les commentaires, etc.
 * On Insère la librairie Smarty pour pouvoirséparer la partie graphique HTML du PHP.
 * Et on test si un utilisateur est connecté ou non.
 */

session_start();
require_once ('settings/bdd.inc.php');
require_once ('settings/init.inc.php');
require_once ('libs/Smarty.class.php');
include_once 'includes/connexion.inc.php';

/*Je créer une variable Smarty pour permettre de communiquer des informations entre les deux pages (Smarty et PHP)
 * J'indique le répertoire qui contient la page Smarty (extension .tpl) qui contient le code html de notre index.
 * J'indique le répertoire qui va contenir les compilation des pages smarty.
 */

$smarty = new Smarty();

$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
//$smarty->setConfigDir('/web/www.example.com/guestbook/configs/');
//$smarty->setCacheDir('/web/www.example.com/guestbook/cache/');

/*Je créer une fonction qui permet de communiquer l'identifiant du premier article affiché sur la page web par rapport
 * au numéro de la page courante.
 */

function returnIndex($bdd, $nbarticleParPage, $pageCourante) {
    $début = ($pageCourante - 1) * $nbarticleParPage;
    return $début;
}

/*On teste si un utilisateur est connecté grâce aux informations stockés dans une variable de session crée lors da sa connection.
 * si un utilisateur est connecté, on créer deux variable smarty à partir de la variable PHP "$_SESSION['Connexion']" pour le premier.
 * et l'identifiant de cet utilisateur grâce à la valeur stocké dans la variable "$_SESSION['Connexion']["id"]" pour le deuxième.
 */

if (isset($_SESSION['Connexion']) && $_SESSION['Connexion']['Status'] == TRUE) {
    $smarty->assign('Connexion', $_SESSION['Connexion']);
    $smarty->assign('id_utilisateur', $_SESSION['Connexion']["id"]);
}

/*Ce test permet de tester si une recherche à été lancé.
 * On teste si dans l'url on trouve les variables "rechercher" et si sa valeur est égale à "Rechercher".
 * Si c'est le cas, on créer une variable qui s'appelle $key avec la valeur de la variable "key" stocké dans l'url,
 * qui va permettre de savoir qu'elle valeur chercher dans la base de donné.
 * On créer une autre variable qui s'appelle $typeRecherche avec la valeur de la variable "typeRecherche" stocké dans l'url,
 * qui va permettre de savoir quel type de recherche l'utilisateur veut rechercher (un titre d'article, un commentaire, etc.)
 * On teste si la variable $typeRecherche contient la valeur "titre", "texte" ou "tous"
 * Si c'est le cas, on teste qu'elle valeur précis entre les trois précédentes contient la variable $typeRecherche pour permettre de
 * mettre différentes à la variable $table.
 * La variable $table va permettre de savoir dans qu'elle table stockées dans la base de données on va chercher les données de
 * recherche.
 * On va faire deux autres tests en testant si $typeRecherche contient la valeur "commentaire" pour le premier test ou bien
 * la valeur "utilisateur" pour le second test.
 * Ces deux tests font exactement la même chose que le premier, il change la valeur de $table en fonction du résultat de $typeRecherche.
 */

if (isset($_GET['rechercher']) AND $_GET['rechercher'] == "Rechercher") {
    $key = $_GET['key'];
    $typeRecherche = $_GET['typeRecherche'];
    if ($typeRecherche == "titre" OR $typeRecherche == "texte" OR $typeRecherche == "tous") {
        if ($typeRecherche == "tous"){
            $typeRecherche = array(1 => "titre", 2 => "texte");
        }
        $table = "articles";
    } else {
        if ($typeRecherche == "commentaire") {
            $table = "commentaires";
        } else {
            if ($typeRecherche == "utilisateur") {
                $table = "utilisateurs";
                $typeRecherche = array(1 => "nom", 2 => "prenom");
            }
        }
    }
    
    /* Une fois tous les tests passés, on crée la variable smarty "typeRecherche" avec la valeur de la variable PHP $typeRecherche.
     * On fait ensuite un test concernant le nombre de valeurs que contient la variable typeRechercher, si il y a deux valeurs, cela veut dire que
     * l'on recherche deux informations pour mener à bien cette recherche, sinon on a besoin que d'une information.
     * Que ce soit avec une ou deux valeurs dans la variable, il y a que la requête SQL qui change, on recherche les informations de la table dont le nom est
     * stocké dans lavariable $table où le ou les valeur(s) stocké dans la variable $typeRecherche resemble à la valeur de la recherche stocké dans $key.
     */
    
    $smarty->assign('typeRecherche', $typeRecherche);
    if(count($typeRecherche) == 2){
        $sth = $bdd->prepare("SELECT * FROM ".$table." WHERE (".$typeRecherche[1]." LIKE :recherche1 OR ".$typeRecherche[1]." LIKE :recherche2)");
        $sth->bindValue(':recherche1', $key, PDO::PARAM_STR);
        $sth->bindValue(':recherche2', $key, PDO::PARAM_STR);
    }else {
        $sth = $bdd->prepare("SELECT * FROM ".$table." WHERE (".$typeRecherche." LIKE :recherche)");
        $sth->bindValue(':recherche', $key, PDO::PARAM_STR);
    }
    /*On éxécute la requête SQL.
     *On stocke le résultat dans une variable sous forme de tableau qui porte le nom de $tab_recherche.
     * on crée une variable qui s'appelle $cbRecherche qui contient le nombre de ligne du tableau que contient la variable $tab_recherche
     * On fait un test Si $cbRecherche est supérieur à zéro pour savoir si il y a des résultats par rapport à la recherche demandée.
     * Si c'est le cas, on indique le nombre d'article à afficher par page dans la variable $nbarticleParPage (ici 2).
     * on calcule le nombre de page qu'il y a grâce au résultat précédent et au nombre d'article par page que l'on a choisit précedement,
     * et on arrondis le résultat en l'insérant dans la variable $nbPages.
     * on teste si la variable "p" est présente dans l'url, si ce n'est pas le cas, la page courante est considéré comme étant la première page.
     * on cré deux variables smarty l'un s'appellant "pageCourante" qui contient la valeur de la variable $pageCourante,
     * et le deuxième s'appelle "tab_recherche" qui contient la valeur de la variable $tab_recherche.
     */
    $sth->execute();
    $tab_recherche = $sth->fetchAll(PDO::FETCH_BOTH);
    $cbRecherche = count($tab_recherche);
    if($cbRecherche > 0){
        $nbarticleParPage = 2;
        $nbPages = ceil($cbRecherche / $nbarticleParPage);
        $smarty->assign('nbPages', $nbPages);
        $pageCourante = isset($_GET['p']) ? $_GET['p'] : 1;
        $smarty->assign('pageCourante', $pageCourante);
        $smarty->assign('tab_recherche', $tab_recherche);
    }
}else {
    
/* Sinon si l'utilisateur ne fait pas de recherche, on teste si il y a la variable "id" dans l'url,
 * cela va permettre de savoir si l'utilisteur a cliqué sur un article en particulier.
 * Si c'est le cas, on crée une variable smarty "id" qui contient la valeur de la variable "id" dans l'url.
 * On recherche les informations de l'article qui possède l'identifiant trouvé précedement grâve à une requête MySQL.
 * on éxecute la commande SQL et on stocke le résultat sous forme de tableau dans la variable $tab_articles.
 * On crée une variable smarty "tab_article" grâce au résultat vue précdement.
*/
    
    if (isset($_GET["id"])) {
        $smarty->assign('id', $_GET['id']);
        $sth = $bdd->prepare("SELECT id, titre, texte, DATE_FORMAT(date, '%d/%m/%Y') as date_fr, id_utilisateur FROM articles WHERE id = :id");
        $sth->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
        $sth->execute();
        $tab_articles = $sth->fetchAll(PDO::FETCH_BOTH);
        $smarty->assign('tab_articles', $tab_articles);
        
        /*On enregistre le lien qui seras le lien de l'article cliqué par l'utilisateur et on la stocke dans la variable $url.
         * On stocke la dâte au moment ou l'utilisateur se trouve sur l'ordinateur.
         * on cré trois variables smarty, la première "url" contient la valeur de la variable $url, la seconde "id_article" contient
         * la valeur de la variable $id et la troisième "date" contient la valeur de $date.
         */
        
        $url = 'http://' . $_SERVER['SERVER_NAME'] . '/monsite/index.php?titre=' . $_GET['titre'].'&id='.$_GET['id'];
        $date = date("Y-m-d");
        $smarty->assign('url', $url);
        $smarty->assign('id_article', $_GET['id']);
        $smarty->assign('date', $date);
        
        /*Une fois que l'on a les informations pour l'article, on va traiter la partie des comlmentaires reliés à ce dernier.
         * On indique le nombre de commentaire par page (ici 2) et on stocke l'information dans la variable $numComPage.
         * on compte le nombre de commentaires qu'il y a pour l'article cliqué par l'utilisateur grâce à une commande MySQL.
         * On éxécute la commande et on stocke le résultat sous forme d'un tableau dans la variable $tabNumCom.
         * On fait un calcul avec la variable $tabNumCom[0]['mbComPage'] et $numComParPage pour avoir le nombre total de pages (arrondis au supérieur)
         * qu'il y auras par rapport au nombre de commentaires qu'il y a dans la base de données.
         * On crée deux variables smarty, le premier "tablnumCom" qui contient la valeur de la valeur $tabNumCom et le deuxième "nbComPages" qui contient la valeur de la variable $nbComPages. 
         */
        
        $numComParPage = 2;
        $numCom = $bdd->prepare("SELECT COUNT(*) as mbComPage FROM commentaires WHERE commentaires.id_article = :id_article");
        $numCom->bindValue(':id_article', $_GET['id'], PDO::PARAM_INT);
        $numCom->execute();
        $tabNumCom = $numCom->fetchAll(PDO::FETCH_BOTH);
        $nbComPages = ceil($tabNumCom[0]['mbComPage'] / $numComParPage);
        $smarty->assign('tablnumCom', $tabNumCom);
        $smarty->assign('nbComPages', $nbComPages);

        /*Maintenant on veux savoir sur qu'elle page de commentaires l'utilisateur se trouve,
         * pour cela on fait un test si la variable p se trouve dans l'url,
         * si c'est le cas, la variable $pageCourante est égale à la valeur contenue dans cette variable.
         * sinon, la variable $pageCourante est égale à 1.
         * On crée une variable smarty "pageCourante" qui contient la valeur de la variable $pageCourante.
         * ont appelle la fonction "returnIndex" et on stocke le résultat dans la variable $indexDepart.
         * Cette variable va permettre de dire l'identifiant du premier commentaire affiché par rapport au numéro de la page courante.
         */
        
        $pageCourante = isset($_GET['p']) ? $_GET['p'] : 1;
        $smarty->assign('pageCourante', $pageCourante); // Création de la variable smarty "pageCourante" avec le résultat de la variable $pageCourante.
        $indexDepart = returnIndex($bdd, $numComParPage, $pageCourante);

        /* On sélectionne les deux commentaire qui correspondent à la page courante grâce à une requête SQL.4
         * on éxécute la commande.
         * et on met le résultat sous forme de tableau dans une variable qui s'appelle $tab_com.
         * on crée une variable smarty "rab_com" qui contient la valeur de la variable $tab_com.
         */
        
        $com = $bdd->prepare("SELECT commentaires.id_utilisateur, utilisateurs.logo, utilisateurs.nom, utilisateurs.prenom, commentaires.titre, commentaires.commentaire, DATE_FORMAT(commentaires.date, '%d/%m/%Y') as date_fr FROM commentaires, utilisateurs WHERE commentaires.id_utilisateur = utilisateurs.id AND commentaires.id_article = :id_article LIMIT :indexDepart, :numCommPage");
        $com->bindValue(':id_article', $_GET['id'], PDO::PARAM_INT);
        $com->bindValue(':indexDepart', $indexDepart, PDO::PARAM_INT);
        $com->bindValue(':numCommPage', $numComParPage, PDO::PARAM_INT);
        $com->execute();
        $tab_com = $com->fetchAll(PDO::FETCH_BOTH);
        $smarty->assign('tab_com', $tab_com);
    } else {
        
        /* Si aucun des tests n'est réussi, cela veut dire que nous sommes sur la page qui montre tous les articles dans la base de données.
         * on commence par dire le nombre d'article que l'on veut affiché sur la page (ici 2).
         * on teste si la variable "p" existe dans l'url, si c'est le cas, la valeur de la valeur est stocké dans la variable $pageCourante.
         * sinon, la variable $pageCourante est égale à 1.
         * On crée la variable smarty "pageCourante" qui contient la valeur de la variable $pageCourante.
         * On appelle la fonction "returnIndex()" et on stocke le résultat dans la variable $indexDepart qui permet de dire l'identifiant
         * du premier article à affiché par rapport à la page courante.
         */
        
        $nbarticleParPage = 2;
        $pageCourante = isset($_GET['p']) ? $_GET['p'] : 1;
        $smarty->assign('pageCourante', $pageCourante);
        $indexDepart = returnIndex($bdd, $nbarticleParPage, $pageCourante);

        /* On Compte le nombre d'articles qu'il y a dans la base de données et qui peuvent être publié.
         * On éxécute la commande SQL et on met le résultat sous forme de tableau dans la variable $nbarticle.
         * on fait un calcul avec les variables $nbarticle[0]['nbArticles'] et $nbarticleParPage qui permet de dire le nombre de pages qui'il y a
         * par rapport au nombre d'article trouvés dans la base de données, et on arrondis lerésultat au supérieur et on le stocke dans la variable nbPages.
         * on crée une variable smarty "nbPages" qui contient la valeur de la variable $nbPages.
         */

        $sql = $bdd->prepare("SELECT COUNT(*) as nbArticles FROM articles WHERE publie = :publie");
        $sql->bindValue(':publie', 1, PDO::PARAM_INT);
        $sql->execute();
        $nbarticle = $sql->fetchAll(PDO::FETCH_BOTH);
        $nbPages = ceil($nbarticle[0]['nbArticles'] / $nbarticleParPage);
        $smarty->assign('nbPages', $nbPages);

        /* On sélectionne les informations des deux articles à afficher sur la page, avec pour premier article l'id contenu dans la variable $indexDepart
         * on éxécute la commande SQL et on stocke le résultat sous forme d'un tableau dans la variable $tab_articles.
         * on crée une variable smarty "tab_article" avec la valeur de la variable $tab_articles.
         */
        
        $sth = $bdd->prepare("SELECT id, titre, texte, DATE_FORMAT(date, '%d/%m/%Y') as date_fr, id_utilisateur FROM articles WHERE publie = :publie LIMIT $indexDepart, $nbarticleParPage");
        $sth->bindValue(':publie', 1, PDO::PARAM_INT);
        $sth->execute();
        $tab_articles = $sth->fetchAll(PDO::FETCH_BOTH);
        $smarty->assign('tab_articles', $tab_articles);
    }  
}

    /* maintenant que tous les tests et calculs sont faient, on va afficher la page web.
     * on affiche d'abord l'en tête de page.
     * ensuite cette page.
     * le menu recherche
     * le menu
     * et enfin le pied de page.
     */

    include_once 'includes/header.inc.php';
    $smarty->display('index.tpl');
    include_once 'includes/recherche.inc.php';
    include_once 'includes/menu.inc.php';
    include_once 'includes/footer.inc.php';
?>
