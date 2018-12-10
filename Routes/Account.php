<?php 

use Model\PageAccount;
use Controller\User\User;

$app->get('/account', function() {
User::verifyLogin("account");
$page = new PageAccount();

$page->setTpl("index");

});

$app->get('/logout/account', function() {
    User::verifyLogin("account");
    User::logoutUser();
    
});