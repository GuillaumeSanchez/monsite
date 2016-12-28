<?php

require_once('libs/Smarty.class.php');

$smarty = new Smarty();

$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
//$smarty->setConfigDir('/web/www.example.com/guestbook/configs/');
//$smarty->setCacheDir('/web/www.example.com/guestbook/cache/');

$name = "Guillaume";

$smarty->assign('name',$name);//Passer d'une variable php à smarty.

$smarty->debugging = true;

$smarty->display('Smarty-test.tpl');

?>