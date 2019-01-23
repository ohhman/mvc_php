<?php
class FormHelper{
	private $form='';

	public function __construct($method, $action){
		$this->form.='<form method = "'.$method.'" action="'.$action.'">'; 
	}	
	public function input($attributes){
		$this->form .='<input ';
			foreach($attributes as $key => $attr){
				$this->form.=$key.'="'.$attr.'"';

			}
		$this->form.='>';
		
		return $this;
	}
	public function select($elements,$name){
		foreach ($name as $id => $name) {	
		$this->form.='<select name="'.$name.'" id="'.$id.'">';
	}

		foreach ($elements as $key => $value) {
		$this->form.='<option value="'.$key.'">'.$value.'</option>';
		}
		$this->form.='</select>';
		return $this;
	}
	public function text($array){
		foreach ($array as $key => $value) {
		$this->form.='<textarea name="'.$key.'">'.$value.'</textarea>';
	}
	return $this;
}

	public function get(){
		$this->form.='</form>';
		return $this->form;
	}

}