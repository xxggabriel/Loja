<?php 

namespace Model;

use Model\DB\Sql;
use Model\Model;
abstract Class Crud extends Model{

    private $colunm  = [];
    private $value = [];
    private $values = [];

    public function create($table, $data = array()){
 
        $sql = new Sql();
        
        $this->setParams($data);
        // Foreach para fazer cada $value ficar com aspas simples
        foreach ($this->value as $value) {			
            array_unshift($this->values,"'$value'");;
           
        }

        // reverter o array 
        $this->values = array_reverse($this->values);

    
        $columns = implode(",", $this->colunm);
        $values = implode(",", $this->values);

        $sql->query("INSERT INTO $table ($columns) VALUES ($values)");
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

    public function update($table, $data = array(), $where){
        $sql = new Sql();
        $this->setParams($data);
        
        // unindo as colunas com os valores e os valores já com aspas 
        foreach ($data as $colunm => $value) {			
            array_unshift($this->values,$colunm. " = " ."'$value'");
           
        }

        $values = implode(",", $this->values);

        $sql->query("UPDATE $table SET $values WHERE $where");
    }
     
    public function delete($table, $where){
        $sql = new Sql();

        $sql->query("UPDATE $table SET status = 0 WHERE $where");

    }





}