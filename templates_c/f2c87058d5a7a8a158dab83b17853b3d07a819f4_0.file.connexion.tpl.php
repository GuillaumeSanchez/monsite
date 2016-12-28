<?php
/* Smarty version 3.1.30, created on 2016-12-09 21:46:36
  from "C:\wamp64\www\monsite\templates\connexion.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_584b263c37b3e9_52281482',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2c87058d5a7a8a158dab83b17853b3d07a819f4' => 
    array (
      0 => 'C:\\wamp64\\www\\monsite\\templates\\connexion.tpl',
      1 => 1481204020,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_584b263c37b3e9_52281482 (Smarty_Internal_Template $_smarty_tpl) {
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
