<?php

class View{


	private $viewCatalogPath = 'C:\xampp2\htdocs\mvc\views\\';
	public function render($templatePath){

		require ($this->viewCatalogPath.'header.php');
		require ($this->viewCatalogPath.$templatePath.'.php');
		
		require ($this->viewCatalogPath.'footer.php');

	}
}
