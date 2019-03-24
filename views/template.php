<html>
	<head>
		<meta charset="UTF-8" />
		<title><?php echo $title; ?></title>
		<style type="text/css">
   .layout {
    width: 100%; /* Ширина всей таблицы */
   }
   TD {
    vertical-align: top; /* Вертикальное выравнивание в ячейках */
    padding: 5px; /* Поля вокруг ячеек */
   }
   TD.leftcol {
    width: 150px; /* Ширина левой колонки */
    
    border-right: 1px dashed #000; /* Параметры линии */
   }
   TD.rightcol {

   }
  </style>
	</head>
	<body>

	
	<table cellspacing="0" class="layout">
	<tr> 
	
	
		<td class="leftcol">
			<a href=<?php echo HomeController::$urih."/log"; 		?>>Логи</a><br>
			<a href=<?php echo HomeController::$urih."/books"; 		?>>Список книг</a><br>	
		</td>
		<td class="rightcol">