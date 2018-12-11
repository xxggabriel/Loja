<?php 

namespace Controller\User;

use Controller\Product\Product;
use Controller\Sale\Sale;

class Admin extends User{

    private $id_user;
    private $login;
    private $email;

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
        $result = $user->selectUser($id_user)[0];
        return $result;
    }


    public static function listAllProduct(){
        $user = new User();
        return $user->selectAllProducts();
    }

    public static function listProduct($id_user){
        $user = new User();
        return $user->selectProducts();
    }

    public static function updateAdmin($data = array(),$id_user, $route = "/admin/users"){
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

    public static function deleteAdminUser($id_user, $route = "/admin/users"){
        $user = new User();
        $user->deleteUser($id_user);
        header("Location: $route");
        exit;
    }

    // public static function listAllSale(){
    //     $user = new User();
    //     return $user->selectSaleAll();
    // }

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
}