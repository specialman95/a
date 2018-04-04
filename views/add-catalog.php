<form method="POST" action="?controller=catalog&action=add" >
	<p>Name: <input type="text" name="name"> <?php if(isset($validateName)) echo $validateName; ?> </p>
	<p>Desc: <input type="text" name="desc" value='<?php if(isset($desc)) echo $desc; ?>'> </p>
	<p>Type: <input type="text" name="type" value='<?php if(isset($type)) echo $type; ?>'></p>
	<p><input type="submit" name="btnAdd"></p>
</form>