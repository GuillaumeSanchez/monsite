<?php

/* Ce programme sert à tester si au démarrage il y a un cookie de connexion qui permet 
 * de savoir les coordonnées d'un utilisateur qui doit resté connecté.
 * Si le cookie est détecté et que le champ "sid" n'est pas vide alors,
 * on crée une variable avec la valeur de la variable global $_COOKIE['sid'].
 * on sélectionne les coordonnées de l'utilisateur grâce à la valeur de la variable $sid.
 * on éxécute la commande SQL.
 * on compte le nombre de résultat obtenue et on stocke le résultat dans la variable $count.
 * on récupére le résultat de la première requête SQL sous forme de tableau et on le stocke dans la variable $result 
 */ 

if (isset($_COOKIE['sid']) && !empty($_COOKIE['sid'])) {
    $sid = $_COOKIE['sid'];
    $sth = $bdd->prepare("SELECT * FROM utilisateurs WHERE sid = :sid");
    $sth->bindValue(':sid', $sid, PDO::PARAM_STR);
    $sth->execute();
    $count = $sth->rowCount();
    $result = $sth->fetchAll(PDO::FETCH_BOTH);
    
    /* on testsi la valeur de la variable $count est supérieur à 0
     * si c'est le cas, on récupère différentes informations qui sont stockés dans le tableau $result, comme par
     * exemple le nom, le prénom de l'utilisateur qui doit être connecté.
     * puis on crée la valeur de session $_SESSION['Connexion'] qui est un tableau contenant toutes les informations récuppérées précedement.
     * si la variable $count est égale à 0,
     * on crée la variable de session $_SESSION['Connexion'] avec les même champs que le précedent mais avec que des chaîne de caractère vide. 
     */
    
    if ($count > 0) {
        $nom = $result[0]['nom'];
        $prenom = $result[0]['prenom'];
        $rang = $result[0]['rang'];
        $id = $result[0]['id'];
        $_SESSION['Connexion'] = array('Nom' => $nom, 'Prenom' => $prenom, 'Status' => TRUE, 'sid' => $sid, 'rang' => $rang, 'id' => $id);
    } else {
        $_SESSION['Connexion'] = array('Nom' => "", 'Prenom' => "", 'Status' => FALSE);
    }
}  else {
    
    /* Si le cookie de connexion n'existe pas ou que la valeur de $_COOKIE["sid"] est null alors,
     * on supprime la variable globale de session $_SESSION['Connexion'].
     */
    
    unset($_SESSION['Connexion']);
}
?>
