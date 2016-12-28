<?php
/* Smarty version 3.1.30, created on 2016-12-19 16:01:25
  from "C:\wamp\www\monsite\templates\articles.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5857f64507f7f0_87627021',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74f2c25785258fd73b655b6574eeb13469e59139' => 
    array (
      0 => 'C:\\wamp\\www\\monsite\\templates\\articles.tpl',
      1 => 1482103818,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5857f64507f7f0_87627021 (Smarty_Internal_Template $_smarty_tpl) {
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
 src="../js/javascript.js" type="text/javascript"><?php echo '</script'; ?>
>

<div class="span8 col-lg-9">
    <?php if (isset($_smarty_tpl->tpl_vars['ajout_article']->value)) {?>
        <div class="alert alert-warning" role="alert">
            <strong>Félicitation !</strong> Votre article a été ajouté.
        </div>
    <?php }?>

    <?php if (isset($_smarty_tpl->tpl_vars['modifier_article']->value)) {?>
        <div class="alert alert-warning" role="alert">
            <strong>Félicitation !</strong> Votre article a bien été modifié.
        </div>
    <?php }?>

    <?php if (isset($_smarty_tpl->tpl_vars['infos']->value) && isset($_smarty_tpl->tpl_vars['status']->value)) {?>
        <div class = "span8 col-lg-9">
            <form action = "articles.php" method = "post" enctype = "multipart/form-data" id = "form_article" name = "form_article">
                <div class = "clearfix">
                    <label for = "titre">Titre</label>
                    <div class = "input"><input type = "text" name = "titre" id = "titre" value = "<?php echo $_smarty_tpl->tpl_vars['infos']->value[0]['titre'];?>
"></div>
                </div>
                </br>
                <div class = "clearfix">
                    <label for = "titre">Texte</label>
                    <div class = "input"><textarea name = "texte" id = "texte"><?php echo $_smarty_tpl->tpl_vars['infos']->value[0]['texte'];?>
</textarea></div>
                </div>
                <div class = "clearfix">
                    <label for = "image">Image</label>
                    <div class = "input"><input type = "file" name = "logo" id = "logo" ></div>
                </div>
                </br>
                <div class = "clearfix">
                    <label for = "publie">Publié</label>
                    <?php if ($_smarty_tpl->tpl_vars['infos']->value[0]['publie'] == 1) {?>
                        <div class = "input"><input type = "checkbox" name = "publie" id = "publie" checked/></div>                
                    <?php } else { ?>
                        <div class = "input"><input type = "checkbox" name = "publie" id = "publie"/></div>
                    <?php }?>
                </div>
                </br>
                <div class = "clearfix">
                    <div class = "input"><input type = "hidden" name = "id" value="<?php echo $_smarty_tpl->tpl_vars['infos']->value[0]['id'];?>
"/></div>
                </div>

                <div class = "form-actions">
                    <input type = "submit" name = "bouton" value = "<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
" class = "btn btn-large btn-primary">
                </div>
            </form>
            </br>
        </div>
    <?php }?>
</div><?php }
}
