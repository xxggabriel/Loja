<?php 

use Model\PageAdmin;
use Controller\User\User;

$app->get('/admin', function() {
User::verifyLogin("/admin");
$page = new PageAdmin();

$page->setTpl("index");

});

$app->get('/logout/admin', function() {
    User::verifyLogin("account");
    User::logoutUser();
    
});