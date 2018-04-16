<?php 

if (!session_id()) @session_start();

header("Content-type: text/html; charset=utf-8");

$routes     = require_once __DIR__ . "/../app/Routes/routes.php";

$route      = new \Core\Route($routes);
