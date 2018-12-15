<?php 

use Model\Page;
use Model\Model;
use Controller\Product\Product;
use Controller\User\Admin;
$app->get('/products', function() {
    $page = new Page();
    
    $model = new Model();
    $products = new Product();

    $model->setData($products->listAllProduct());

    $page->setTpl("products",[
        "products" => $model->getValues()
    ]);
});

$app->get('/product/:id_product', function($id_product) {
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

$app->post('/product/:id_product/add', function($id_product) {
    $page = new Page();
 
    $page->setTpl("products");
});

