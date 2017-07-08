<?php

/**
* 
*/
class People
{
	const SHOW_BY_DEFAULT = 8;
	
	

	static public function getPeopleOrderDesc($page = 1)
	{
		$page = intval($page);
		$offset = ($page - 1) * self::SHOW_BY_DEFAULT;
		$db = Db::getConnection();
		$sql = 'SELECT * FROM people WHERE publish = 1 ORDER BY people_id DESC LIMIT '. self::SHOW_BY_DEFAULT .' OFFSET '. $offset;
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	static public function getPeopleOrderDescAdmin($page = 1)
	{
		$page = intval($page);
		$offset = ($page - 1) * self::SHOW_BY_DEFAULT;
		$db = Db::getConnection();
		$sql = 'SELECT * FROM people ORDER BY people_id DESC LIMIT '. self::SHOW_BY_DEFAULT .' OFFSET '. $offset;
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	static public function getTotalPeople()
	{
		$db = Db::getConnection();
		$sql = 'SELECT COUNT(people_id) AS count FROM people';
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetch(PDO::FETCH_ASSOC);
		return $result['count'];
	}

	static public function getPeopleById($id)
	{
		
		$db = Db::getConnection();
		$sql = 'SELECT * FROM people WHERE people_id='.$id;
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	
	static public function deletePeople($id)
	{
		$db = Db::getConnection();

		$sql = 'DELETE FROM people WHERE people_id = :id';
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		unlink($_SERVER['DOCUMENT_ROOT'].'/upload/images/people/'.$id.'.jpg');
		return $result->execute();
	}

	static public function createPeople($data)
	{
		$db = Db::getConnection();
		$sql = 'INSERT INTO people (name, birth_day, create_at, publish) VALUES (:name, :birth_day, NOW(), :publish)';
		$result = $db->prepare($sql);
		$result->bindParam(':name', $data['name'], PDO::PARAM_STR);
		$result->bindParam(':birth_day', $data['birth_day'], PDO::PARAM_STR);
		$result->bindParam(':publish', $data['publish'], PDO::PARAM_INT);
		if($result->execute())
		{
			return $db->lastInsertId();
		}

		return false;
	}

	static public function updatePeople($data)
	{
		// echo "<pre>";
		// print_r($data);
		// die;
		$db = Db::getConnection();
		$sql = "UPDATE people SET
		name = :name,
		birth_day = :birth_day,
		create_at = NOW(),
		publish = :publish 
		WHERE people_id = :people_id";

		$result = $db->prepare($sql);
		$result->bindParam(':name', $data['name'], PDO::PARAM_STR);
		$result->bindParam(':birth_day', $data['birth_day'], PDO::PARAM_STR);
		$result->bindParam(':publish', $data['publish'], PDO::PARAM_STR);
		$result->bindParam(':people_id', $data['people_id'], PDO::PARAM_INT);

		return $result->execute();
	}

	static public function searchPeople($text){
		
		$db = Db::getConnection();
		$sql = "SELECT * FROM people WHERE name LIKE '%".$text."%'";
		$result = $db->prepare($sql);
		$result->bindParam(':text', $text, PDO::PARAM_STR);
		$result->execute();
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		// echo "<pre>";
		// print_r ($result);
		// die;
		
		return $result;
		
	}

	
}