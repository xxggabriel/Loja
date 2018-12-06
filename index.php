<?php 

require "vendor/autoload.php";
use Model\Crud;
use Controller\User\User;
use Controller\User\Profile;
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

$page = new Page();
$page->setTpl("index");