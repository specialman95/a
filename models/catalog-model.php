<?php
class CATALOG_MODEL {
	private $conn;
	public function __construct(){
		$this->conn = mysqli_connect('localhost','root');
		mysqli_query($this->conn,"USE vidu");
		mysqli_query($this->conn,"SET NAMES 'UTF8'");
		require ('models/catalog.php');
	}
	public function listCatalog(){
		$mySQL = "SELECT * FROM catalog";
		$result = mysqli_query($this->conn,$mySQL);
		$catalogs = [];
		while ($row = mysqli_fetch_array($result)) {
			$catalog_object = new CATALOG();
			$catalog_object->id = $row['id'];
			$catalog_object->name = $row['name'];
			$catalog_object->desc = $row['desc'];
			$catalog_object->type = $row['type'];
			$catalogs[] = $catalog_object;
		}
		return $catalogs;
	}
	public function delete ($id) {
		$mySQL = "DELETE FROM catalog WHERE id={$id}";
		$result = mysqli_query($this->conn,$mySQL) or die(mysqli_error($this->conn));
	}
	public function add ($name, $desc, $type){
        $query = "INSERT INTO catalog
        VALUES ( '',
        		'$name',
                '$desc',
                '$type')";
        $result = mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
        if($result){
            return 1;
        } else
            return 0;
	}
	public function edit ($id, $name, $desc, $type){
        $query = "UPDATE catalog 	SET    	name='$name',
                                            `desc`='$desc',
                                            type='$type'
                                            WHERE id=".$id;
        $result=mysqli_query($this->conn, $query);
        if($result){
            return 1;
        }
        else
            return 0;
	}
	public function getCatalogById($id){
		$sql = "SELECT * FROM catalog WHERE id='".$id."'";
        $query=mysqli_query($this->conn,$sql);
        $data=mysqli_fetch_assoc($query);
        $catalog_object = new CATALOG();
        $catalog_object->id = $data['id'];
		$catalog_object->name = $data['name'];
		$catalog_object->desc = $data['desc'];
		$catalog_object->type = $data['type'];
        return $catalog_object;
	}
} 
?>