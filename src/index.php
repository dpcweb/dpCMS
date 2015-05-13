<?php
include 'init.php';

//read template page
$page = isset($_GET['p']) ? explode("/", $_GET['p'])[0] : 'index';
$t->read($page.'.html');

$m->show('index');