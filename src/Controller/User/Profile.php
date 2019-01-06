<?php 

namespace Controller\User;

use Model\Crud;
use Controller\Exceptions\ExceptionsUserProfile;

class Profile extends Crud{
   
    private $id_user;
    private $user_name;
    private $photo;
    private $biography;

    public function createProfile($data = array()){

        $this->setId_user($data["id_user"]);
        $this->setUser_name($data["user_name"]);
        $this->setPhoto($data["photo"]);
        $this->setBiography($data["biography"]);

        $this->create("tb_user_profile", [
            "id_user" => $this->getId_user(),
            "user_name" => $this->getUser_name(),
            "photo" => $this->photo(),
            "biography" => $this->getBiography()
        ]);
    }

    public function selectProfile($colunms, $where, $table = "tb_user_profile"){
        
        $result = $this->read($table, $colunms, $where);

        return $result;

    }

    public function selectProfileAll($colunms, $table = "tb_user_profile"){

        $result = $this->read($table, $colunms, "1 = 1");

        return $result;

    }

    public function updateProfile($data, $id_user){

        $this->update("tb_user_profile",$data, "id_user = '$id_user'");

    }

    public function deleteProfile($id_user){

        $this->delete("tb_user_profile", "id_user = '$id_user'");

    }

    



    public function getId_user()
    {
        return $this->id_user;
    }


    public function setId_user($id_user)
    {
        if(!empty($id_user)){
                
            $this->id_user = $id_user;

        } else{

            ExceptionsUserProfile::notInformedIdUser();

        }
    }


    public function getUser_name()
    {
        return $this->user_name;
    }


    public function setUser_name($user_name)
    {
        if(!empty($user_name)){
    
                $this->user_name = $user_name;
                
        } else {
            ExceptionsUserProfile::notInformedUserName();
        }
    }


    public function getPhoto()
    {
        return $this->photo;
    }


    public function setPhoto($photo)
    {
        if(!empty($photo)){

            $this->photo = $photo;
            
        } else {
            $this->photo = NULL;
        }
    }

  
    public function getBiography()
    {
        return $this->biography;
    }


    public function setBiography($biography)
    {
        if(!empty($biography)){

            $this->biography = $biography;

        } else {
            $this->biography = NULL;
        }
    }
}