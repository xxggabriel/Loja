<?php 

namespace Controller\User;

use Controller\Exceptions\ExceptionAdmin;
use Controller\User\User;
use Controller\Product\Product;
use Controller\Product\Provider;
use Controller\Product\Brand;
use Controller\Product\Type;
use Controller\Sale\Sale;

class Admin{

    private $id_user;
    private $login;
    private $email;
    private $photo;

    public function verifyLoginAdmin($route = NULL){

        if(empty($_SESSION["logged_admin"])){
            $_SESSION['route_login'] = $route;
            header("Location: /login/admin");
            exit;
        }
    }

    public function loginAdmin($data = array()){
        parent::loginUser($data,3);
        header("Location: /admin");
        exit;
    }

    public static function logoutAdmin($redirect = true){
        session_destroy();
        if($redirect){
            header("Location: /login/admin");
            exit;
        }
    }

    
    public static function listAllUser(){
        $user = new User();
        return $user->selectUserAll("status > 0");
    }

    public static function listUser($id_user){
        $user = new User();
        $result = $user->selectUser($id_user);
        return $result[0];
    }


    public static function listAllProduct(){
        $product = new Product();
       
        return  $product->selectAllProducts();
        
    }

    public static function listAllBrand(){
        $brand = new Brand();
        return $brand->selectAllBrand();
    }

    public static function listProduct($id_product){
        $product = new Product();
        $result = $product->selectProduct($id_product);
        return $result[0];
    }

    public static function createUserAdmin($data = array(), $route = "/admin/users"){

        $user = new User();
        $user->createUser($data);
        header("Location: $route");
        exit;
    }

    public static function createProductAdmn($data = array(), $route = "/admin/products"){
        $product = new Product();
        $product->createProduct($data);
        header("Location: $route");
        exit;
    }

    public static function updateUserAdmin($data = array(),$id_user, $route = "/admin/users"){
        $user = new User();
        $user->updateUser($data,$id_user);
        header("Location: $route");
        exit;
    }

    public static function updateAdminPassword($password,$id_user, $route = "/admin/users"){
        $user = new User();
        $user->updatePassword($password,$id_user);
        header("Location: $route");
        exit;
    }

    public static function updateProductAdmin($data = array(),$id_product, $route = "/admin/products"){
        $product = new Product();
        $product->updateProduct($data,$id_product);
        header("Location: $route");
        exit;
    }

    public static function deleteAdminUser($id_user, $route = "/admin/users"){
        $user = new User();
        $user->deleteUser($id_user);
        header("Location: $route");
        exit;
    }

    public static function deleteAdminProduct($id_product, $route = "/admin/products"){
        $product = new Product();
        $product->deleteProduct($id_product);
        header("Location: $route");
        exit;
    }

    public static function createProductSampleAdmin($data = array(), $route = "/admin/products"){

        $product = new Product();
        $product->createProductSample($data);
        header("Location: $route");
        exit;

    }

    public static function savePhoto($data){
        $uploaddir = $_SERVER["DOCUMENT_ROOT"].'/resource/upload/';
        // $data["name"] = date("Y-m-d H:i:s")."nome-do-meu-site";
        $uploadfile = $uploaddir . date("-Y-m-d")."-nome-do-site-".$data['name'];
        echo '<pre>';
        if (move_uploaded_file($data['tmp_name'], $uploadfile)) {
            return $uploadfile;
        } else {
            ExceptionAdmin::unsavedFile();
        }
        

        
    } 
    
    public static function listType($id_type){
        $type = new Type();
        $result = $type->selectType($id_type);
        return $result[0];
    }

    public static function listProvider($id_provider){
        $provider = new Provider();
        $result = $provider->selectProvider($id_provider);
        return $result[0];
    }

    public static function listBrand($id_brand){
        $brand = new Brand();
        $result = $brand->selectbrand($id_brand);
        return $result[0];
    }
    // GETs and SETs

    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }


    public function getId_user():int
    {
        return $this->id_user;
    }


    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }


    public function getPhoto()
    {
        return $this->photo;
    }
 
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }
}