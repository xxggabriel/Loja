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
    private $amount;

    public function createProduct($data = array()){

        $this->setId_brand($data["id_brand"]);
        $this->setId_provider($data["id_provider"]);
        $this->setId_type($data["id_type"]);
        $this->setAmount($data["amount"]);
        $this->setName($data["name_product"]);
        $this->setValue($data["value"]);
        $this->setValue_cost($data["value_cost"]);

        // var_dump($this->getValue());exit;
        $result = $this->create("tb_product",[
            "id_brand" => $this->getId_brand(),
            "id_provider" => $this->getId_provider(),
            "id_type" => $this->getId_type(),
            "name_product" => $this->getName(),
            "amount" => $this->getAmount(),
            "value" => $this->getValue(),
            "value_cost" => $this->getValue_cost()
        ]);
        if(!$result){
            ExceptionProduct::notCreateProduct();
        }
    }

    public function selectProduct($id_product,$colunms = "*"){

        $result = $this->read("tb_product", $colunms, "id_product = $id_product AND status > 0");
        if(!empty($result)){
            return $result[0];
        } else {
            return [];
        }

    }

    public function selectAllProducts($colunms = "*", $where = "1 = 1 AND status_product > 0"){

        return $this->read("tb_product", $colunms, $where);

    }

    public function updateProduct($data = array(),$id_product){

        $this->update("tb_product", $data, "id_product = ".$id_product);

    }

    public function deleteProduct($id_product){

        $this->delete("tb_product", "id_product = '$id_product'", "_product");

    }
    
    public function createProductSample($data = array()){
        $this->create("tb_product_sample",[
            "id_product" => $data["id_product"],
            "title" => $data["title"],
            "description" => $data["description"],
            "photo" => $data["photo"],
            "link" => "/".$data["link"]
        ]);

    }

    public function selectAllProductsSample(){

        return $this->read("tb_product_sample", "*");

    }

    public function selectProductSample($id_product, $colunm = "*"){

        $result = $this->read("tb_product_sample",$colunm,  "id_product = $id_product AND status > 0");
        if(!empty($result)){
            return $result[0];
        } else {
            return [NULL];
        }

    }

    public function nameBrand($id_product){
        $id_brand = $this->read("tb_product", "id_brand", "id_product = $id_product");
        $id_brand = $id_brand[0]["id_brand"];
        $result = $this->read("tb_brand", "name_brand", "id_brand = $id_brand");
        return $result[0];
    } 

    public static function pageNotFound($page){
            return $page->setTpl("404-product");
    
    } 

    // GETs and SETs

    public function getId_provider()
    {
        return $this->id_provider;
    }


    public function setId_provider($id_provider)
    {
        if(!empty($id_provider)){

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
        if(!empty($id_brand)){

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
        if(!empty($id_type)){

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

    /**
     * Get the value of amount
     */ 
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @return  self
     */ 
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }
}