<?php
include_once'C:\xampp2\htdocs\mvc\libs\Controller.php';
class ErrorController extends Controller{
	public function error(){
		$this->view->render('error');
	}
}