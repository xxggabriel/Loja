<?php 

namespace Controller\User;

use Model\Crud;
use Model\Model;

class User extends Crud{

    private $model;
    private $user;

    public function createUser($data = array()){
         
        $this->setData($data);

        // var_dump($this->getlogin());exit;

        $this->create("tb_user", [
            "name" => $this->getname(),
            "login" => $this->getlogin(),
            "email" => $this->getemail(),
            "phone" => $this->getphone(),
            "status" => 1

        ]);
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

}