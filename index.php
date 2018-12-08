<?php 

require "vendor/autoload.php";
<<<<<<< HEAD

$app = new \Slim\Slim();

$app->config('debug', false);


// Fazendo Require das rotas
require_once("Routes/Web.php");
require_once("Routes/Product.php");
require_once("Routes/Provider.php");
require_once("Routes/Sale.php");
require_once("Routes/User.php");


$app->run();



=======
use Model\Crud;
use Controller\User\User;
use Controller\User\Profile;
use Controller\User\PasswordUser;
use Model\Page;

// $user = new User();
// $user->createUser([
//     "name" => "jubileu",
//     "login" => "123#",
//     "email" => "",
//     "phone" => ""
// ]);

$profile = new Profile();

// $profile->createProfile([
//     "id_user" => "7",
//     "user_name" => "Leila Ferreira",
//     "photo" => "",
//     "biography" => "Uma biografia simples"
// ]);

// $profile->updateProfile([
//     "user_name" => "Junior",
//     "photo" => "",
//     "biography" => "Uma biografia simples"
// ], "7");

$password = new PasswordUser();
var_dump($password->varifyRecoverPassword("7d3d208e070fdc3be387038166f77bb8d42a91dcd192c538a403b7d8c5c9"));
// var_dump($password->varifyPassword(8,"admin"));


// $page = new Page();
// $page->setTpl("index");
>>>>>>> parent of ac5cde5... Inici de rotas cridas
