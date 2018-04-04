<form method="POST" action="?controller=product&action=add" >
	<p>Name: <input type="text" name="name"> <?php if(isset($validateName)) echo $validateName; ?> </p>
	<p>Desc: <input type="text" name="desc" value='<?php if(isset($desc)) echo $desc; ?>'> </p>
	<p>Price: <input type="text" name="price" value='<?php if(isset($price)) echo $price; ?>'></p>
	<p>Catalog ID: 
		<select name="cate_id">
			<?php
				foreach ($catalogs as $catalog) {
					echo '<option value='.$catalog->id.'>'.$catalog->name.'</option>';
				}
			?>
		</select></p>
	<p><input type="submit" name="btnAdd"></p>
</form>