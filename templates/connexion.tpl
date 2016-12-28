<div class="span8 col-lg-9">
    
    {*Bonjour je suis un commentaire*}
    
    {if isset($Email) AND isset($mdp) AND $Email == "" AND $mdp == ""}
        <div class = "alert alert-danger" role = "alert">
            <strong>Attention</strong> Veuillez remplir tous les champs s'il vous plait.
        </div>
    {/if}

    {if isset($count) AND $count == 0}
        <div class = "alert alert-warning" role = "alert">
            <strong>Désolé</strong> Mais vous n'avez aucun compte sur notre site.
        </div>    
    {/if}

    <form action = "connexion.php" method = "post" enctype = "multipart/form-data" id = "form_article" name = "form_article">
        <h2>
            LOGIN
        </h2>

        <div class = "clearfix">
            <label>Adresse Email</label>
            <input type="text" class="form-control" id="Email" placeholder="Email" name="Email">
        </div>
        </br>
        <div class = "clearfix">
            <label>Mot de Passe</label>
            <input type="password" class="form-control" id="mdp" placeholder="Mot de passe" name="mdp">
        </div>
        </br>
        <div class = "form-actions">
            <input type = "submit" name = "bouton" value = "Connection" class = "btn btn-large btn-primary">
        </div>
    </form>
    </br>
</div>