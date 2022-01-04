<?php

require_once __DIR__."/vendor/autoload.php";

use \App\Controller\Controller;
use \App\View\View;

$uri = $_GET['uri'] == ""?"index":$_GET['uri'];

echo View::render($uri);
