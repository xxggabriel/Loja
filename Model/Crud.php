<?php 

namespace Model;

use Model\DB\Sql;
use Model\Model;
Class Crud extends Model{

    private $colunm  = [];
    private $value = [];
    private $values = [];

    public function create($table, $data = array()){
 
        $sql = new Sql();
     
        $this->setParams($data);
     
        foreach ($this->value as $value) {			
            array_unshift($this->values,"'$value'");;
           
        }

        $this->values = array_reverse($this->values);
        $columns = implode(",", $this->colunm);
        $values = implode(",", $this->values);
        $sql->query("INSERT INTO $table ($columns) VALUES ($values)",[
            ":table" => $table,
            ":colunms" => $columns,
            ":values" => $values
            ]);
    }

    private function setParams($data){

        foreach ($data as $key => $values) {

            array_push($this->colunm, $key);
            array_push($this->value, $values);

        }
    }

    public function read($table,$colunms, $where = "1 = 1"){

        $sql = new Sql();
        $results = $sql->select("SELECT $colunms FROM $table WHERE $where");
        return $results;
    }
    // Não esta fazendo o UPDATE 
    public function update($table, $data = array(), $where){
        $sql = new Sql();
        $this->setParams($data);
     
        foreach ($data as $colunm => $value) {			
            array_unshift($this->values,$colunm. " = " ."'$value'");
           
        }
        $values = implode(",", $this->values);
        var_dump($values);exit;
        $sql->query("UPDATE :table SET :values WHERE (:where)",[
            ":table" => $table,
            ":values" => $values,
            ":where" => $where

        ]);
    }

    // Não esta fazendo o
    public function delete($table, $where){

        $sql = new Sql();

        $sql->query("DELETE FROM :table WHERE :where",[
            ":table" => $table,
            ":where" => $where
        ]
    );

    }




}