<?php 

namespace Controller\Product;

use Model\Crud;
use Controller\Exceptions\ExceptionsBrand;

class Brand extends Crud{

    private $name;


    public function createBrand($data = array()){

        $this->setName($data["name_brand"]);

        $result = $this->create("tb_brand",[
            "name_brand" => $this->getName()
        ]);
        
        if(!$result){
            ExceptionsBrand::brandNotCreated();
        }
    }

    public function selectBrand( $id_brand, $colunms = "*"){

        return $this->read("tb_brand", $colunms,"id_brand = '$id_brand'");

    }

    public function selectAllBrand($colunms = "*", $where = "1 = 1 AND status > 0"){

        return $this->read("tb_brand", $colunms,$where);

    }

    public function updateBrand($id_brand, $data = array()){

        $result = $this->update("tb_brand",$data, "id_brand = '$id_brand'");

        if(!$result){
            ExceptionsBrand::unsuccessfulUpdate();
        }

    }

    public function deleteBrand($id_brand){

        $this->delete("tb_brand", "id_brand = $id_brand");

    }



    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        if(!empty($name)){
            $this->name = $name;
        } else {
            ExceptionsBrand::brandNotInformed();
        }

    }


}