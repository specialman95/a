<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LIST CATALOG</title>
	<style>
		th,td{
			padding: 5px;
		}
		a{
			text-decoration: none;
		}
	</style>
</head>
<body>
	<p><a href="?controller=product&action=add">Add Product</a></p>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th>DESC</th>
			<th>PRICE</th>
			<th>CATE NAME</th>
		</tr>
			<?php foreach ($listProduct as $row): ?>
				<tr>
					<td><?=$row->id?></td>
					<td><?=$row->name?></td>
					<td><?=$row->desc?></td>
					<td><?=$row->price?></td>
					<td><?=$row->cate_name?></td>
					<td><a href="?controller=product&action=delete&id=<?=$row->id?>">DELETE</a>
					<td><a href="?controller=product&action=edit&id=<?=$row->id?>">EDIT</a>
				</tr>
			<?php endforeach ?>	
	</table>
</body>
</html>