<?php
class PRODUCT_MODEL {
	private $conn;
	public function __construct(){
		$this->conn = mysqli_connect('localhost','root');
		mysqli_query($this->conn,"USE vidu");
		mysqli_query($this->conn,"SET NAMES 'UTF8'");
		require ('models/product.php');
	}
	public function listProduct(){
		$mySQL = "SELECT product.*, catalog.name AS cate_name FROM product JOIN catalog ON (product.cate_id = catalog.id)";
		$result = mysqli_query($this->conn,$mySQL);
		$products = [];
		while ($row = mysqli_fetch_array($result)) {
			$product_object = new PRODUCT();
			$product_object->id = $row['id'];
			$product_object->name = $row['name'];
			$product_object->desc = $row['desc'];
			$product_object->price = $row['price'];
			$product_object->cate_id = $row['cate_id'];
			$product_object->cate_name = $row['cate_name'];
			$products[] = $product_object;
		}
		return $products;
	}
	public function delete ($id) {
		$mySQL = "DELETE FROM product WHERE id={$id}";
		$result = mysqli_query($this->conn,$mySQL) or die(mysqli_error($this->conn));
	}
	public function add ($name, $desc, $price, $cate_id){
        $query = "INSERT INTO product
        VALUES ( '',
        		'$name',
                '$desc',
                '$price',
            	'$cate_id')";
        $result = mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
        if($result){
            return 1;
        } else
            return 0;
	}
	public function edit ($id, $name, $desc, $price, $cate_id){
        $query = "UPDATE product 	SET    	name='$name',
                                            `desc`='$desc',
                                            price='$price',
                                            cate_id='$cate_id'
                                            WHERE id=".$id;
        $result=mysqli_query($this->conn, $query);
        if($result){
            return 1;
        }
        else
            return 0;
	}
	public function getProductById($id){
		$sql = "SELECT * FROM product WHERE id='".$id."'";
        $query=mysqli_query($this->conn,$sql);
        $data=mysqli_fetch_assoc($query);
        $product_object = new CATALOG();
        $product_object->id = $data['id'];
		$product_object->name = $data['name'];
		$product_object->desc = $data['desc'];
		$product_object->price = $data['price'];
		$product_object->cate_id = $data['cate_id'];
        return $product_object;
	}
} 
?>