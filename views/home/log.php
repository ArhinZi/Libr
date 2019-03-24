<h1 align = "center">Логи</h1>
<a href=<?php echo HomeController::$urih."/log/add"; ?>><center>Действие</center></a><br>
<table align = "center" border = "5" width = "100%">
	<tr>
		<th>id</th>
		<th>book</th>
		<th>lib_card</th>
		<th>time</th>
		<th>act</th>
	</tr>
	<tr align = "center" ><td colspan = "5">o      o      o</td></tr>
	<?php
	foreach($result as $res)
		echo "<tr><td>".$res['id']."</td>"."<td>"."<a href='../index.php/books/".$res['bid']."'>".$res['book']."</a><br>"."</td>"."<td>".$res['num_lib_card']."</td>"."<td>".$res['time']."</td>"."<td>".$res['type']."</tr>";

	?>
</table>
