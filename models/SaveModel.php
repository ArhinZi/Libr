<?php
include_once ROOT. '/models/GetModel.php';

class SaveModel
{

	public static function saveLog($id,$libcard,$act)
	{
		if($id==null && $libcard==null && $act==null) return "";
		
		if($id==null || $libcard==null || $act==null) return "Введите все данные";
		$db = Db::getConnection();
		//----------------------------------
		if($act == '+')$acttype=2;
		if($act == '-')$acttype=1;
		$date = date("Y-m-d H:i:s");
		$avil = GetModel::getBook($id)[0]['Availability'];
		//----------------------------------
		$result = $db->query("SELECT * FROM log ORDER BY id DESC LIMIT 1");
		//print_r($db->errorInfo());
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$logList = $result->fetchAll();
		//print_r($logList);
		//print_r($logList);
		//if($logList[0]['book_id'] == $id && $logList[0]['log_type_id'] == $acttype)return "";
		//----------------------------------
		if($act == '-')
		{
			if($avil == 0) return "Книги нет в наличии";
			$db->exec("INSERT INTO `log`(`book_id`, `num_lib_card`, `time`, `log_type_id`) VALUES (".$id.",".$libcard.",'".$date."', 1)");
			$db->exec("UPDATE `book` SET `Availability`=0 WHERE `id`=".$id);
			
		}
		//----------------------------------		
		if($act == '+')
		{
			if($avil == 1) return "Как можно вернуть то, что и так на месте???";
			$db->exec("INSERT INTO `log`(`book_id`, `num_lib_card`, `time`, `log_type_id`) VALUES (".$id.",".$libcard.",'".$date."', 2)");
			$db->exec("UPDATE `book` SET `Availability`=1 WHERE `id`=".$id);
		}
		
		return "Выполнено!";
	}
	
	public static function saveAuditory($num)
	{
		$db = Db::getConnection();
		$db->exec("INSERT INTO `auditory`(`num`) VALUES ('".$num."')"); 
		return ($db->lastInsertid());
	}
	
	public static function saveAuthor($name)
	{
		$db = Db::getConnection();
		$db->exec("INSERT INTO `author`(`name`) VALUES ('".$name."')"); 
		return ($db->lastInsertid());
	}
	
	public static function saveTag($name)
	{
		$db = Db::getConnection();
		$db->exec("INSERT INTO `tag`(`tag`) VALUES ('".$name."')"); 
		return ($db->lastInsertid());
	}
	
	public static function saveBook($name,$audid,$authid,$tagid,$auth0,$tag0)
	{
		if($name==null && $audid==0) return "";
		if($name==null || $audid==0) return "Введите все данные";
		//----------------------------
		$db = Db::getConnection();
		$db->exec("INSERT INTO `book`(`name`,`auditory_id`,`availability`) VALUES ('".$name."',".$audid.",1)"); 
		$id = $db->lastInsertid();
		if($authid!=array() || $auth0!=null) 
		{
			$auth = explode(',', $auth0);
			if($authid!=array()) $authid=array();
			foreach($auth as $authi)
			{
				$authid[]=SaveModel::saveAuthor($authi);
			}
			foreach($authid as $authid0)
			{
				$db->exec("INSERT INTO `book_author`(`book_id`,`author_id`) VALUES (".$id.",".$authid0.")");
			}
		}
		if($tagid!=array() || $tag0!=null)
		{
			$tag = explode(',', $tag0);
			if($tagid!=array()) $tagid=array();
			foreach($tag as $tagi)
			{
				$tagid[]=SaveModel::saveTag($tagi);
			}
			foreach($tagid as $tagid0)
			{
				$db->exec("INSERT INTO `book_tag`(`book_id`,`tag_id`) VALUES (".$id.",".$tagid0.")");
			}
		}
		return "Успешно добавлена в Базу";
	}
}