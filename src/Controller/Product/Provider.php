<?php 

namespace Controller\Product;

use Model\Crud;
use Controller\Exceptions\ExceptionProvider;
class Provider extends Crud{

    private $name;
    private $phone;
    private $cnpj;

    public function createProvider($data = array()){

        $this->setName($data["name"]);
        $this->setPhone($data["phone"]);
        $this->setCnpj($data["cnpj"]);

        $result = $this->create("tb_provider",[
            "name" => $this->getName(),
            "phone" => $this->getPhone(),
            "cnpj" => $this->getCnpj()
        ]);

        if(!$result){
            ExceptionProvider::notCreateProvider();
        }
        return $result;

    }

    public function selectAllProvider($colunms = "*", $where = "1 = 1"){

        return $this->read("tb_provider", $colunms, $where);

    }

    public function selectProvider($id_provider, $colunms = "*"){

        return $this->read("tb_provider", $colunms, "id_provider = '$id_provider'");

    }

    public function deleteProvider($id_provider){

        $this->delete("tb_provider","id_provider = '$id_provider'");

    }



    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {

        // Retirar todos os caracters do numero
        $phone = str_replace(["(",")","-"," "], "", $phone);
        $this->phone = $phone;

        
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        if(!empty($name)){
            // deixando todas tudo maiúscula 
            $name = strtolower($name);
            // Convertendo toda a primeira letra em maiúscula
            $name = ucwords($name);

            $this->name = $name;
        } else {
            ExceptionsProvider::nameNotInformed();
        }
        
    }


    public function getCnpj()
    {
        return $this->cnpj;
    }


    public function setCnpj($cnpj)
    {
        if($this->ValidateCnpj($cnpj)){

            $this->cnpj = $cnpj;
        } 

    }
}