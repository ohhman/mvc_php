<?php

class Database 
{

	private $conn;
	private $query;

	public function connect(){

		$servername = "localhost";
		$username = "root";
		$password = "";
		$db ='mvc_php';

// Create connection

		$this->conn = new mysqli($servername, $username, $password, $db);
		return $this->conn;

		
	}

	public function select($target = '*'){
		$this->query='SELECT '.$target.' ';
		return $this;
	}
	public function from($tableName){
		$this->query .= 'FROM '.$tableName.' ';
		return $this;
	}
	public function where($field, $value,$operator = '='){
		$this->query .= 'WHERE '.$field.' '.$operator.' '.$value.'';
		return $this;
	}
	public function whereAND($field, $value,$operator = '='){
		$this->query .= 'AND'.$field.' '.$operator.' '.$value.'';
		return $this;
	}
	public function whereOr($field, $value,$operator = '='){
		$this->query .= 'OR'.$field.' '.$operator.' '.$value.'';
		return $this;
	}
	public function get(){
		$result = $this->connect()->query($this->query);
		//$row = mysqli_fetch_row($result);
		

		//$result = mysqli_query($this->connect(), $this->query);
		//$result = mysqli_fetch_array($result);
		return $result;
	}
}
