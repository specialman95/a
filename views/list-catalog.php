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
	<p><a href="?controller=catalog&action=add">Add Catalog</a></p>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th>DESC</th>
			<th>TYPE</th>
		</tr>
			<?php foreach ($listCatalog as $row): ?>
				<tr>
					<td><?=$row->id?></td>
					<td><?=$row->name?></td>
					<td><?=$row->desc?></td>
					<td><?=$row->type?></td>
					<td><a href="?controller=catalog&action=delete&id=<?=$row->id?>">DELETE</a>
					<td><a href="?controller=catalog&action=edit&id=<?=$row->id?>">EDIT</a>
				</tr>
			<?php endforeach ?>	
	</table>
</body>
</html>