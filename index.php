<?php 

require "vendor/autoload.php";

$app = new \Slim\Slim();

$app->config('debug', false);


// Fazendo Require das rotas
require_once("Routes/Web.php");
require_once("Routes/Product.php");
require_once("Routes/Provider.php");
require_once("Routes/Sale.php");
require_once("Routes/User.php");


$app->run();
