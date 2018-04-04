<form method="POST" action="?controller=product&action=edit&id=<?php echo $product->id; ?>" >
	<p>Id: <?php echo $product->id; ?></p>
	<p>Name: 
		<input type="text" name="name" value='<?php echo $product->name; ?>'/> 
		<?php if(isset($validateName)) echo $validateName; ?>
	</p>
	<p>Desc: <input type="text" name="desc" value='<?php echo $product->desc; ?>'/></p>
	<p>Price: <input type="text" name="price" value='<?php echo $product->price; ?>'"/></p>
	<p>Catalog ID: 
		<select name="cate_id">
			<?php
				foreach ($catalogs as $catalog) {
					if($product->cate_id == $catalog->id)
						echo '<option value='.$catalog->id.' selected>'.$catalog->name.'</option>';
					else
						echo '<option value='.$catalog->id.'>'.$catalog->name.'</option>';
				}
			?>
		</select></p>
	<p><input type="submit" name="btnEdit"></p>
</form>