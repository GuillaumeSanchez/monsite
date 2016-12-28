<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Mon blog</title>
        <meta name="description" content="Petit blog pour m'initier à PHP">
        <meta name="author" content="Votre Nom">

        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>

    </head>

    <body>
        <div class="container">
            <div class="row page-header well">
                <div class="col-lg-10">
                    <h1>Mon Blog <small>Pour m'initier à PHP</small</h1>
                </div>
                <div class="col-lg-2" align="right">
                    <?php
                    if (isset($_SESSION['Connexion']) && $_SESSION['Connexion']['Status'] == TRUE) {/* Si la variable $_SESSION['Connexion'] existe 
                      et que la valeur de $_SESSION['Connexion']['Status'] = TRUE alors ... */
                        $sql = $bdd->prepare("SELECT logo FROM utilisateurs WHERE sid = :sid");
                        $sql->bindValue(':sid', $_SESSION['Connexion']['sid'], PDO::PARAM_STR);
                        $sql->execute(); //Execution de la requête SQL.
                        $logo = $sql->fetchAll(PDO::FETCH_BOTH);
                        
                        $fichier = "img/" . $logo[0]["logo"];
                        $dimensions = getimagesize($fichier);
                        if ((($dimensions[1]) / 100) * 25 <= 70) {
                            $logHeader = array("width" => (($dimensions[0]) / 100) * 25, "height" => (($dimensions[1]) / 100) * 25);
                        } else {
                            $oldHeight = (($dimensions[1]) / 100) * 25;
                            $oldWidht = (($dimensions[0]) / 100) * 25;
                            $div = ((($dimensions[1]) / 100) * 25) / 70;
                            $height = $oldHeight / $div;
                            $width = $oldWidht / $div;
                            $logHeader = array("width" => $width, "height" => $height);
                        }
                        ?>
                        <table border='0'>
                            <tr>
                                <td rowspan='2'>
                                    <img src="img/<?= $logo[0]['logo'] ?>" width="<?=$logHeader['width']?>px" height="<?= $logHeader['height'] ?>px" alt="logo" class="img-thumbnail"/>
                                </td>
                                <td>
                                    <strong>
                                        <?php
                                        echo $_SESSION['Connexion']['Nom'];
                                        ?>
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <?php
                                        echo $_SESSION['Connexion']['Prenom'];
                                        ?>
                                    </strong>
                                </td>
                            </tr>
                        </table>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row">