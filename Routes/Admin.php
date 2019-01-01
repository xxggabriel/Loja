<?php 

use Model\PageAdmin;
use Controller\User\User;
use Controller\User\Admin;
use Model\Model;



$app->group('/admin', function() use($app){
    
    $app->get('/', function() {

        Admin::verifyLoginAdmin("/admin");
        $page = new PageAdmin();
        $admin = new Admin();
        $page->setTpl("index",[
            "admin" => $admin->listAdmin()
        ]);
        
    });

    $app->get('/login', function() {
        Admin::logoutAdmin(false);
        $page = new PageAdmin([
            "header" => false,
            "footer" => false
        ]);
        
        $page->setTpl("login",[],false);
        
    });

    $app->post('/login',function(){
        $admin = new Admin();
        $admin->loginAdmin($_POST);
    
    });

    $app->get('/logout', function() {
        Admin::verifyLoginAdmin();
        User::logoutUser();
        
    });

    $app->group('/users', function() use($app){
        // Users
        $app->get('/', function() {
            Admin::verifyLoginAdmin();
            $page = new PageAdmin();
    
            $page->setTpl("user",[
                "users" => Admin::listAllUser()
            ]);
        });
    
        $app->get('/create', function() {
            Admin::verifyLoginAdmin();
        
            $page = new PageAdmin();
    
            $page->setTpl("user-create");
    
        });
    
        $app->post('/create', function() {
            Admin::verifyLoginAdmin();
            
            Admin::createUserAdmin($_POST);
        });
    
        $app->get('/:id_user/delete', function($id_user) {
            Admin::verifyLoginAdmin();
            Admin::deleteAdminUser($id_user);
        });
    
        $app->get('/:id_user', function($id_user) {
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
    
        $app->post('/:id_user', function($id_user) {
            Admin::verifyLoginAdmin();
            if(!empty($_POST["status"]) || !$_POST["status"] == 3){
                $_POST["status"] = 2;
            }
            Admin::updateUserAdmin($_POST,$id_user);
        });
    
    
        $app->get('/:id_user/password', function($id_user) {
            Admin::verifyLoginAdmin();
        
            $page = new PageAdmin();
    
            $page->setTpl("user-password",["user" => [ 
                "id_user" => $id_user
            ]]);
    
        });
    
        $app->post('/:id_user/password', function($id_user) {
            Admin::verifyLoginAdmin();
            if(!isset($_POST["status"]) || !$_POST["status"] == 3){
                $_POST["status"] = 2;
            }
            Admin::updateAdminPassword($_POST["password"],$id_user);
        });
        // end Users
    });
    

    // Products

    $app->group('/product', function() use($app){

        $app->get('/', function() {
            Admin::verifyLoginAdmin();
            // print_r(Admin::listAllProduct());exit;
            $page = new PageAdmin();
            $page->setTpl("products",[
                "product" => Admin::listAllProduct(),
                "brand" => Admin::listAllBrand()
            ]);
        });
    
        $app->get('/create', function() {
            Admin::verifyLoginAdmin();
    
            $page = new PageAdmin();
            $page->setTpl("product-create");
        });
    
        $app->post("/create", function(){
            Admin::verifyLoginAdmin();
    
            Admin::createProductAdmn($_POST);
        });
    
        $app->get("/:id_product", function($id_product){
            Admin::verifyLoginAdmin();
          
            $model = new Model();
            $model->setData(Admin::listProduct($id_product));
    
            $providers = new Model();
            $providers->setData(Admin::listAllProviders());
    
            $brands = new Model();
            $brands->setData(Admin::listAllBrand());
            $types = new Model();
            $types->setData(Admin::listAllType());
            
            // var_dump($providers->getValues());exit;
            $page = new PageAdmin();
            $page->setTpl("product-update",[
        
                "product" => $model->getValues(),
                "provider" => $providers->getValues(),
                "brand" => $brands->getValues(),
                "type"=> $types->getValues()
    
            ]);
    
        });

        $app->post("/:id_product", function($id_product){
            Admin::verifyLoginAdmin();
            // var_dump($_POST);exit;
            Admin::updateProductAdmin($_POST,$id_product);
    
        });
    
        $app->get("/sample/:id_product", function($id_product){
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
    
        $app->post("/sample/:id_product", function($id_product){
            
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
    
        $app->get("/:id_product/delete", function($id_product){
            Admin::verifyLoginAdmin();
            Admin::deleteAdminProduct($id_product);
        });
    });

    
    // end Products


    // Provider
    $app->group('/provider', function() use($app){
        $app->get('/', function() {
            Admin::verifyLoginAdmin();
            $model = new Model();
            $model->setData(Admin::listAllProviders());
    
            $page = new PageAdmin();
            $page->setTpl("providers",[
                "provider" => $model->getValues()
            ]);
        });
    
    
        $app->get('/create', function() {
            Admin::verifyLoginAdmin();
    
            $page = new PageAdmin();
            $page->setTpl("provider-create");
        });
    
        $app->post('/create', function() {
            Admin::verifyLoginAdmin();

            Admin::createProviderAdmin($_POST);
        });
    
    
        $app->get('/:id_provider', function($id_provider) {
            Admin::verifyLoginAdmin();
    
            $model = new Model();
            $model->setData(Admin::listProvider($id_provider));
    
            $page = new PageAdmin();
            $page->setTpl("provider-update",[
                "provider" => $model->getValues()
            ]);
        });

        $app->post('/:id_provider', function($id_provider) {
            Admin::verifyLoginAdmin();
            Admin::updateProviderAdmin($_POST, $id_provider);
        });
        
        $app->get('/:id_provider/delete', function($id_provider) {
            Admin::verifyLoginAdmin();
            Admin::deleteProviderAdmin($id_provider);
        });
    
    
        
    });
    
    // end Provider


    // Brans
    $app->group('/brand', function() use($app){
        $app->get('/', function() {
            Admin::verifyLoginAdmin();
            $page = new PageAdmin();
            $page->setTpl("brands",[
                "brand" => Admin::listAllBrand()
            ]);
        });
    
        $app->get('/create', function() {
            Admin::verifyLoginAdmin();
            $page = new PageAdmin();
            $page->setTpl("brand-create");
        });
    
        $app->post('/create', function() {
            Admin::verifyLoginAdmin();
            Admin::createBrandAdmin($_POST);
        });
    
        $app->get('/:id_brand/delete', function($id_brand) {
            Admin::verifyLoginAdmin();
            Admin::deleteBrandAdmin($id_brand);
        });
    
        $app->get('/:id_brand', function($id_brand) {
            Admin::verifyLoginAdmin();
            $page = new PageAdmin();
            $page->setTpl("brand-update",[
                "brand" => Admin::listBrand($id_brand)
            ]);
        });
    
        $app->post('/:id_brand', function($id_brand) {
            Admin::verifyLoginAdmin();
            Admin::updateBrandAdmin($_POST,$id_brand);
        });
    });



    // Type
    $app->get('/types', function() {
        Admin::verifyLoginAdmin();
        $page = new PageAdmin();
        $page->setTpl("types",[
            "type" => Admin::listAllType()
        ]);
    });

    $app->get('/type/create', function() {
        Admin::verifyLoginAdmin();
        $page = new PageAdmin();
        $page->setTpl("type-create");
    });

    $app->post('/type/create', function() {
        Admin::verifyLoginAdmin();
        Admin::createTypeAdmin($_POST);
    });

    $app->get('/type/:id_type/delete', function($id_type){
        Admin::verifyLoginAdmin();
        Admin::deleteTypeAdmin($id_type);
    });


    $app->get('/type/:id_type', function($id_type) {
        Admin::verifyLoginAdmin();
        $page = new PageAdmin();
        $page->setTpl("type-update",[
            "type" => Admin::listType($id_type)
        ]);
    });

    $app->post('/type/:id_type', function($id_type) {
        Admin::verifyLoginAdmin();
        Admin::updateTypeAdmin($id_type, $_POST);
    });
});



// end Type