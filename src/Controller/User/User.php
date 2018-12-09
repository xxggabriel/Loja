<?php 

namespace Controller\User;

use Model\Crud;
use Controller\Exceptions\ExceptionsUser;
use Controller\User\PasswordUser;
class User extends Crud {

    private $name;
    private $login;
    private $password;
    private $email;
    private $phone;

    public function createUser($data = array()){

        
        $this->setName($data["name"]) ;
        $this->setLogin($data["login"]) ;
        $this->setEmail($data["email"]);
        $this->setPhone($data["phone"]);


        $result = $this->create("tb_user", [
            "name" => $this->getName(),
            "login" => $this->getLogin(),
            "email" => $this->getEmail(),
            "phone" => $this->getPhone(),
            "status" => 1

        ]);

        if(!$result){
            ExceptionsUser::notCreateUser();
        }


    }

    public function selectUser($id_user){   

        return $this->read("tb_user","*","id_user = $id_user");


    }

    public function selectUserAll(){

        return $this->read("tb_user","*");

    }

    public function updateUser($data, $id_user){

        $this->update("tb_user", $data, "id_user = ".$id_user);

    }

    public function deleteUser($id_user){

        $this->delete("tb_user", "id_user = $id_user");

    }

    private function createSession($login){
        $this->create("tb_session",[
            "login" => $login,
            "session" => "SESSION".date("Y-m-d").$login
        ]);
    }

    public function loginUser($data = array()){

        $this->setLogin($data["login"]);
        $this->setPassword($data["password"]);

        $this->createSession($this->getLogin());
    }


    // GETs
    public function getName(){

        return $this->name;

    }

    public function getLogin(){

        return $this->login;

    }

    public function getEmail(){

        return $this->email;

    }

    public function getPhone(){

        return $this->phone;

    }


    // SETs
    public function setName($name){
        if(!empty($name)){
            // deixando todas tudo maiúscula 
            $name = strtolower($name);
            // Convertendo toda a primeira letra em maiúscula
            $name = ucwords($name);

            $this->name = $name;
        } else {
            ExceptionsUser::nameNotInformed();
        }

    }

    public function setLogin($login){

        if(!empty($login)){
            $result = $this->read("tb_user", "login", "login = '$login'");
            if(!$result == []){

                $this->login = $login;

            } else {

                ExceptionsUser::invalidLogin();
                
            }

        } else{
            ExceptionsUser::loginNotInformed();
        }

    }

    public function setEmail($email){

        if(!empty($email)){
            // Validar email
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                
                $this->email = $email;
    
            } else{
    
                ExceptionsUser::invalidEmail();    
    
            }
        } else {
            ExceptionsUser::emailNotInformed();

        }

    }

    public function setPhone($phone){

        // Retirar todos os caracters do numero
        $phone = str_replace(["(",")","-"," "], "", $phone);
        $this->phone = $phone;

    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {       
        $login = $this->getLogin();
        $passwordUser = new PasswordUser();
        $id_user = $this->read("tb_user", "id_user", "login = '$login'");
        if(!$id_user == []){
            $passwordVerify = $passwordUser->varifyPassword($id_user[0]["id_user"],$password);
            
            if($password == $passwordVerify){

                $this->password = $password;
            } else {
                var_dump($passwordVerify);exit;
                ExceptionsUser::invalidLogin();
            }

        } else{
            echo "User não encontrado";
            ExceptionsUser::invalidLogin();
        }

    }
}