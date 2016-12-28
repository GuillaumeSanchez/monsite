<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
<link href="css/CSS.css" rel="stylesheet" type="text/css"/>

<script src="js/jquery-3.1.1.js" type="text/javascript"></script>
<script src="../js/javascript.js" type="text/javascript"></script>

<div class="span8 col-lg-9">
    {if isset($ajout_article)}
        <div class="alert alert-warning" role="alert">
            <strong>Félicitation !</strong> Votre article a été ajouté.
        </div>
    {/if}

    {if isset($modifier_article)}
        <div class="alert alert-warning" role="alert">
            <strong>Félicitation !</strong> Votre article a bien été modifié.
        </div>
    {/if}

    {if isset($infos) AND isset($status)}
        <div class = "span8 col-lg-9">
            <form action = "articles.php" method = "post" enctype = "multipart/form-data" id = "form_article" name = "form_article">
                <div class = "clearfix">
                    <label for = "titre">Titre</label>
                    <div class = "input"><input type = "text" name = "titre" id = "titre" value = "{$infos[0]['titre']}"></div>
                </div>
                </br>
                <div class = "clearfix">
                    <label for = "titre">Texte</label>
                    <div class = "input"><textarea name = "texte" id = "texte">{$infos[0]['texte']}</textarea></div>
                </div>
                <div class = "clearfix">
                    <label for = "image">Image</label>
                    <div class = "input"><input type = "file" name = "logo" id = "logo" ></div>
                </div>
                </br>
                <div class = "clearfix">
                    <label for = "publie">Publié</label>
                    {if $infos[0]['publie'] == 1}
                        <div class = "input"><input type = "checkbox" name = "publie" id = "publie" checked/></div>                
                    {else}
                        <div class = "input"><input type = "checkbox" name = "publie" id = "publie"/></div>
                    {/if}
                </div>
                </br>
                <div class = "clearfix">
                    <div class = "input"><input type = "hidden" name = "id" value="{$infos[0]['id']}"/></div>
                </div>

                <div class = "form-actions">
                    <input type = "submit" name = "bouton" value = "{$status}" class = "btn btn-large btn-primary">
                </div>
            </form>
            </br>
        </div>
    {/if}
</div>