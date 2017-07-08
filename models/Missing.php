<?php

/**
* 
*/
class Missing
{
	const SHOW_BY_DEFAULT = 8;
	
	

	static public function getMissingOrderDesc($page = 1)
	{
		$page = intval($page);
		$offset = ($page - 1) * self::SHOW_BY_DEFAULT;
		$db = Db::getConnection();
		$sql = 'SELECT * FROM missing WHERE publish = 1 ORDER BY missing_id DESC LIMIT '. self::SHOW_BY_DEFAULT .' OFFSET '. $offset;
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	static public function getMissingOrderDescAdmin($page = 1)
	{
		$page = intval($page);
		$offset = ($page - 1) * self::SHOW_BY_DEFAULT;
		$db = Db::getConnection();
		$sql = 'SELECT * FROM missing ORDER BY missing_id DESC LIMIT '. self::SHOW_BY_DEFAULT .' OFFSET '. $offset;
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	static public function getTotalMissing()
	{
		$db = Db::getConnection();
		$sql = 'SELECT COUNT(missing_id) AS count FROM missing';
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetch(PDO::FETCH_ASSOC);
		return $result['count'];
	}

	static public function getMissingById($id)
	{
		
		$db = Db::getConnection();
		$sql = 'SELECT * FROM missing WHERE missing_id='.$id;
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	
	static public function deleteMissing($id)
	{
		$db = Db::getConnection();

		$sql = 'DELETE FROM missing WHERE missing_id = :id';
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		unlink($_SERVER['DOCUMENT_ROOT'].'/upload/images/missing/'.$id.'.jpg');
		return $result->execute();
	}

	static public function createMissing($data)
	{
		$db = Db::getConnection();
		$sql = 'INSERT INTO missing (name, birth_day, create_at, publish) VALUES (:name, :birth_day, NOW(), :publish)';
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

	static public function updateMissing($data)
	{
		// echo "<pre>";
		// print_r($data);
		// die;
		$db = Db::getConnection();
		$sql = "UPDATE missing SET
		name = :name,
		birth_day = :birth_day,
		create_at = NOW(),
		publish = :publish 
		WHERE missing_id = :missing_id";

		$result = $db->prepare($sql);
		$result->bindParam(':name', $data['name'], PDO::PARAM_STR);
		$result->bindParam(':birth_day', $data['birth_day'], PDO::PARAM_STR);
		$result->bindParam(':publish', $data['publish'], PDO::PARAM_STR);
		$result->bindParam(':missing_id', $data['missing_id'], PDO::PARAM_INT);

		return $result->execute();
	}

	static public function searchMissing($text){
		
		$db = Db::getConnection();
		$sql = "SELECT * FROM missing WHERE name LIKE '%".$text."%'";
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