<?php
//path peeversti  i mazasias
$path = explode('/',$_SERVER['PATH_INFO']);
//echo '<pre>';
//print_r($path);

$classFile='';
//$path[1] - Controllers
//$path[2] - metodas
if(isset($path[1])){
$classFile = ucfirst($path[1]).'Controller'; //PostsController
}
//echo $classFile;
if(file_exists('controllers/'.$classFile.'.php')){
	include_once('controllers/'.$classFile.'.php');
	//$object = new $classFile;
	$object = new PostsController;
	//echo $object->add();
	if(!empty($path[2])){
		$method = $path[2];//padaryti i mazasias raides
		if(method_exists($object, $method)){
			if(!empty($path[3])){
				$object->$method($path[3]);
			}
			else{
				$object->$method();
			}
		}
		else{
			$classFile = 'errorController';
			include_once('controllers/'.$classFile.'.php');
			$object = new $classFile;
			$object ->  error($path[2]);			
		}
	}
	else{
		$object->index();
	}
	
}
else{
	$classFile = 'errorController';
	include_once('controllers/'.$classFile.'.php');
	$object = new $classFile;
	$object ->  error();
}


