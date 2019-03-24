<?php
include_once ROOT. '/models/GetModel.php';

class EditDelModel
{

	public static function editBook($id,$name,$audid,$authid,$tagid)
	{
		if($name==null && $audid==null && $authid==null && $tagid==null) return false;
		//----------------------------
		$db = Db::getConnection();
		if($name!=null)		$db->exec("UPDATE `book` SET `name`= '".$name."' WHERE `id`= ".$id); 
		if($audid!=null)	$db->exec("UPDATE `book` SET `auditory_id`= ".$audid." WHERE `id`= ".$id); 
		if($authid!=null) 
		{
			$db->exec("DELETE FROM `book_author` WHERE `book_id`=".$id); 
			foreach($authid as $authid0)
			{
				$db->exec("INSERT INTO `book_author`(`book_id`,`author_id`) VALUES (".$id.",".$authid0.")");
			}
		}
		if($tagid!=null) 
		{
			$db->exec("DELETE FROM `book_tag` WHERE `book_id`=".$id); 
			foreach($tagid as $tagid0)
			{
				$db->exec("INSERT INTO `book_tag`(`book_id`,`tag_id`) VALUES (".$id.",".$tagid0.")");
			}
		}
		return true;
	}
	public static function delBook($id)
	{
		$db = Db::getConnection();
		$db->exec("DELETE FROM `book_author` WHERE `book_id`=".$id); 
		$db->exec("DELETE FROM `book_tag` WHERE `book_id`=".$id); 
		$db->exec("DELETE FROM `book` WHERE `id`=".$id); 
		
		return true;
	}


}