<?php

include_once ROOT. '/models/GetModel.php';
include_once ROOT. '/models/SaveModel.php';
include_once ROOT. '/models/EditDelModel.php';

class HomeController {
	public static $urih = "http://localhost/libr";
	public function actionLog()
	{
		$title = "Логи";
		$result = GetModel::getLog();
		require_once(ROOT . '/views/template.php');
		require_once(ROOT . '/views/home/log.php');
		return true;
	}

	public function actionBooks()
	{
		$title = "Список книг";
		$result = GetModel::getBooks();
		require_once(ROOT . '/views/template.php');
		require_once(ROOT . '/views/home/books.php');
		return true;	
	}
	
	public function actionBook($id)
	{
		$title = "Книга";
		$book = GetModel::getBook($id[0])[0];
		$bookauth = GetModel::getBookauthors($id[0]);
		$booktag = GetModel::getBooktags($id[0]);
		if(isset($book))
		{
			require_once(ROOT . '/views/template.php');
			require_once(ROOT . '/views/home/bookinfo.php');
			return true;
		}
		else
		{				
			return false;
		}
	}
	
	public function actionAddbook()
	{
		$title = "Добавить книгу";
		$auds = GetModel::getAuditorys();
		$auths = GetModel::getAuthors();
		$tags = GetModel::getTags();
		@$name = $_POST['name'];
		@$audid = $_POST['aud'];
		@$authid = $_POST['authid'];
		@$tagid = $_POST['tagid'];
		@$auth0 = $_POST['auth0'];
		@$tag0 = $_POST['tag0'];
		
		$t = (SaveModel::SaveBook($name,$audid,$authid,$tagid,$auth0,$tag0));
		require_once(ROOT . '/views/template.php');
		require_once(ROOT . '/views/home/addbook.php');
		return true;	
	}
	
	public function actionAddlog()
	{
		$title = "Действие";
		@$id = $_POST['id'];
		@$libcard = $_POST['libcard'];
		@$act = $_POST['act'];
		$books = GetModel::getBooks();
		$t = SaveModel::saveLog($id,$libcard,$act);
		require_once(ROOT . '/views/template.php');
		require_once(ROOT . '/views/home/addlog.php');
		return true;	
	}
	
	public function actionDelbook($id)
	{
		$id = $id[0];
		EditDelModel::delBook($id);
		header("Location: ".HomeController::$urih."/books");
		return true;
	}
	
	public function actionEditbook($id)
	{
		$id = $id[0];
		$title = "Изменить книгу";
		$auds = GetModel::getAuditorys();
		$auths = GetModel::getAuthors();
		$tags = GetModel::getTags();
		@$name = $_POST['name'];
		@$audid = $_POST['aud'];
		@$authid = $_POST['authid'];
		@$tagid = $_POST['tagid'];
		$t = EditDelModel::editBook($id,$name,$audid,$authid,$tagid);
		if($t) header("Location: ".HomeController::$urih."/books/".$id);
		else 
		{
			require_once(ROOT . '/views/template.php');
			require_once(ROOT . '/views/home/editbook.php');
		}
		return true;
	}
}

