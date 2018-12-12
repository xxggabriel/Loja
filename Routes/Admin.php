<?php 

use Model\PageAdmin;
use Controller\User\User;
use Controller\User\Admin;
use Model\Model;
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
        "name_user" => $result["name_user"],
        "login" => $result["login"],
        "email" => $result["email"],
        "phone" => $result["phone"],
        "status" => $result["status"]
    ]]);
});

$app->post('/admin/users/:id_user', function($id_user) {
    Admin::verifyLoginAdmin();
    if(!empty($_POST["status"]) || !$_POST["status"] == 3){
        $_POST["status"] = 2;
    }
    Admin::updateUserAdmin($_POST,$id_user);
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
    // print_r(Admin::listAllProduct());exit;
    $page = new PageAdmin();
    $page->setTpl("products",[
        "product" => Admin::listAllProduct(),
        "brand" => Admin::listAllBrand()
    ]);
});

$app->get('/admin/product/create', function() {
    Admin::verifyLoginAdmin();

    $page = new PageAdmin();
    $page->setTpl("product-create");
});

$app->post("/admin/product/create", function(){
    Admin::verifyLoginAdmin();

    Admin::createProductAdmn($_POST);
});

$app->get("/admin/product/:id_product", function($id_product){
    Admin::verifyLoginAdmin();

    $product = Admin::listProduct($id_product);
    $type =Admin::listType($product["id_type"]);
    $brand = Admin::listBrand($product["id_brand"]);
    $provider = Admin::listProvider($product["id_provider"]);
    
    
    $model = new Model();
    $model->setData($product);
    $model->setData($provider);
    $model->setData($brand);

    $page = new PageAdmin();
    $page->setTpl("product-update",[

        "product" => [
            "id_product" => $model->getid_product(),      
            "name_product" => $model->getname_product(),
            "value" => $model->getvalue(),
            "value_cost" => $model->getvalue_cost(),
            "amount" => $model->getamount()        
        ],
        "provider" =>[
            "id_provider" => $model->getid_provider()
        ],
        "brand" =>[
            "id_brand" => $model->getid_brand()
        ],
        "type" =>[
            "id_type" => $model->getid_type()
        ]

    ]);

});

$app->post("/admin/product/:id_product", function($id_product){
    Admin::verifyLoginAdmin();
    // print_r($_POST);exit;
    Admin::updateProductAdmin($_POST,$id_product);

});

$app->get("/admin/product/sample/:id_product", function($id_product){
    Admin::verifyLoginAdmin();

    $page = new PageAdmin();
    $page->setTpl("product-update-sample",[
         ["product" => $id_product]
    ]);
});

$app->post("/admin/product/sample/:id_product", function($id_product){
    
    $result = Admin::savePhoto($_FILES["photo"]);
    $_POST["id_product"] = $id_product;
    $_POST["photo"] = $result;
    // var_dump($_POST);exit;
    Admin::createProductSampleAdmin($_POST);



});

$app->get("/admin/product/:id_product/delete", function($id_product){
    Admin::verifyLoginAdmin();
    Admin::deleteAdminProduct($id_product);
});


// end Products


// Provider
$app->get('/admin/providers', function() {
    Admin::verifyLoginAdmin();
    
    $page->setTpl("index");
});

// end Provider