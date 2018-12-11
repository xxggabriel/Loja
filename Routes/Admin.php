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

// Users
$app->get('/admin/users', function() {
    Admin::verifyLoginAdmin();
    $page = new PageAdmin();

    $page->setTpl("users",[
        "users" => Admin::listAllUser()
    ]);
});

$app->get('/admin/users/create', function() {
    Admin::verifyLoginAdmin();
   
    $page = new PageAdmin();

    $page->setTpl("user-create");

});

$app->post('/admin/users/create', function() {
    Admin::verifyLoginAdmin();
    if(!isset($_POST["status"]) || !$_POST["status"] == 3){
        $_POST["status"] = 2;
    }
    Admin::createUserAdmin($_POST);
});

$app->get('/admin/users/:id_user/delete', function($id_user) {
    Admin::verifyLoginAdmin();
    Admin::deleteAdminUser($id_user);
});

$app->get('/admin/users/:id_user', function($id_user) {
    Admin::verifyLoginAdmin();
   
    $page = new PageAdmin();
    $result = Admin::listUser($id_user);

    $page->setTpl("user-update",["user" =>[
        "id_user" => $result["id_user"],
        "name" => $result["name"],
        "login" => $result["login"],
        "email" => $result["email"],
        "phone" => $result["phone"],
        "status" => $result["status"]
    ]]);
});

$app->post('/admin/users/:id_user', function($id_user) {
    Admin::verifyLoginAdmin();
    if(!isset($_POST["status"]) || !$_POST["status"] == 3){
        $_POST["status"] = 2;
    }
    Admin::updateAdmin($_POST,$id_user);
});


$app->get('/admin/users/:id_user/password', function($id_user) {
    Admin::verifyLoginAdmin();
   
    $page = new PageAdmin();

    $page->setTpl("user-password",["user" => [ 
        "id_user" => $id_user
    ]]);

});

$app->post('/admin/users/:id_user/password', function($id_user) {
    Admin::verifyLoginAdmin();
    if(!isset($_POST["status"]) || !$_POST["status"] == 3){
        $_POST["status"] = 2;
    }
    Admin::updateAdminPassword($_POST["password"],$id_user);
});
// end Users

// Products
$app->get('/admin/products', function() {
    Admin::verifyLoginAdmin();
    
    $page->setTpl("products");
});



// end Products


$app->get('/admin/providers', function() {
    Admin::verifyLoginAdmin();
    
    $page->setTpl("index");
});