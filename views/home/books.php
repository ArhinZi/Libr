<h1 align = "center">Список книг</h1>
<a href=<?php echo HomeController::$urih."/books/add"; ?>><center>Добавить книгу</center></a><br>
<table align = "center" border = "5" width = "100%">
	<tr>
		<th>id</th>
		<th>book</th>
	</tr>
	<?php
	foreach($result as $res)
		echo "<tr><td>".$res['id']."</td>"."<td>"."<a href=".HomeController::$urih."/books/".$res['id'].">".$res['name']."</a>"."</td></tr>";
	?>
</table>
