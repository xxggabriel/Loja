<?php 

namespace Controller\Product;

use Model\Crud;
use Controller\Exceptions\ExceptionProduct;
class Product extends Crud{

    private $id_provider;
    private $id_brand;
    private $id_type;
    private $id_product_sample;
    private $name;
    private $value;
    private $value_cost ;

    public function createProduct($data = array()){

        $this->setId_brand($data["id_brand"]);
        $this->setId_provider($data["id_provider"]);
        $this->setId_type($data["id_type"]);
        $this->setId_product_sample($data["id_product_sample"]);
        $this->setName($data["name"]);
        $this->setValue($data["value"]);
        $this->setValue_cost($data["value_cost"]);

        // var_dump($this->getValue());exit;
        $result = $this->create("tb_product",[
            "id_brand" => $this->getId_brand(),
            "id_provider" => $this->getId_provider(),
            "id_type" => $this->getId_type(),
            "id_product_sample" =>$this->getId_product_sample(),
            "name" => $this->getName(),
            "value" => $this->getValue(),
            "value_cost" => $this->getValue_cost()
        ]);
        if(!$result){
            ExceptionProduct::notCreateProduct();
        }
    }

    public function selectProduct($id_product,$colunms = "*"){

        return $this->read("tb_product", $colunms, "id_product = $id_product");

    }

    public function selectAllProducts($colunms = "*", $where = "1 = 1"){

        return $this->read("tb_product", $colunms, $where);

    }

    public function updateProduct($data,$id_product){

        $this->update("tb_product", $data, "id_product = '$id_product'");

    }

    public function deleteProduct($id_product){

        $this->delete("tb_product", "id_product = '$id_product'");

    }
    


    public function getId_provider()
    {
        return $this->id_provider;
    }


    public function setId_provider($id_provider)
    {
        $result = $this->read("tb_provider", "id_provider", "id_provider = '$id_provider'");
        if(!$result == []){

            $this->id_provider = $id_provider;

        } else {
            ExceptionProduct::providerIdNotFound();
        }

        

    }


    public function getId_brand()
    {
        return $this->id_brand;
    }


    public function setId_brand($id_brand)
    {
        $result = $this->read("tb_brand", "id_brand", "id_brand = '$id_brand'");
        if(!$result == []){

            $this->id_brand = $id_brand;

        } else {
            ExceptionProduct::providerIdNotFound();
        }
    }


    public function getId_type()
    {
        return $this->id_type;
    }


    public function setId_type($id_type)
    {
        $result = $this->read("tb_type", "id_type", "id_type = '$id_type'");
        if(!$result == []){

            $this->id_type = $id_type;

        } else {
            ExceptionProduct::providerIdNotFound();
        }
    }


    public function getId_product_sample()
    {
        return $this->id_product_sample;
    }


    public function setId_product_sample($id_product_sample)
    {
        $this->id_product_sample = $id_product_sample;

        return $this;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    public function getValue()
    {
        return $this->value;
    }


    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }


    public function getValue_cost()
    {
        return $this->value_cost;
    }


    public function setValue_cost($value_cost)
    {
        $this->value_cost = $value_cost;

        return $this;
    }
}