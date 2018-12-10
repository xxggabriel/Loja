<?php 

use Model\PageAdmin;
use Controller\User\User;
use Controller\User\Admin;

$app->get('/admin', function() {
Admin::verifyLoginAdmin("/admin");
$page = new PageAdmin();

$page->setTpl("index");

});

$app->get('/login/admin', function() {
    $page = new PageAdmin([
        "header" => false,
        "footer" => false
    ]);
    
    $page->setTpl("login");
    
});

$app->post('/login/admin',function(){
    $admin = new Admin();
    $admin->loginAdmin($_POST);

});

$app->get('/admin/logout', function() {
    Admin::verifyLoginAdmin();
    User::logoutUser();
    
});