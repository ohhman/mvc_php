<?php
include_once 'C:\xampp2\htdocs\mvc\libs\Controller.php';
include_once 'C:\xampp2\htdocs\mvc\libs\Database.php';
class Posts {
	public function getAllposts(){
		$db = new Database();
		$db ->select()->from('form');
		return $db->get();
	}
	public function getPostById($id){
		$db = new Database();
		$db->select()->from('form')->where('id', $id);
		return $db->get();
	}
	public function getPostsBySlug(){



	}
	public function insertPost($a,$b,$c,$d){
		$db = new Database();
		$db->connect();
		$sql = "INSERT INTO form(Title, Image, Text, Selection)
		VALUES ('$a','$b','$d','$c')";
		if (mysqli_query($db->connect(), $sql)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($db->connnect());
		}

	}
	public function deletePost(){

	}
}