<?php
class CATALOG {
	private $data;	
	public function __set($fieldname,$value) {
		$this->data[$fieldname] = $value;
	}
	public function __get($fieldname) {
		return $this->data[$fieldname];		
	}
}
?>