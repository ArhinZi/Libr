<h2 align = "center"><?php echo $book['bname']?>(<?php echo $book['bid']?>)</h2>
<a align = "center" href=<?php echo HomeController::$urih."/books/edit/".$book['bid']; 	?>>Изменить</a>
<a align = "center" href=<?php echo HomeController::$urih."/books/del/".$book['bid']; 	?>>Удалить</a><br>

<h3 align = "left">Наличие:<?php echo $book['Availability']==0? 'нет':'есть'?></h3>
<h3 align = "left">Номер аудитории:<?php echo $book['num']?></h3>
<h3 align = "left">Кафедра:<?php echo $book['cname']?></h3>
<h3 align = "left">Автор(ы):
<?php
foreach($bookauth as $aut)
	echo $aut['name'].'; ';
?>
</h3>
<h3 align = "left">Теги:
<?php
foreach($booktag as $tag)
	echo $tag['tag'].'; ';
?>
</h3>
