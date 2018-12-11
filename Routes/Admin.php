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
    Admin::logoutAdmin(false);
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

$app->get('/admin/users', function() {
    Admin::verifyLoginAdmin();
    
    $page->setTpl("index");
});

$app->get('/admin/products', function() {
    Admin::verifyLoginAdmin();
    
    $page->setTpl("index");
});

$app->get('/admin/providers', function() {
    Admin::verifyLoginAdmin();
    
    $page->setTpl("index");
});

$app->get('/admin/recovers', function() { 
    $page = new PageAdmin([
        "header" => false,
        "footer" => false
    ]);
    $page->setTpl("recover-password");
});

$app->post('/admin/recovers', function() {
    $admin = new User();
    $admin->recoverPassword($_POST["token"], "/admin/recovers/update");

});


$app->get('/admin/recovers/update', function() {
    $page = new PageAdmin();
    $page->setTpl("recovers-update");


});

$app->post('/admin/recovers/update', function() {
    $user = new User();
    $user->updatePassword($_POST["password"]);
    header("Location: /admin");
    exit;
});



