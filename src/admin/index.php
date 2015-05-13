<?php
session_start();
include 'init.php';

//read template page
$page = isset($_GET['p']) ? explode("/", $_GET['p'])[0] : 'index';

//read
$i->option('category');

if(!empty($_POST['username']) && !empty($_POST['password'])){
	$i->login(['username' => $_POST['username'], 'password' => $_POST['password']]);
}

if(!empty($_POST['content']) && !empty($_POST['title'])){
	$a->add(['title' => $_POST['title'], 'content' => $_POST['content']]);
}

if($i->is_logged()){
	$t->read($page.'.html');
}else{
	$t->read('login.html');
}