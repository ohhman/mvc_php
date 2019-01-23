<?php

	include_once 'C:\xampp2\htdocs\mvc\libs\Database.php';
	$a = new Database;
	//$a->connect();
	echo '<br>';
	$a->select()->from('timeTable')->where('id',2,'=');
	$result = $a->get();
	//echo '<br>';
	// echo '<pre>';
	// while ($post = $result->fetch_assoc()){
	// 	var_dump($post);
	// }
	//include_once 'C:\xampp2\htdocs\mvc\controllers\PostsController.php';
	$b = new PostsController;
	echo $b->edit();
	
	
	//echo $b->add();