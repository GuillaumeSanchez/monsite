<?php
/* Smarty version 3.1.30, created on 2016-12-20 23:05:30
  from "/home/u268005880/public_html/monsite/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5859b93aa45fd2_57030234',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b0f59a1f89944b29171e6f42aac167a74147995f' => 
    array (
      0 => '/home/u268005880/public_html/monsite/templates/index.tpl',
      1 => 1482274356,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5859b93aa45fd2_57030234 (Smarty_Internal_Template $_smarty_tpl) {
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
    
    
    <?php if (isset($_smarty_tpl->tpl_vars['tab_recherche']->value)) {?>
        <?php if ($_smarty_tpl->tpl_vars['typeRecherche']->value == "titre" || $_smarty_tpl->tpl_vars['typeRecherche']->value == "texte" || $_smarty_tpl->tpl_vars['typeRecherche']->value == "tous") {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_recherche']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
                <h2>
                    <a href='http://monsuperblog.esy.es/monsite/index.php?titre=<?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
'><?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>
</a>
                    <form action = "articles.php" method = "post" enctype = "multipart/form-data" id = "modif-article" name = "modif-article">
                        <div class = "input"><input type = "hidden" name = "id" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"/></div>
                    </form>
                </h2>
                    <?php if (isset($_smarty_tpl->tpl_vars['Connexion']->value) && $_smarty_tpl->tpl_vars['Connexion']->value['Status']) {?>
                        <?php if ($_smarty_tpl->tpl_vars['Connexion']->value['rang'] == 1 || $_smarty_tpl->tpl_vars['Connexion']->value['id'] == $_smarty_tpl->tpl_vars['value']->value['id_utilisateur']) {?>
                            <form action = "articles.php" method = "post" enctype = "multipart/form-data" id = "modif-article" name = "modif-article">
                                <div class = "input"><input type = "hidden" name = "id" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"/></div>
                                <input type="submit" name="Modifier" value="Modifier"/></a>
                            </form>
                            </br>
                        <?php }?>
                    <?php }?>      
                <img src="img/articles/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
.png" width="100px" alt="titre"/>
                <p style="text-align: justify"><?php echo $_smarty_tpl->tpl_vars['value']->value['texte'];?>
</p>
                <p><em><u>Publié le : <?php echo $_smarty_tpl->tpl_vars['value']->value['date_fr'];?>
</u></em></p>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <ul class="pagination">
                    <li><a>Page :</a></li>
                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['nbPages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['nbPages']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                        <?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['pageCourante']->value) {?>
                        <li class="active"><a href="http://monsuperblog.esy.es/monsite/index.php?p=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                        <?php } else { ?>
                        <li><a href="http://monsuperblog.esy.es/monsite/index.php?p=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                        <?php }?>
                    <?php }
}
?>

            </ul>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['typeRecherche']->value == "commentaire") {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_recherche']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
                </br>
                <div class='row'>
                    <div class='col-lg-2'>
                        <img src='img/<?php echo $_smarty_tpl->tpl_vars['value']->value['logo'];?>
' width="80px" name='logo' id='logo'>
                    </div>
                    <div class='col-lg-10'>
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>
                                    <?php echo $_smarty_tpl->tpl_vars['value']->value["titre"];?>

                                </h4>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-12'>
                                <?php echo $_smarty_tpl->tpl_vars['value']->value['commentaire'];?>

                                <p><em><u>Publié le : <?php echo $_smarty_tpl->tpl_vars['value']->value['date_fr'];?>
</u></em></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class='col-lg-12'>
                        <h4><?php echo $_smarty_tpl->tpl_vars['value']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value['prenom'];?>
</h4>
                    </div>
                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <ul class="pagination">
                <li><a>Page :</a></li>
                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['nbComPages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['nbComPages']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                    <?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['pageCourante']->value) {?>
                    <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
&p=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                    <?php } else { ?>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
&p=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                    <?php }?>
                <?php }
}
?>

            </ul>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['typeRecherche']->value == "utilisateur") {?>
            <div class='row'>
                <div class='col-lg-2'>
                    <img src='img/<?php echo $_smarty_tpl->tpl_vars['value']->value['logo'];?>
' width="80px" name='logo' id='logo'>
                </div>
            </div>
            <div class="row">
                <div class='col-lg-12'>
                    <h4><?php echo $_smarty_tpl->tpl_vars['value']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value['prenom'];?>
</h4>
                </div>
            </div>
        <?php }?>
    <?php } else { ?>
        <?php if (isset($_smarty_tpl->tpl_vars['id']->value)) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_articles']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
                <h2>
                    <?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>

                    <form action = "articles.php" method = "post" enctype = "multipart/form-data" id = "modif-article" name = "modif-article">
                        <div class = "input"><input type = "hidden" name = "id" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"/></div>
                    </form>
                </h2>
                    <?php if (isset($_smarty_tpl->tpl_vars['Connexion']->value) && $_smarty_tpl->tpl_vars['Connexion']->value['Status']) {?>
                        <?php if ($_smarty_tpl->tpl_vars['Connexion']->value['rang'] == 1 || $_smarty_tpl->tpl_vars['Connexion']->value['id'] == $_smarty_tpl->tpl_vars['value']->value['id_utilisateur']) {?>
                            <form action = "articles.php" method = "post" enctype = "multipart/form-data" id = "modif-article" name = "modif-article">
                                <div class = "input"><input type = "hidden" name = "id" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"/></div>
                                <input type="submit" name="Modifier" value="Modifier"/></a>
                            </form>
                            </br>
                        <?php }?>
                    <?php }?>      
                <img src="img/articles/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
.png" width="100px" alt="titre"/>
                <p style="text-align: justify"><?php echo $_smarty_tpl->tpl_vars['value']->value['texte'];?>
</p>
                <p><em><u>Publié le : <?php echo $_smarty_tpl->tpl_vars['value']->value['date_fr'];?>
</u></em></p>
                </br>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <div class='row'>
                <div class='col-lg-12 menu'>
                    <h2>Commentaires</h2>
                </div>
            </div>
            <div class='row'>
                <div class='col-lg-12'>
                    <?php if (isset($_smarty_tpl->tpl_vars['Connexion']->value) && $_smarty_tpl->tpl_vars['Connexion']->value['Status']) {?>            
                        <form method = "post" enctype = "multipart/form-data" id = "form_commentaire" name = "form_commentaire">
                            <div class='menu2'>
                                <input type="hidden" name="url" id="url" value="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">
                                <input type="hidden" name="id_article" id="id_article" value="<?php echo $_smarty_tpl->tpl_vars['id_article']->value;?>
">
                                <input type="hidden" name="id_utilisateur" id="id_utilisateur" value="<?php echo $_smarty_tpl->tpl_vars['id_utilisateur']->value;?>
">
                                <input type="hidden" name="date" id="date" value="<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
">
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
                    <?php } else { ?>
                        <h4>Si vous voulez poster un commentaire veuillez vous connecter</h4>
                        <a href='http://monsuperblog.esy.es/monsite/connexion.php'<input type='button' name='connexion' id='connexion' value='Connexion'></a>
                    <?php }?>
                </div>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['tablnumCom']->value[0]["mbComPage"] != 0) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_com']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
                    </br>
                    <div class='row'>
                        <div class='col-lg-2'>
                            <img src='img/<?php echo $_smarty_tpl->tpl_vars['value']->value['logo'];?>
' width="80px" name='logo' id='logo'>
                        </div>
                        <div class='col-lg-10'>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4>
                                        <?php echo $_smarty_tpl->tpl_vars['value']->value["titre"];?>

                                    </h4>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-lg-12'>
                                    <?php echo $_smarty_tpl->tpl_vars['value']->value['commentaire'];?>

                                    <p><em><u>Publié le : <?php echo $_smarty_tpl->tpl_vars['value']->value['date_fr'];?>
</u></em></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-lg-12'>
                            <h4><?php echo $_smarty_tpl->tpl_vars['value']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value['prenom'];?>
</h4>
                        </div>
                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <ul class="pagination">
                    <li><a>Page :</a></li>
                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['nbComPages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['nbComPages']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                        <?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['pageCourante']->value) {?>
                        <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
&p=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                        <?php } else { ?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
&p=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                        <?php }?>
                    <?php }
}
?>

                </ul>
            <?php } else { ?>
                <h4>Aucun commentaire n'a été posté.</h4>
            <?php }?>
        <?php } else { ?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_articles']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
                <h2>
                    <a href='http://monsuperblog.esy.es/monsite/index.php?titre=<?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
'><?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>
</a>
                    <form action = "articles.php" method = "post" enctype = "multipart/form-data" id = "modif-article" name = "modif-article">
                        <div class = "input"><input type = "hidden" name = "id" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"/></div>
                    </form>
                </h2>
                    <?php if (isset($_smarty_tpl->tpl_vars['Connexion']->value) && $_smarty_tpl->tpl_vars['Connexion']->value['Status']) {?>
                        <?php if ($_smarty_tpl->tpl_vars['Connexion']->value['rang'] == 1 || $_smarty_tpl->tpl_vars['Connexion']->value['id'] == $_smarty_tpl->tpl_vars['value']->value['id_utilisateur']) {?>
                            <form action = "articles.php" method = "post" enctype = "multipart/form-data" id = "modif-article" name = "modif-article">
                                <div class = "input"><input type = "hidden" name = "id" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"/></div>
                                <input type="submit" name="Modifier" value="Modifier"/></a>
                            </form>
                            </br>
                        <?php }?>
                    <?php }?>      
                <img src="img/articles/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
.png" width="100px" alt="titre"/>
                <p style="text-align: justify"><?php echo $_smarty_tpl->tpl_vars['value']->value['texte'];?>
</p>
                <p><em><u>Publié le : <?php echo $_smarty_tpl->tpl_vars['value']->value['date_fr'];?>
</u></em></p>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <ul class="pagination">
                    <li><a>Page :</a></li>
                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['nbPages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['nbPages']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                        <?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['pageCourante']->value) {?>
                        <li class="active"><a href="http://monsuperblog.esy.es/monsite/index.php?p=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                        <?php } else { ?>
                        <li><a href="http://monsuperblog.esy.es/monsite/index.php?p=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                        <?php }?>
                    <?php }
}
?>

            </ul>
        <?php }?>
    <?php }?>
</div><?php }
}
