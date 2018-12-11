<?php 

namespace Controller\User;

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

}