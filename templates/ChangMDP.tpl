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
                    <h1><strong>Modifier votre mot de passe</strong></h1>
                </div>
                </br>
            </div>
        </div>
        <div class="row">
            <div class='col-lg-2'>
            </div>
            <div class="col-lg-10">
                <form  method = "post" enctype = "multipart/form-data" id = "form_information" name = "form_information">
                    <input type="hidden" name = "id" value="{$infos[0]["id"]}"/>
                    <table border='0'>
                        <tr>
                            <td>
                                <div class="pull-right"><h3>Nouveau mot de passe :&emsp;</h3></p></div>
                            </td>
                            <td>
                                <h4><input type="text" class="form-control" id="newmdp" name="newmdp" value=""></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="pull-right"><h3>Confirmer votre mot de passe :&emsp;</h3></div>
                            </td>
                            <td>
                                <h4><input type="text" class="form-control" id="mdpverif" name="mdpverif" value=""></h4>
                            </td>
                        </tr>
                    </table>
                    <div class="col-lg-3">
                    </div>
                    <div class = "col-lg-9 form-actions">
                        <input id="mdp" type = "submit" name = "bouton" value = "Modifier votre mot de passe" class = "btn btn-large btn-primary">
                    </div>        
                </form>
                </br>
            </div>
        </div>
        <div class="row">
            <div class="menu col-lg-12">
            </div>
            </br>
        </div>
    {/if}
</div>