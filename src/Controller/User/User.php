<?php 

namespace Controller\User;

use Model\Crud;
use Model\Mailer;
use Controller\Exceptions\ExceptionsUser;
class User extends Crud {

    private $name;
    private $login;
    private $password;
    private $email;
    private $phone;
    private $id_user;

    public function createUser($data = array()){

        
        $this->setName($data["name"]) ;
        $this->setLogin($data["login"]) ;
        $this->setEmail($data["email"]);
        $this->setPassword($data["password"]);


        $result = $this->create("tb_user", [
            "name" => $this->getName(),
            "login" => $this->getLogin(),
            "email" => $this->getEmail(),
            "password" => $this->getPassword(),
            "status" => 1

        ]);

        if(!$result){
            ExceptionsUser::notCreateUser();
        }


    }

    public function selectUser($id_user){   

        return $this->read("tb_user","*","id_user = '$id_user'");


    }

    public function selectUserAll($where = "1 = 1"){

        return $this->read("tb_user","*",$where);

    }

    public function updateUser($data, $id_user){

        $this->update("tb_user", $data, "id_user = ".$id_user);

    }

    public function deleteUser($id_user){

        $this->delete("tb_user", "id_user = $id_user");

    }

    private function createSession($status){
        $_SESSION["email"] = $this->getEmail();
        $_SESSION["name"] = $this->getName();
        $_SESSION["id"] = $this->getId_user();
        $_SESSION["session_user"] = $this->getLogin()."-".$this->getEmail();
        if($status === 2){

            $_SESSION["logged_user"] = true;
        } else{
            $_SESSION["logged_admin"] = true;
        }
        $this->create("tb_session", [
            "id_user" => $this->getId_user(),
            "session" => $_SESSION["session_user"]
        ]);
    }

    public function loginUser($data = array(), $status = 2){

        $this->setLogin($data["login"]);
        $this->setPassword($data["password"]);

        // Recebendo Login
        $login = $data["login"];
        // Selecionando todas as colunas da tabela tb_user
        $user = $this->read("tb_user", "*", "login = '$login' AND status = $status AND status > 0");
        if(!empty($user)){

            $this->setEmail($user[0]["email"]);
            $this->setName($user[0]["name"]);
            $this->setId_user($user[0]["id_user"]);
            $this->setLogin($login);
            // Criando sessão
            $this->createSession($status);
        } else if(empty($user)) {

            ExceptionsUser::invalidLogin();
            
        } else {

            ExceptionsUser::loginNotInformed();

        }
    

    }

    public static function logoutUser($redirect = true){
        session_destroy();
        if($redirect){
            header("Location: /login");
            exit;
        }
    }

    public function registerUser($data = array()){
        
       
        $this->setEmail($data["email"]);
        $this->setName($data["name"]);
        $this->setLogin($data["login"]);     
        $this->setPassword($data["password"]);
        // Criando User
        $this->createUser([
            "name" => $this->getName(),
            "login" => $this->getLogin(),
            "password" => $this->getPassword(),
            "email" => $this->getEmail()
        ]);
           
        // Criando a sessão do usuario
        $this->createSession();
    }


    public static function verifyLogin($route = NULL){

        if(empty($_SESSION["logged_user"])){
            $_SESSION['route_login'] = $route;
            header("Location: /login");
            exit;
        } 
    }

    public function recoverPassword($email,$page){
        // Receber o id do email passado
        $result = $this->read("tb_user", "id_user", "email = '$email'");

        $id_user = $result[0]["id_user"];
        // Exite algum token para esse usuario dentro de 1 hora
        $user = $this->read("tb_recover_password_user","*", "id_user = '$id_user'");
        
        if(!empty($user)){
        //    Atualizar token
            $token = bin2hex(random_bytes(50));

            $this->update("tb_recover_password_user",[
                "token" => $token,
                "date" => date("Y-m-d H:i:s"),
            ], "id_user = '$id_user'");

        } else{
             // Criar token
            $token = bin2hex(random_bytes(50));
    
            $this->create("tb_recover_password_user",[
                "id_user" => $id_user,
                "token" => $token
            ]);
            // Criando link de validação
            $link = "http://localhost:8888/recovers/?token=$token";
            // Mensagem que vai para o email 
            $message = "O link para redefinir sua senha:";
            
            $user = $this->read("tb_user", "email,name", "id_user = '$id_user'");
            $email = $user[0]["email"];
            $name = $user[0]["name"];
            // Enviar link para o email do usuario
            $mailer = new Mailer($email, $name,"Redefinir Senha","rest-password",["message" => $message, "link"=> $link]);
            $mailer->send();
        }
        header("Location: $page");
        exit;

    }

    public function varifyRecoverPassword($token,$page){
        // Varificar se exite um token valido
        $result = $this->read("tb_recover_password_user","*", "token = '$token'");
        if(!empty($result)){
            $result = $result[0];

            // Varificar se o status
            if($result["status"] > 0){    
                // Varifica se foi criando dentro de 1 hora
                $date = date('Y-m-d H:i:s', strtotime('-1 hour'));        
                if($result["date"] > $date) {
                    
                    header("Location: /admin/recovers/update");
                    exit;
                    exit;
                } else {
                   ExceptionsUser::expiredToken();
                }
            } else{
                ExceptionsUser::invalidToken();
            }
        } else {
            ExceptionsUser::invalidToken();
        }

    }

    public function varifyPassword($id_user,$password){

        $hash = $this->read("tb_password_user", "password", "id_user = '$id_user'");
        
        if(!$hash == []){

            $result = password_verify($password, $hash[0]["password"]);
        } else {
            echo "Id do usuario não informado";exit;
        }

        return $result;

    }

    public function updatePassword($password,$where){
        $hash = $this->encryptPassword($password);
        $this->update("tb_user", [
            "password" => $hash
        ], $where);
    }

    public function encryptPassword($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function dencryptPassword($password,$hash){
        return password_verify($password,$hash);
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

            $this->login = $login;
    
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


    public function getPassword()
    {
        return $this->password;
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

    public function setPassword($password)
    {       

        if(!empty($password)){
            $password = $this->encryptPassword($password);
            $this->password = $password;

        } else{
            echo "Senha não informada";exit;
        }


    }



    public function getId_user()
    {
        return $this->id_user;
    }


    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }
}