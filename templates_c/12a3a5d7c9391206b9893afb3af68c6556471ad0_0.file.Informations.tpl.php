<?php
/* Smarty version 3.1.30, created on 2016-12-19 23:00:18
  from "/home/u268005880/public_html/monsite/templates/Informations.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58586682153938_14576183',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12a3a5d7c9391206b9893afb3af68c6556471ad0' => 
    array (
      0 => '/home/u268005880/public_html/monsite/templates/Informations.tpl',
      1 => 1482164479,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58586682153938_14576183 (Smarty_Internal_Template $_smarty_tpl) {
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
                    <h1><strong>Modifier Vos Informations</strong></h1>
                </div>
                </br>
            </div>
        </div>
        <div class="row">
            <div class='col-lg-2'>
            </div>
            <div class="col-lg-10">
                <form  method = "post" enctype = "multipart/form-data" id = "form_information" name = "form_information">
                    <input type="hidden" name = "id" value="<?php echo $_smarty_tpl->tpl_vars['infos']->value[0]["id"];?>
"/>
                    <table border='0'>
                        <tr>
                            <td>
                                <div class="pull-right"><h3>Nom :&emsp;</h3></p></div>
                            </td>
                            <td>
                                <h4><input type="text" class="form-control" id="Nom" name="Nom" value="<?php echo $_smarty_tpl->tpl_vars['infos']->value[0]["nom"];?>
"></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="pull-right"><h3>Prenom :&emsp;</h3></div>
                            </td>
                            <td>
                                <h4><input type="text" class="form-control" id="Prenom" name="Prenom" value="<?php echo $_smarty_tpl->tpl_vars['infos']->value[0]["prenom"];?>
"></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="pull-right"><h3>Adresse Email :&emsp;</h3></div>
                            </td>
                            <td>
                                <h4><input type="text" class="form-control" id="Email" name="Email" value="<?php echo $_smarty_tpl->tpl_vars['infos']->value[0]["email"];?>
"></h4>
                            </td>
                        </tr>
                    </table>
                    <div class="col-lg-3">
                    </div>
                    <div class = "col-lg-9 form-actions">
                        <input id="Infos" type = "submit" name = "bouton" value = "Modifier vos Informations" class = "btn btn-large btn-primary">
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
    <?php }?>
</div><?php }
}
