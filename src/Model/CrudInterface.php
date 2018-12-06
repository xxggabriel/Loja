<?php 

namespace Model;

interface CrudInterface{

    public function create($table, $data = array());

    public function read($table,$colunms, $where):array;

    public function update($table, $data = array(), $where);

    public function delete($table, $where);

}