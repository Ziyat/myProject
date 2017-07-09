<?php

/**
* 
*/
class Alimony
{
	const SHOW_BY_DEFAULT = 8;
	
	

	static public function getAlimonyOrderDesc($page = 1)
	{
		$page = intval($page);
		$offset = ($page - 1) * self::SHOW_BY_DEFAULT;
		$db = Db::getConnection();
		$sql = 'SELECT * FROM alimony WHERE publish = 1 ORDER BY alimony_id DESC LIMIT '. self::SHOW_BY_DEFAULT .' OFFSET '. $offset;
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	static public function getAlimonyOrderDescAdmin($page = 1)
	{
		$page = intval($page);
		$offset = ($page - 1) * self::SHOW_BY_DEFAULT;
		$db = Db::getConnection();
		$sql = 'SELECT * FROM alimony ORDER BY alimony_id DESC LIMIT '. self::SHOW_BY_DEFAULT .' OFFSET '. $offset;
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	static public function getTotalAlimony()
	{
		$db = Db::getConnection();
		$sql = 'SELECT COUNT(alimony_id) AS count FROM alimony';
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetch(PDO::FETCH_ASSOC);
		return $result['count'];
	}

	static public function getAlimonyById($id)
	{
		
		$db = Db::getConnection();
		$sql = 'SELECT * FROM alimony WHERE alimony_id='.$id;
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	
	static public function deleteAlimony($id)
	{
		$db = Db::getConnection();

		$sql = 'DELETE FROM alimony WHERE alimony_id = :id';
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		unlink($_SERVER['DOCUMENT_ROOT'].'/upload/images/alimony/'.$id.'.jpg');
		return $result->execute();
	}

	static public function createAlimony($data)
	{
		$db = Db::getConnection();
		$sql = 'INSERT INTO alimony (name, desc_ru, desc_uz, birth_day, create_at, publish) VALUES (:name, :desc_ru, :desc_uz, :birth_day, NOW(), :publish)';
		$result = $db->prepare($sql);
		$result->bindParam(':name', $data['name'], PDO::PARAM_STR);
		$result->bindParam(':desc_ru', $data['desc_ru'], PDO::PARAM_STR);
		$result->bindParam(':desc_uz', $data['desc_uz'], PDO::PARAM_STR);
		$result->bindParam(':birth_day', $data['birth_day'], PDO::PARAM_STR);
		$result->bindParam(':publish', $data['publish'], PDO::PARAM_INT);
		if($result->execute())
		{
			return $db->lastInsertId();
		}

		return false;
	}

	static public function updateAlimony($data)
	{
		// echo "<pre>";
		// print_r($data);
		// die;
		$db = Db::getConnection();
		$sql = "UPDATE alimony SET
		name = :name,
		desc_ru = :desc_ru,
		desc_uz = :desc_uz,
		birth_day = :birth_day,
		create_at = NOW(),
		publish = :publish 
		WHERE alimony_id = :alimony_id";

		$result = $db->prepare($sql);
		$result->bindParam(':name', $data['name'], PDO::PARAM_STR);
		$result->bindParam(':desc_ru', $data['desc_ru'], PDO::PARAM_STR);
		$result->bindParam(':desc_uz', $data['desc_uz'], PDO::PARAM_STR);
		$result->bindParam(':birth_day', $data['birth_day'], PDO::PARAM_STR);
		$result->bindParam(':publish', $data['publish'], PDO::PARAM_STR);
		$result->bindParam(':alimony_id', $data['alimony_id'], PDO::PARAM_INT);

		return $result->execute();
	}

	static public function searchAlimony($text){
		
		$db = Db::getConnection();
		$sql = "SELECT * FROM alimony WHERE name LIKE '%".$text."%'";
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