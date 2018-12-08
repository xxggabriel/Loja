<?php 

namespace Controller\Product;

use Model\Crud;
use Controller\Exceptions\ExceptionsType;

class Type extends Crud{

    private $name;
    private $description;

    public function createType($data = array()){

        $this->setName($data["name"]);
        $this->setDescription($data["description"]);

        $result = $this->create("tb_type",[
            "name" => $this->getName(),
            "description" => $this->getDescription()
        ]);
        
        if(!$result){
            ExceptionsType::typeNotCreated();
        }
    }

    public function selectType($colunms = "*", $id_type){

        return $this->read("tb_type", $colunms,"id_type = '$id_type'");

    }

    public function selectAllType($colunms = "*", $where = "1 = 1"){

        return $this->read("tb_type", $colunms,$where);

    }

    public function updateType($id_type, $data = array()){

        $result = $this->update("tb_type",$data, "id_type = '$id_type'");
        
        if(!$result){
            ExceptionsType::unsuccessfulUpdate();
        }

    }

    public function deleteType($id_type){

        $result = $this->delete("tb_type", "id_type = '$id_type'");


    }



    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        if(!empty($name)){
            $result = $this->read("tb_type","name", "name = '$name'");
            
            if(!in_array($result[0], $result)){
    
                $this->name = $name;
            } else{
                ExceptionType::typeExisting();
            }
        } else {
            ExceptionsType::typeNotInformed();
        }

    }


    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

    }
}