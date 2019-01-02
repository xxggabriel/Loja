<?php 

use Model\Page;
use Controller\User\User;
use Model\Model;
use Controller\Product\Product;
use Controller\User\Admin;
use Model\PageAccount;

$app->notFound(function(){
    $page = new Page([
        "header" => false,
        "footer" => false
    ]);
    $page->setTpl("404",[],false);
});

$app->get('/', function() {
    $page = new Page();
    
    $page->setTpl("slider", [],false);
    $page->setTpl("index");
});


$app->get('/login', function() {
    User::logoutUser(false);
    $page = new Page();
    $page->setTpl("login",[], false);
});

$app->post('/login', function() {
    $user = new User();
    
    $user->loginUser($_POST);
    header("Location: /");
    exit;

});

$app->post('/register', function() {
    $user = new User();
    $user->registerUser($_POST);
    header("Location: /");
    exit;

});

$app->get('/contact', function() {

    $page = new Page();
 
    $page->setTpl("contact",[],false);

});

$app->group('/product', function() use($app){
    
    $app->get('/', function() {
        $page = new Page();
        
        $model = new Model();
        $products = new Product();
    
        $model->setData($products->listAllProduct());
    
        $page->setTpl("products",[
            "products" => $model->getValues()
        ]);
    });
    
    $app->get('/:id_product', function($id_product) {
        $page = new Page();
        $product = new Product();
        if(empty($product->selectProduct($id_product))){
            Product::pageNotFound($page);
            exit;
        } 
        $model = new Model();
        $model->setData($product->selectProduct($id_product));
        
        $sample = new Model($product->selectProductSample($id_product));
        $sample->setData($product->selectProductSample($id_product));
        
        
        $brand = new Model();
        $brand->setData(Admin::listAllBrand());
    
        $result = $product->nameBrand($id_product);
    
    
        $page->setTpl("product-details",[
            "product" => $model->getValues(),
            "sample" => $sample->getValues(),
            "brand" => $brand->getValues(),
            "p" => $result 
        ]);
    });
    
    $app->post('/:id_product/add', function($id_product) {
        $page = new Page();
     
        $page->setTpl("products");
    });
});
