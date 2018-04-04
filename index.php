<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	$controller=isset($_GET['controller'])?$_GET['controller']:'';
	if (!empty($controller)) {
		require 'controllers/'.$controller.'-controller.php';
		$controller_name = strtoupper($controller).'_CONTROLLER';
		$new_controller_object = new $controller_name();
		$new_controller_object->run();
		exit();
	}
	?>
	<a href="#">Home</a>
	<a href="?controller=catalog&action=listCatalog">Catalog</a>
	<a href="?controller=product&action=listProduct">Product</a>
</body>
</html>