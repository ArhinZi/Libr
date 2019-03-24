<?php


class GetModel
{

	public static function getLog()
	{
		$db = Db::getConnection();
		$result = $db->query(
								'select *
									from(
										select `log`.`id`, `book`.`name` as `book`, `book`.`id` as `bid`, `log`.`num_lib_card`, `log`.`time`, `log_type`.`type` 
											from `log` join `log_type` on `log_type`.`id` = `log`.`log_type_id` join `book` on `book`.`id` = `log`.`book_id` 
											order by id desc 
											limit 20
										) AS T 
								order by id'
						    );
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$List = $result->fetchAll();
		return $List;
	}

	public static function getBooks()
	{
		$db = Db::getConnection();
		$result = $db->query(
								'SELECT book.id, book.name FROM `book` ORDER BY id'
						    );
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$List = $result->fetchAll();
		return $List;
	}
	
	public static function getBook($id)
	{
		$db = Db::getConnection();
		$result = $db->query(
								"SELECT DISTINCT book.id as bid, book.name as bname, Auditory.num , Cathedra.name as cname, book.Availability 
									FROM book join Auditory on book.auditory_id=Auditory.id join Cathedra on cathedra.id=Auditory.cathedra_id 
									WHERE `book`.`id` = ".$id
						    );
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$List = $result->fetchAll();
		return $List;
	}
	
	public static function getBookauthors($id)
	{
		$db = Db::getConnection();
		$result = $db->query(
								"Select distinct author.name
									from book join book_author on book.id = book_author.book_id join author on book_author.author_id = author.id
									WHERE `book`.`id` = ".$id
						    );
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$List = $result->fetchAll();
		return $List;
	}
	
	public static function getBooktags($id)
	{
		$db = Db::getConnection();
		$result = $db->query(
								"Select DISTINCT tag.tag
									from book join book_tag on book.id = book_tag.book_id join tag on book_tag.tag_id = tag.id 
									WHERE `book`.`id` = ".$id
						    );
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$List = $result->fetchAll();
		return $List;
	}
	
	public static function getTagId($tag)
	{
		$db = Db::getConnection();
		$result = $db->query(
								"Select id
									from tag 
									WHERE `tag` = '".$tag."'"
						    );
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$List = $result->fetchAll();
		return $List;
	}
	
	public static function getCathedraId($name)
	{
		$db = Db::getConnection();
		$result = $db->query(
								"Select id
									FROM cathedra 
									WHERE name = '".$name."'"
						    );
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$List = $result->fetchAll();
		return $List;
	}
	
	public static function getAuditoryId($num)
	{
		$db = Db::getConnection();
		$result = $db->query(
								'SELECT `id` FROM `auditory` WHERE num = '.$num
						    );
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$List = $result->fetchAll();
		return $List;
	}
	
	public static function getAuthorId($name)
	{
		$db = Db::getConnection();
		$result = $db->query(
								"Select id
									FROM author 
									WHERE name = '".$name."'"
						    );
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$List = $result->fetchAll();
		return $List;
	}
	public static function getAuditorys()
	{
		$db = Db::getConnection();
		$result = $db->query(
								"Select *
									FROM `auditory`"
						    );
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$List = $result->fetchAll();
		return $List;
	}
	
	public static function getAuthors()
	{
		$db = Db::getConnection();
		$result = $db->query(
								"Select *
									FROM `author`
									order by id"
						    );
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$List = $result->fetchAll();
		return $List;
	}
	public static function getTags()
	{
		$db = Db::getConnection();
		$result = $db->query(
								"Select *
									FROM `tag`"
						    );
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$List = $result->fetchAll();
		return $List;
	}
	

}