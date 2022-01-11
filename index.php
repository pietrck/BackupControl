<?php

require_once __DIR__."/vendor/autoload.php";

use \App\Controller\Controller;
use \App\View\View;

session_start();

if (isset($_POST['registerUser'])) {
	$controller = new Controller();
	echo $controller->registerUser($_POST);
}

if (isset($_POST['logout'])) {
	$controller = new Controller();
	echo $controller->logout();
}

if (isset($_POST['user']) && isset($_POST['pass'])) {
	$controller = new Controller();
	echo $controller->loginMethod($_POST);
}

if (!isset($_SESSION['logged'])) {
	echo View::render("login");
}else{
	$uri = $_GET['uri'] == ""?"index":$_GET['uri'];

	echo View::render($uri);
}
