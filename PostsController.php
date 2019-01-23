<?php 
include_once 'C:\xampp2\htdocs\mvc\libs\Controller.php';
include_once 'C:\xampp2\htdocs\mvc\models\Posts.php';
include_once 'C:\xampp2\htdocs\mvc\helpers\FormHelper.php';
include_once 'C:\xampp2\htdocs\mvc\helpers\Helper.php';
include_once 'C:\xampp2\htdocs\mvc\libs\Database.php';
class PostsController extends Controller{


	public function index(){

		$posts = new Posts();


		//$this->view->title= 'Musu Page Title';
		//$this->view->headline = 'Musu Headlinas';
		//$this->view->render('header');
		//$this->view->render('posts');
		$this->view->render('users');
		//$this->view->render('footer');
		//$this->view->render('Posts');
		$this->view->posts = $posts->getAllposts();
		//$this->view->render('FormHelper');
	}
	public function error(){
		$this->view->render('error');
	}

	public function show($id){
		echo $id;
	}
	public function add(){
		$form = new FormHelper('POST', 'http://localhost/mvc/index.php/posts/store');
		$form->input([
			'name' => 'title',
			'type' => 'text',
			'placeholder' => 'Title'

		])->input([
			'name' => 'image',
			'type' => 'text',
			'placeholder' => 'Image URL'

		])->input([
			'name' => 'public',
			'type' => 'checkbox',
			'value' => 1

		])->input([
			'name' => 'submit',
			'type' => 'submit',
			'value' => 'Add'

		]);
		$form->select([
			'First' => 'first',
			'second' => 'third'],[
				'Name' => 'Selection']);
		$form->text([
			'Last' => 'Text'
		]);
		echo $form->get();
	}
	public function store(){
		echo '<pre>';
		var_dump($_POST);
		$a=$_POST['title'];
		$b=$_POST['image'];
		$c=$_POST['Selection'];
		$d=$_POST['Text'];
		$k = new Posts;
		$k->insertPost($a,$b,$c,$d);
	}

	public function edit($id){

		echo '<pre>';
		//$path = explode('/',$_SERVER['PATH_INFO']);
		$Oldpost = new Posts;
		$Oldpost->getPostById($id);
		$GetPost = $Oldpost->getPostById($id)->fetch_assoc();

		var_dump($GetPost);
		print_r($GetPost);
		echo $GetPost ['Title'];
		$form = new FormHelper('POST', 'http://localhost/mvc/index.php/posts/update');
		$form->input([
			'name' => 'title',
			'type' => 'text',
			'placeholder' => 'Title',
			'value' => $GetPost['Title']

		])->input([
			'name' => 'image',
			'type' => 'text',
			'placeholder' => 'Image URL',
			'value' => $GetPost['Image']

		])->input([
			'name' => 'submit',
			'type' => 'submit',
			'value' => 'Add'

		])
		->select([
			'First' => 'first',
			'second' => 'third',
			'value' => $GetPost['Selection']
		],[
			'Name' => 'Selection'])
		->text([
			//'Last' => 'text',
			'text' => $GetPost['Text']
		]);
		echo $form->get();



	}

	public function update($id){
		echo '<pre>';
		
		$Oldpost = new Posts;
		$Oldpost->getPostById($id);
		$GetPost = $Oldpost->getPostById($id)->fetch_assoc();

		var_dump($GetPost);
		print_r($GetPost);
		echo $GetPost ['Title'];
		$form = new FormHelper('POST', '');
		$form->input([
			'name' => 'title',
			'type' => 'text',
			'placeholder' => 'Title',
			'value' => $GetPost['Title']

		])->input([
			'name' => 'image',
			'type' => 'text',
			'placeholder' => 'Image URL',
			'value' => $GetPost['Image']

		])->input([
			'name' => 'submit',
			'type' => 'submit',
			'value' => 'Add'

		])
		->select([
			'First' => 'first',
			'second' => 'third',
			'value' => $GetPost['Selection']
		],[
			'Name' => 'Selection'])
		->text([
			//'Last' => 'text',
			'Text' => $GetPost['Text']
		]);
		echo $form->get();

		$a=$GetPost['Title'];
		echo $a;
		$b=$GetPost['Image'];
		$c=$GetPost['Text'];
		$d=$GetPost['Selection'];
		$db = new Database;
		$db->connect();
		$sql = "UPDATE form SET Title='$a' Image='$b' Text='$c' Selection='$d' WHERE Id='$id'";
		if ($db->connect()->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $db->connect()->error;
		}
		



		
	}

	public function delete(){ //laukelis, kuriame butu reiksme 1, bet pasikeistu i 0 jei kazkas yra istrinama is DB


	}

	public function test(){
		$slug = Helper::getSlug('Posto pavadinimas');
		echo $slug;

	}

}

