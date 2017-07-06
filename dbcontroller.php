<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "db_inter";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = $this->conn->query($query);
		if(!$result){
			throw new Exception('No result');
		} else {
			return $result;
		}
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
	
	function updateQuery($query) {
		$result = mysqli_query($this->conn,$query);
		if (!$result) {
			throw new Exception('Invalid query: ' . mysql_error());
		} else {
			return $result;
		}
	}
	
	function insertQuery($query) {
		$result = mysqli_query($this->conn,$query);
		if (!$result) {
			throw new Exception('Invalid query: ' . mysql_error());
		} else {
			return $result;
		}
	}
	
	function deleteQuery($query) {
		$result = mysqli_query($this->conn,$query);
		if (!$result) {
			throw new Exception('Invalid query: ' . mysql_error());
		} else {
			return $result;
		}
	}
}
?>