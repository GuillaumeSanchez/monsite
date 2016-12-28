<?php
/* Smarty version 3.1.30, created on 2016-12-18 23:00:42
  from "C:\wamp64\www\monsite\templates\Inscription.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5857151ab997b0_70884994',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '454ab0d086b632311adf8495c0e9dde991afa66d' => 
    array (
      0 => 'C:\\wamp64\\www\\monsite\\templates\\Inscription.tpl',
      1 => 1482102009,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5857151ab997b0_70884994 (Smarty_Internal_Template $_smarty_tpl) {
?>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
<link href="css/CSS.css" rel="stylesheet" type="text/css"/>

<?php echo '<script'; ?>
 src="js/jquery-3.1.1.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/javascript.js" type="text/javascript"><?php echo '</script'; ?>
>

<div class="span8 col-lg-9">
    <div class="row">
        <div class="col-lg-12">
            <div class="menu">
                <h1><strong>Inscription</strong></h1>
            </div>
            </br>
        </div>
    </div>
    <div class="row">
        <div class='col-lg-2'>
        </div>
        <div class="col-lg-10">
            <form  method = "post" enctype = "multipart/form-data" id = "form_Inscription" name = "form_Inscription">
                <table border='0'>
                    <tr>
                        <td>
                            <div class="pull-right"><h3>Nom :&emsp;</h3></p></div>
                        </td>
                        <td>
                            <h4><input type="text" class="form-control" id="Nom" name="Nom" value=""></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="pull-right"><h3>Prenom :&emsp;</h3></div>
                        </td>
                        <td>
                            <h4><input type="text" class="form-control" id="Prenom" name="Prenom" value=""></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="pull-right"><h3>Adresse Email :&emsp;</h3></div>
                        </td>
                        <td>
                            <h4><input type="text" class="form-control" id="Email" name="Email" value=""></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="pull-right"><h3>Mot de passe :&emsp;</h3></div>
                        </td>
                        <td>
                            <h4><input type="text" class="form-control" id="mdp" name="mdp" value=""></h4>
                        </td>
                    </tr>
                </table>
                <div class="col-lg-3">
                </div>
                <div class = "col-lg-9 form-actions">
                    <input id="Inscription" type = "submit" name = "bouton" value = "Inscription" class = "btn btn-large btn-primary">
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
</div><?php }
}
