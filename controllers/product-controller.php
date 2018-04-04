<?php
class PRODUCT_CONTROLLER {
	private $model;
	public function __construct(){
		require ('Models/product-model.php');
		require ('Models/catalog-model.php');
		$this->model = new PRODUCT_MODEL();
		$this->catalogModel = new CATALOG_MODEL();

	}
	public function run(){
		$action = isset($_GET['action'])?$_GET['action']:'';
		switch ($action) {
			case 'listProduct':
				$this->listProduct();
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
	public function listProduct(){
		$listProduct=$this->model->listProduct();
		require('views/list-product.php');
	}
	public function delete(){
		$productID = isset($_GET['id'])?$_GET['id']:'';
		if(empty($productID)){
			die('ID does not exist');
		}
		$catalog = $this->model->delete($productID);
		header("Location: ?controller=product&action=listProduct");
	}
	public function add(){
		$catalogs = $this->catalogModel->listCatalog();
		if(!isset($_POST['btnAdd']))
			require('views/add-product.php');
		else{
			$name = $_POST['name'];
			if($name == ''){
				$validateName = 'Fill name';
			}
			if(strlen($name) < 3){
				$validateName = 'Need more 2 characters!';
			}
			$desc = $_POST['desc'];
			$price = $_POST['price'];
			$cate_id = $_POST['cate_id'];
			if(isset($validateName)){
				require('views/add-product.php');
			}
			else{
				$this->model->add($name, $desc, $price, $cate_id);
				header("Location: ?controller=product&action=listProduct");
			}
		}
	}
	public function edit(){
		$catalogs = $this->catalogModel->listCatalog();
		$product = $this->model->getProductById($_GET['id']);
		if(!isset($_POST['btnEdit'])){
			require('views/edit-product.php');
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
			$price = $_POST['price'];
			$cate_id = $_POST['cate_id'];
			if(isset($validateName)){
				require('views/edit-product.php');
			}
			else{
				$this->model->edit($_GET['id'], $name, $desc, $price, $cate_id);
				header("Location: ?controller=product&action=listProduct");
			}
		}
	}
}
?>