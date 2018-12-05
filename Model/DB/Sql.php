<?php 

namespace Model\DB;

class Sql {
	const HOSTNAME = "localhost";
	const USERNAME = "root";
	const PASSWORD = "";
	const DBNAME = "db_loja";
	private $conn;
	
	public function __construct()

	{
		try{

			$this->conn = new \PDO(
				"mysql:dbname=".Sql::DBNAME.";host=".Sql::HOSTNAME, 
				Sql::USERNAME,
				Sql::PASSWORD
			);
		} catch(\PDOException $e){
			echo json_encode([
				"message" => $e->getMessage(),
				"code" => $e->getCode(),
				"line" => $e->getLine(),
				"file" => $e->getFile()
			]);
		}
	}

	private function setParams($statement, $parameters = array())
	{
		foreach ($parameters as $key => $value) {
			
			$this->bindParam($statement, $key, $value);
		}
	}

	private function bindParam($statement, $key, $value)
	{
		$statement->bindParam($key, $value);
	}

	public function query($rawQuery, $params = array())
	{
		// var_dump($rawQuery,$params);exit;
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
	}
	
	public function select($rawQuery, $params = array()):array
	{
		// var_dump($rawQuery,$params);exit;
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
}