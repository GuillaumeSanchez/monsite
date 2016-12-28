<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
<link href="css/CSS.css" rel="stylesheet" type="text/css"/>
<script src="../js/javascript.js" type="text/javascript"></script>

<div class="col-lg-3">
    <div class="menu">
        <h3><center>Recherche<center></h3>
                    </div>
                    <form id='form_recherche' method="post" enctype = "multipart/form-data" name='form_recherche'>
                        <label></label>Vous rechercher :</label>
                        <select name="typeRecherche" id="typeRecherche">
                            <option value="tous" selected="selected">un article(titre ou texte)</option>
                            <option value="titre">un titre</option>
                            <option value="commentaire">un commentaire</option>
                            <option value="texte">un texte dans l'article</option>
                            <option value="utilisateur">un blogueur</option>
                        </select>
                        </br>
                        </br>
                        <center>
                            <input type="text" id="key" value="" name="key"/>
                        </center>
                        </br>
                        <center>
                            <input type="submit" value='Rechercher' name='rechercher' id='rechercher' class='btn-large btn-primary'/>
                        </center>
                    </form>
                    </div>
                    <div class='row'>