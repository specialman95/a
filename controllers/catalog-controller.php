<?php
class CATALOG_CONTROLLER {
	private $model;
	public function __construct(){
		require ('Models/catalog-model.php');
		$this->model = new CATALOG_MODEL();
	}
	public function run(){
		$action = isset($_GET['action'])?$_GET['action']:'';
		switch ($action) {
			case 'listCatalog':
				$this->listCatalog();
			break;
			case 'delete':
				$this->delete();
			break;
			case 'add':
				$this->add();
			break;
			case 'edit':
				$this->edit();
			break;
			default:
				# code...
			break;
		}
	}
	public function listCatalog(){
		$listCatalog=$this->model->listCatalog();
		require('views/list-catalog.php');
	}
	public function delete(){
		$catalogId = isset($_GET['id'])?$_GET['id']:'';
		if(empty($catalogId)){
			die('ID does not exist');
		}
		$catalog = $this->model->delete($catalogId);
		header("Location: ?controller=catalog&action=listCatalog");
	}
	public function add(){
		if(!isset($_POST['btnAdd']))
			require('views/add-catalog.php');
		else{
			$name = $_POST['name'];
			if($name == ''){
				$validateName = 'Fill name';
			}
			if(strlen($name) < 3){
				$validateName = 'Need more 2 characters!';
			}
			$desc = $_POST['desc'];
			$type = $_POST['type'];
			if(isset($validateName)){
				require('views/add-catalog.php');
			}
			else{
				$this->model->add($name, $desc, $type);
				header("Location: ?controller=catalog&action=listCatalog");
			}
		}
	}
	public function edit(){
		$catalog = $this->model->getCatalogById($_GET['id']);
		if(!isset($_POST['btnEdit'])){
			require('views/edit-catalog.php');
		}
		else{
			$name = $_POST['name'];
			if($name == ''){
				$validateName = 'Fill name';
			}
			if(strlen($name) < 3){
				$validateName = 'Need more 2 characters!';
			}
			$desc = $_POST['desc'];
			$type = $_POST['type'];
			if(isset($validateName)){
				require('views/edit-catalog.php');
			}
			else{
				$this->model->edit($_GET['id'], $name, $desc, $type);
				header("Location: ?controller=catalog&action=listCatalog");
			}
		}
	}
}
?>