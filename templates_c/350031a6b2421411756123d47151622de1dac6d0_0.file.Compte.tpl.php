<?php
/* Smarty version 3.1.30, created on 2016-12-18 23:17:41
  from "C:\wamp64\www\monsite\templates\Compte.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_585719153a6dc4_71496819',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '350031a6b2421411756123d47151622de1dac6d0' => 
    array (
      0 => 'C:\\wamp64\\www\\monsite\\templates\\Compte.tpl',
      1 => 1482102805,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_585719153a6dc4_71496819 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php if (isset($_smarty_tpl->tpl_vars['infos']->value)) {?>
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
                <img src='img/<?php echo $_smarty_tpl->tpl_vars['infos']->value[0]["logo"];?>
' alt="logo" width="<?php echo $_smarty_tpl->tpl_vars['logCompte']->value['width'];?>
px" height="<?php echo $_smarty_tpl->tpl_vars['logCompte']->value['height'];?>
px" class="img-thumbnail"/>
            </div>
            <div class="col-lg-12">
                <form action = "Compte.php" method = "post" enctype = "multipart/form-data" id = "form_compte_logo" name = "form_compte_logo">
                    <input type="hidden" name = "id" value="<?php echo $_smarty_tpl->tpl_vars['infos']->value[0]["id"];?>
"/>
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
                        <input type="hidden" name = "id" value="<?php echo $_smarty_tpl->tpl_vars['infos']->value[0]["id"];?>
"/>
                        <table border='0'>
                            <tr>
                                <td>
                                    <div class="pull-right"><h3>Nom :&emsp;</h3></p></div>
                                </td>
                                <td>
                                    <h4> <?php echo $_smarty_tpl->tpl_vars['infos']->value[0]["nom"];?>
</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="pull-right"><h3>Prenom :&emsp;</h3></div>
                                </td>
                                <td>
                                    <h4><?php echo $_smarty_tpl->tpl_vars['infos']->value[0]["prenom"];?>
</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="pull-right"><h3>Adresse Email :&emsp;</h3></div>
                                </td>
                                <td>
                                    <h4><?php echo $_smarty_tpl->tpl_vars['infos']->value[0]["email"];?>
</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="pull-right"><h3>Votre rang :&emsp;</h3></div>
                                </td>
                                <td>
                                    <h4><?php echo $_smarty_tpl->tpl_vars['infos']->value[0]["rang"];?>
</h4>
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
    <?php }?>
</div><?php }
}
