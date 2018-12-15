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
    $model->setData($type);
    $model->setData($brand);
    $model->setData($provider);

    $providers = new Model();
    $providers->setData(Admin::listAllProviders());

    $brands = new Model();
    $brands->setData(Admin::listAllBrand());

    $types = new Model();
    $types->setData(Admin::listAllType());
    
    // var_dump($model->getValues());exit;
    $page = new PageAdmin();
    $page->setTpl("product-update",[

        "product" => $model->getValues(),
        "provider" => $providers->getValues(),
        "brand" => $brands->getValues(),
        "type"=> $types->getValues()

    ]);

});

$app->post("/admin/product/:id_product", function($id_product){
    Admin::verifyLoginAdmin();
    // var_dump($_POST);exit;
    Admin::updateProductAdmin($_POST,$id_product);

});

$app->get("/admin/product/sample/:id_product", function($id_product){
    Admin::verifyLoginAdmin();
    $result = Admin::listProductSample($id_product);

    $model = new Model();
    $model->setData($result);

    $page = new PageAdmin();
    if(empty($model->getValues())){
        
        $page->setTpl("product-update-sample",[
            "product" => [
                "id_product" => $id_product
            ]
        ]);
    } else{
        
        $page->setTpl("product-update-sample",[
            "product" => $model->getValues()
        ]);
    }

        
});

$app->post("/admin/product/sample/:id_product", function($id_product){
    
    if(empty(Admin::listProductSample($id_product))){

        $result = Admin::savePhoto($_FILES["photo"]);
        $_POST["id_product"] = $id_product;
        $_POST["photo"] = $result;
        
        Admin::createProductSampleAdmin($_POST);
    }else {
        $result = Admin::savePhoto($_FILES["photo"]);
        $_POST["id_product"] = $id_product;
        $_POST["photo"] = $result;
        
        Admin::updateProductSampleAdmin($_POST, $id_product);
    }



});

$app->get("/admin/product/:id_product/delete", function($id_product){
    Admin::verifyLoginAdmin();
    Admin::deleteAdminProduct($id_product);
});


// end Products


// Provider
$app->get('/admin/providers', function() {
    Admin::verifyLoginAdmin();
    $model = new Model();
    $model->setData(Admin::listAllProviders());

    $page = new PageAdmin();
    $page->setTpl("providers",[
        "provider" => $model->getValues()
    ]);
});


$app->get('/admin/provider/create', function() {
    Admin::verifyLoginAdmin();

    $page = new PageAdmin();
    $page->setTpl("provider-create");
});

$app->post('/admin/provider/create', function() {
    Admin::verifyLoginAdmin();

    Admin::createProviderAdmin($_POST);
});


$app->get('/admin/provider/:id_provider', function($id_provider) {
    Admin::verifyLoginAdmin();

    $model = new Model();
    $model->setData(Admin::listProvider($id_provider));

    $page = new PageAdmin();
    $page->setTpl("provider-update",[
        "provider" => $model->getValues()
    ]);
});
$app->get('/admin/provider/:id_provider/delete', function($id_provider) {
    Admin::verifyLoginAdmin();
    Admin::deleteProviderAdmin($id_provider);
});


$app->post('/admin/provider/:id_provider', function($id_provider) {
    Admin::verifyLoginAdmin();
    Admin::updateProviderAdmin($_POST, $id_provider);
});
// end Provider


// Brans
$app->get('/admin/brands', function() {
    Admin::verifyLoginAdmin();
    $page = new PageAdmin();
    $page->setTpl("brands",[
        "brand" => Admin::listAllBrand()
    ]);
});

$app->get('/admin/brand/create', function() {
    Admin::verifyLoginAdmin();
    $page = new PageAdmin();
    $page->setTpl("brand-create");
});

$app->post('/admin/brand/create', function() {
    Admin::verifyLoginAdmin();
    Admin::createBrandAdmin($_POST);
});

$app->get('/admin/brand/:id_brand/delete', function($id_brand) {
    Admin::verifyLoginAdmin();
    Admin::deleteBrandAdmin($id_brand);
});

$app->get('/admin/brand/:id_brand', function($id_brand) {
    Admin::verifyLoginAdmin();
    $page = new PageAdmin();
    $page->setTpl("brand-update",[
        "brand" => Admin::listBrand($id_brand)
    ]);
});

$app->post('/admin/brand/:id_brand', function($id_brand) {
    Admin::verifyLoginAdmin();
    Admin::updateBrandAdmin($_POST,$id_brand);
});


// Type
$app->get('/admin/types', function() {
    Admin::verifyLoginAdmin();
    $page = new PageAdmin();
    $page->setTpl("types",[
        "type" => Admin::listAllType()
    ]);
});

$app->get('/admin/type/create', function() {
    Admin::verifyLoginAdmin();
    $page = new PageAdmin();
    $page->setTpl("type-create");
});

$app->post('/admin/type/create', function() {
    Admin::verifyLoginAdmin();
    Admin::createTypeAdmin($_POST);
});

$app->get('/admin/type/:id_type/delete', function($id_type){
    Admin::verifyLoginAdmin();
    Admin::deleteTypeAdmin($id_type);
});


$app->get('/admin/type/:id_type', function($id_type) {
    Admin::verifyLoginAdmin();
    $page = new PageAdmin();
    $page->setTpl("type-update",[
        "type" => Admin::listType($id_type)
    ]);
});

$app->post('/admin/type/:id_type', function($id_type) {
    Admin::verifyLoginAdmin();
    Admin::updateTypeAdmin($id_type, $_POST);
});

// end Type