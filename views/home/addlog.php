<h1 align = "center">Действие</h1>
<h2><?php echo $t; ?></h2>
<form action="" method="post">
	<p>
		<select size="10" name="id">
			<option disabled>Выберите книгу</option>
			<?php
			foreach ($books as $book)
				echo "<option value=".$book['id'].">".$book['name']."</option>";
			?>
		</select>
	</p>
	<p>
		<label>LibCard:<br></label>
		<input name="libcard" type="text" size="30" maxlength="10">
	</p>
	<p>
		<label>Действие:<br></label>
		<select name="act">
			<option value="-">Взять</option>
			<option value="+">Вернуть</option>
		</select>
	</p>
	<p>
		<input type="submit" name="submit" value="Добавить">
	</p>
</form>
