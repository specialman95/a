<form method="POST" action="?controller=catalog&action=edit&id=<?php echo $catalog->id; ?>" >
	<p>Id: <?php echo $catalog->id; ?></p>
	<p>Name: 
		<input type="text" name="name" value='<?php echo $catalog->name; ?>'/> 
		<?php if(isset($validateName)) echo $validateName; ?>
	</p>
	<p>Desc: <input type="text" name="desc" value='<?php echo $catalog->desc; ?>'/></p>
	<p>Type: <input type="text" name="type" value='<?php echo $catalog->type; ?>'"/></p>
	<p><input type="submit" name="btnEdit"></p>
</form>