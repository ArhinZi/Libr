<h1 align = "center">Добавить книгу</h1>
<h2><?php echo $t;?></h2>
<form action="" method="post">
	<p>
		<label>Название:<br></label>
		<input name="name" type="text" size="100" maxlength="50">
	</p>
	<p>
		<label>Номер аудитории:<br></label>
		<select size="10" name="aud">
			<option disabled>Аудитория</option>
			<?php
			foreach ($auds as $aud)
				echo "<option value=".$aud['id'].">".$aud['num']."</option>";
			?>
		</select>
	</p>
	<p>
		<label>Авторы:<br></label>
		<select size="10" multiple name="authid[]">
			<option disabled>Авторы</option>
			<?php
			foreach ($auths as $auth)
				echo "<option value=".$auth['id'].">".$auth['name']."</option>";
			?>
		</select><br>
		<input name="auth0" type="text" size="100" maxlength="50">
	</p>
	<p>
		<label>Теги:<br></label>
		<select size="10" multiple name="tagid[]">
			<option disabled>Теги</option>
			<?php
			foreach ($tags as $tag)
				echo "<option value=".$tag['id'].">".$tag['tag']."</option>";
			?>
		</select><br>
		<input name="tag0" type="text" size="100" maxlength="50">
	</p>
	<p>
		<input type="submit" name="submit" value="Добавить">
	</p>
</form>