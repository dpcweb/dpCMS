<?php
include 'classes/template.class.php';
include 'classes/menu.class.php';
include 'classes/articles.class.php';

include 'config.php';
// init menu
$m = new Menu($db);
$m->show();


// init articles
$a = new Articles($db);
$a->show();


// init template
$t = new Template($m, $a);
$t->dir('templates');
$t->set('dcms');
