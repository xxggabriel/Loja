<?php 

namespace Controller\User;

use Model\Crud;
use Model\Mailer;
use Controller\Exceptions\ExceptionsUserPassword;

class PasswordUser extends Crud{
    
    private $id_user;
    private $password;

    public function createPasword($data = array()){

        $this->setId_user($data["id_user"]);
        $this->setPassword($data["password"]);

        $this->create("tb_password_user", [
            "id_user" => $this->getId_user(),
            "password" => $this->getPassword()
        ]);
    }

    public function updatePassword($id_user, $password){
        $this->setPassword($password);
        $this->update("tb_password_user",[
            "password" =>  $this->getPassword()
        ], "id_user = '$id_user'");

    }


    public function recoverPassword($id_user){
        // Exite algum token para esse usuario dentro de 1 hora
        $result = $this->read("tb_recover_password_user","*", "id_user = '$id_user'");
        
        if(in_array($result[0],$result)){

            $token = bin2hex(random_bytes(50));

            $this->update("tb_recover_password_user",[
                "token" => $token,
                "date" => date("Y-m-d H:i:s"),
            ], "id_user = '$id_user'");

        } else{
            
            $token = bin2hex(random_bytes(50));
    
            $this->create("tb_recover_password_user",[
                "id_user" => $id_user,
                "token" => $token
            ]);
    
            $link = "http://localhost:8888/recuperar/?token=$token";
            $message = "O link para redefinir sua senha:";
            $result = $this->read("tb_user", "email,name", "id_user = '$id_user'");
            $email = $result[0]["email"];
            $name = $result[0]["name"];
            
            $mailer = new Mailer($email, $name,"Redefinir Senha","rest-password",["message" => $message, "link"=> $link]);
            $mailer->send();
        }

    }

    public function varifyRecoverPassword($token){
        // Varificar se exite um token valido
        $result = $this->read("tb_recover_password_user","*", "token = '$token'");
        if(in_array($result[0],$result)){
            $result = $result[0];

            // Varificar se o status
            if($result["status"] > 0){    
                // Varifica se foi criando dentro de 1 hora
                $date = date('Y-m-d H:i:s', strtotime('-1 hour'));        
                if($result["date"] > $date) {
                    return true;
                } else {
                   ExceptionsUserPassword::expiredToken();
                }
            } else{
                ExceptionsUserPassword::invalidToken();
            }
        } else {
            ExceptionsUserPassword::invalidToken();
        }

    }

    public function varifyPassword($id_user,$password){

        $hash = $this->read("tb_password_user", "password", "id_user = '$id_user'");

        $password = password_verify($password, $hash[0]["password"]);

        return $password;

    }

    public function getId_user()
    {
        return $this->id_user;
    }


    public function setId_user($id_user)
    {
        if(!empty($id_user)){

            //Verificar se existe usuário com esse id
            $result = $this->read("tb_user","id_user", "id_user = '$id_user'");
            if(in_array($result[0], $result)){
                $result = $this->read("tb_password_user","id_user", "id_user = '$id_user'");
                if(!in_array($result[0], $result)){

                    $this->id_user = $id_user;

                } else {
                    ExceptionsUserPassword::IdAlreadyRegistered();
                }
            
            } else{
    
                ExceptionsUserPassword::idNonExistent();
    
            }
        } else {
            ExceptionsUserPassword::idNotInformed();
        }

    }

    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        if(!empty($password)){

            $hash = password_hash($password, PASSWORD_DEFAULT);
    
            $this->password = $hash;
        } else {
            ExceptionsUserPassword::PasswordNotInformed();
        }

    }


}