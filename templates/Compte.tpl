<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
<link href="css/CSS.css" rel="stylesheet" type="text/css"/>

<script src="js/jquery-3.1.1.js" type="text/javascript"></script>
<script src="js/javascript.js" type="text/javascript"></script>


<div class="span8 col-lg-9">
    {if isset($infos)}
        <div class="row">
            <div class="col-lg-12">
                <div class="menu">
                     <h1><strong>Mon Compte</strong></h1>
                </div>
                </br>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <img src='img/{$infos[0]["logo"]}' alt="logo" width="{$logCompte['width']}px" height="{$logCompte['height']}px" class="img-thumbnail"/>
            </div>
            <div class="col-lg-12">
                <form action = "Compte.php" method = "post" enctype = "multipart/form-data" id = "form_compte_logo" name = "form_compte_logo">
                    <input type="hidden" name = "id" value="{$infos[0]["id"]}"/>
                    <label for = "image">Voulez vous modifier votre logo ? </label>
                    <div class = "input"><input type = "file" name = "logo" id = "logo" ></div>
                    </br>
                    <img class="img" id="img"/>
                    </br>
                    </br>
                    <div id="submitLog" class="form-actions">                        
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class='col-lg-12'>
                <div class="menu">
                     <h2><strong>Informations personnelles</strong></h2>
                </div>
            </div>
            <div class="row">
                <div class='col-lg-2'>
                </div>
                <div class="col-lg-10">
                    <form action = "Inscription.php" method = "post" enctype = "multipart/form-data" id = "form_Infos_perso" name = "form_Infos_perso">
                        <input type="hidden" name = "id" value="{$infos[0]["id"]}"/>
                        <table border='0'>
                            <tr>
                                <td>
                                    <div class="pull-right"><h3>Nom :&emsp;</h3></p></div>
                                </td>
                                <td>
                                    <h4> {$infos[0]["nom"]}</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="pull-right"><h3>Prenom :&emsp;</h3></div>
                                </td>
                                <td>
                                    <h4>{$infos[0]["prenom"]}</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="pull-right"><h3>Adresse Email :&emsp;</h3></div>
                                </td>
                                <td>
                                    <h4>{$infos[0]["email"]}</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="pull-right"><h3>Votre rang :&emsp;</h3></div>
                                </td>
                                <td>
                                    <h4>{$infos[0]["rang"]}</h4>
                                </td>
                            </tr>
                        </table>
                        </br>
                        </br>
                        <div class="col-lg-3">
                        </div>
                        <div class = "col-lg-9 form-actions">
                            <input type = "submit" name = "bouton" value = "Modifier vos Informations" class = "btn btn-large btn-primary">
                        </div>
                    </form>
                    </br>
                </div>
            </div>
            <div class="row">
                <div class='col-lg-12'>
                    <div class="menu">
                         <h2><strong>Votre Mot de Passe</strong></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class='col-lg-2'>
                </div>
                <div class="col-lg-10">
                    <form action = "Inscription.php" method = "post" enctype = "multipart/form-data" id = "form_compte_logo" name = "form_compte_logo">
                        <div class="col-lg-3">
                        </div>
                        <div class = "col-lg-9 form-actions">
                                <input type = "submit" name = "bouton" value = "Modifier votre mot de passe" class = "btn btn-large btn-primary">
                                </br>
                                </br>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class=' menu col-lg-12'>
                </div>
                </br>
            </div>
        </div>
    {/if}
</div>