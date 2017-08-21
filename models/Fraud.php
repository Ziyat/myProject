<?php

/**
* 
*/
class Fraud
{
	const SHOW_BY_DEFAULT = 8;
	
	

	static public function getFraudOrderDesc($page = 1)
	{
		$page = intval($page);
		$offset = ($page - 1) * self::SHOW_BY_DEFAULT;
		$db = Db::getConnection();
		$sql = 'SELECT * FROM fraud WHERE publish = 1 ORDER BY fraud_id DESC LIMIT '. self::SHOW_BY_DEFAULT .' OFFSET '. $offset;
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	static public function getFraudOrderDescAdmin($page = 1)
	{
		$page = intval($page);
		$offset = ($page - 1) * self::SHOW_BY_DEFAULT;
		$db = Db::getConnection();
		$sql = 'SELECT * FROM fraud ORDER BY fraud_id DESC LIMIT '. self::SHOW_BY_DEFAULT .' OFFSET '. $offset;
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	static public function getTotalFraud()
	{
		$db = Db::getConnection();
		$sql = 'SELECT COUNT(fraud_id) AS count FROM fraud';
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetch(PDO::FETCH_ASSOC);
		return $result['count'];
	}

	static public function getFraudById($id)
	{
		
		$db = Db::getConnection();
		$sql = 'SELECT * FROM fraud WHERE fraud_id='.$id;
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	
	static public function deleteFraud($id)
	{
		$db = Db::getConnection();

		$sql = 'DELETE FROM fraud WHERE fraud_id = :id';
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		unlink($_SERVER['DOCUMENT_ROOT'].'/upload/images/fraud/'.$id.'.jpg');
		return $result->execute();
	}

	static public function createFraud($data)
	{
		$db = Db::getConnection();
		$sql = 'INSERT INTO fraud (name, desc_ru, desc_uz, birth_day, create_at, publish) VALUES (:name, :desc_ru, :desc_uz, :birth_day, NOW(), :publish)';
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

	static public function updateFraud($data)
	{
		// echo "<pre>";
		// print_r($data);
		// die;
		$db = Db::getConnection();
		$sql = "UPDATE fraud SET
		name = :name,
		desc_ru = :desc_ru,
		desc_uz = :desc_uz,
		birth_day = :birth_day,
		create_at = NOW(),
		publish = :publish 
		WHERE fraud_id = :fraud_id";

		$result = $db->prepare($sql);
		$result->bindParam(':name', $data['name'], PDO::PARAM_STR);
		$result->bindParam(':desc_ru', $data['desc_ru'], PDO::PARAM_STR);
		$result->bindParam(':desc_uz', $data['desc_uz'], PDO::PARAM_STR);
		$result->bindParam(':birth_day', $data['birth_day'], PDO::PARAM_STR);
		$result->bindParam(':publish', $data['publish'], PDO::PARAM_STR);
		$result->bindParam(':fraud_id', $data['fraud_id'], PDO::PARAM_INT);

		return $result->execute();
	}

	static public function searchFraud($text){
		
		$db = Db::getConnection();
		$sql = "SELECT * FROM fraud WHERE name LIKE '%".$text."%'";
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