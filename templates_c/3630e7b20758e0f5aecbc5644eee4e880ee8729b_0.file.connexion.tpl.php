<?php
/* Smarty version 3.1.30, created on 2016-12-19 16:21:24
  from "/home/u268005880/public_html/monsite/templates/connexion.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58580904e95d97_92022434',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3630e7b20758e0f5aecbc5644eee4e880ee8729b' => 
    array (
      0 => '/home/u268005880/public_html/monsite/templates/connexion.tpl',
      1 => 1482164479,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58580904e95d97_92022434 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="span8 col-lg-9">
    
    
    
    <?php if (isset($_smarty_tpl->tpl_vars['Email']->value) && isset($_smarty_tpl->tpl_vars['mdp']->value) && $_smarty_tpl->tpl_vars['Email']->value == '' && $_smarty_tpl->tpl_vars['mdp']->value == '') {?>
        <div class = "alert alert-danger" role = "alert">
            <strong>Attention</strong> Veuillez remplir tous les champs s'il vous plait.
        </div>
    <?php }?>

    <?php if (isset($_smarty_tpl->tpl_vars['count']->value) && $_smarty_tpl->tpl_vars['count']->value == 0) {?>
        <div class = "alert alert-warning" role = "alert">
            <strong>Désolé</strong> Mais vous n'avez aucun compte sur notre site.
        </div>    
    <?php }?>

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
</div><?php }
}
