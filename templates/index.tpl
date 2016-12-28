<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
<link href="css/CSS.css" rel="stylesheet" type="text/css"/>

<script src="js/jquery-3.1.1.js" type="text/javascript"></script>
<script src="js/javascript.js" type="text/javascript"></script>

<div class="span8 col-lg-9">
    
    {*Bonjour je suis un commentaire*}
    {if isset($tab_recherche)}
        {if $typeRecherche == "titre" || $typeRecherche == "texte" || $typeRecherche == "tous"}
            {foreach from=$tab_recherche item=value}
                <h2>
                    <a href='http://monsuperblog.esy.es/monsite/index.php?titre={$value['titre']}&id={$value['id']}'>{$value['titre']}</a>
                    <form action = "articles.php" method = "post" enctype = "multipart/form-data" id = "modif-article" name = "modif-article">
                        <div class = "input"><input type = "hidden" name = "id" value="{$value['id']}"/></div>
                    </form>
                </h2>
                    {if isset($Connexion) AND $Connexion['Status']}
                        {if $Connexion['rang'] == 1 OR $Connexion['id'] == $value['id_utilisateur']}
                            <form action = "articles.php" method = "post" enctype = "multipart/form-data" id = "modif-article" name = "modif-article">
                                <div class = "input"><input type = "hidden" name = "id" value="{$value['id']}"/></div>
                                <input type="submit" name="Modifier" value="Modifier"/></a>
                            </form>
                            </br>
                        {/if}
                    {/if}      
                <img src="img/articles/{$value['id']}.png" width="100px" alt="titre"/>
                <p style="text-align: justify">{$value['texte']}</p>
                <p><em><u>Publié le : {$value['date_fr']}</u></em></p>
            {/foreach}
            <ul class="pagination">
                    <li><a>Page :</a></li>
                    {for $i=1 to $nbPages}
                        {if $i == $pageCourante}
                        <li class="active"><a href="http://monsuperblog.esy.es/monsite/index.php?p={$i}">{$i}</a></li>
                        {else}
                        <li><a href="http://monsuperblog.esy.es/monsite/index.php?p={$i}">{$i}</a></li>
                        {/if}
                    {/for}
            </ul>
        {/if}
        {if $typeRecherche == "commentaire"}
            {foreach from=$tab_recherche item=value}
                </br>
                <div class='row'>
                    <div class='col-lg-2'>
                        <img src='img/{$value['logo']}' width="80px" name='logo' id='logo'>
                    </div>
                    <div class='col-lg-10'>
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>
                                    {$value["titre"]}
                                </h4>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-12'>
                                {$value['commentaire']}
                                <p><em><u>Publié le : {$value['date_fr']}</u></em></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class='col-lg-12'>
                        <h4>{$value['nom']} {$value['prenom']}</h4>
                    </div>
                </div>
            {/foreach}
            <ul class="pagination">
                <li><a>Page :</a></li>
                {for $i=1 to $nbComPages}
                    {if $i == $pageCourante}
                    <li class="active"><a href="{$url}&p={$i}">{$i}</a></li>
                    {else}
                    <li><a href="{$url}&p={$i}">{$i}</a></li>
                    {/if}
                {/for}
            </ul>
        {/if}
        {if $typeRecherche == "utilisateur"}
            <div class='row'>
                <div class='col-lg-2'>
                    <img src='img/{$value['logo']}' width="80px" name='logo' id='logo'>
                </div>
            </div>
            <div class="row">
                <div class='col-lg-12'>
                    <h4>{$value['nom']} {$value['prenom']}</h4>
                </div>
            </div>
        {/if}
    {else}
        {if isset($id)}
            {foreach from=$tab_articles item=value}
                <h2>
                    {$value['titre']}
                    <form action = "articles.php" method = "post" enctype = "multipart/form-data" id = "modif-article" name = "modif-article">
                        <div class = "input"><input type = "hidden" name = "id" value="{$value['id']}"/></div>
                    </form>
                </h2>
                    {if isset($Connexion) AND $Connexion['Status']}
                        {if $Connexion['rang'] == 1 OR $Connexion['id'] == $value['id_utilisateur']}
                            <form action = "articles.php" method = "post" enctype = "multipart/form-data" id = "modif-article" name = "modif-article">
                                <div class = "input"><input type = "hidden" name = "id" value="{$value['id']}"/></div>
                                <input type="submit" name="Modifier" value="Modifier"/></a>
                            </form>
                            </br>
                        {/if}
                    {/if}      
                <img src="img/articles/{$value['id']}.png" width="100px" alt="titre"/>
                <p style="text-align: justify">{$value['texte']}</p>
                <p><em><u>Publié le : {$value['date_fr']}</u></em></p>
                </br>
            {/foreach}
            <div class='row'>
                <div class='col-lg-12 menu'>
                    <h2>Commentaires</h2>
                </div>
            </div>
            <div class='row'>
                <div class='col-lg-12'>
                    {if isset($Connexion) AND $Connexion['Status']}            
                        <form method = "post" enctype = "multipart/form-data" id = "form_commentaire" name = "form_commentaire">
                            <div class='menu2'>
                                <input type="hidden" name="url" id="url" value="{$url}">
                                <input type="hidden" name="id_article" id="id_article" value="{$id_article}">
                                <input type="hidden" name="id_utilisateur" id="id_utilisateur" value="{$id_utilisateur}">
                                <input type="hidden" name="date" id="date" value="{$date}">
                                &emsp;Titre :
                                </br>
                                &emsp;<input type='texte' name='titre' id='titre'>
                                </br>
                                &emsp;Commentaire :
                                </br>
                                &emsp;<textarea name='commentaire' id='commentaires'></textarea>
                                </br>
                                &emsp;<input type='submit' id='commentaire' class='btn-large btn-primary' value='Poster le commentaire'>
                                </br>
                                </br>
                            </div>
                        </form>            
                    {else}
                        <h4>Si vous voulez poster un commentaire veuillez vous connecter</h4>
                        <a href='http://monsuperblog.esy.es/monsite/connexion.php'<input type='button' name='connexion' id='connexion' value='Connexion'></a>
                    {/if}
                </div>
            </div>
            {if $tablnumCom[0]["mbComPage"] != 0}
                {foreach from=$tab_com item=value}
                    </br>
                    <div class='row'>
                        <div class='col-lg-2'>
                            <img src='img/{$value['logo']}' width="80px" name='logo' id='logo'>
                        </div>
                        <div class='col-lg-10'>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4>
                                        {$value["titre"]}
                                    </h4>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-lg-12'>
                                    {$value['commentaire']}
                                    <p><em><u>Publié le : {$value['date_fr']}</u></em></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-lg-12'>
                            <h4>{$value['nom']} {$value['prenom']}</h4>
                        </div>
                    </div>
                {/foreach}
                <ul class="pagination">
                    <li><a>Page :</a></li>
                    {for $i=1 to $nbComPages}
                        {if $i == $pageCourante}
                        <li class="active"><a href="{$url}&p={$i}">{$i}</a></li>
                        {else}
                        <li><a href="{$url}&p={$i}">{$i}</a></li>
                        {/if}
                    {/for}
                </ul>
            {else}
                <h4>Aucun commentaire n'a été posté.</h4>
            {/if}
        {else}
            {foreach from=$tab_articles item=value}
                <h2>
                    <a href='http://monsuperblog.esy.es/monsite/index.php?titre={$value['titre']}&id={$value['id']}'>{$value['titre']}</a>
                    <form action = "articles.php" method = "post" enctype = "multipart/form-data" id = "modif-article" name = "modif-article">
                        <div class = "input"><input type = "hidden" name = "id" value="{$value['id']}"/></div>
                    </form>
                </h2>
                    {if isset($Connexion) AND $Connexion['Status']}
                        {if $Connexion['rang'] == 1 OR $Connexion['id'] == $value['id_utilisateur']}
                            <form action = "articles.php" method = "post" enctype = "multipart/form-data" id = "modif-article" name = "modif-article">
                                <div class = "input"><input type = "hidden" name = "id" value="{$value['id']}"/></div>
                                <input type="submit" name="Modifier" value="Modifier"/></a>
                            </form>
                            </br>
                        {/if}
                    {/if}      
                <img src="img/articles/{$value['id']}.png" width="100px" alt="titre"/>
                <p style="text-align: justify">{$value['texte']}</p>
                <p><em><u>Publié le : {$value['date_fr']}</u></em></p>
            {/foreach}
            <ul class="pagination">
                    <li><a>Page :</a></li>
                    {for $i=1 to $nbPages}
                        {if $i == $pageCourante}
                        <li class="active"><a href="http://monsuperblog.esy.es/monsite/index.php?p={$i}">{$i}</a></li>
                        {else}
                        <li><a href="http://monsuperblog.esy.es/monsite/index.php?p={$i}">{$i}</a></li>
                        {/if}
                    {/for}
            </ul>
        {/if}
    {/if}
</div>