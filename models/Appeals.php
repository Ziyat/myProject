<?php

/**
* 
*/
class Appeals
{
	static public function getDataCuisine()
	{
		
		$db = Db::getConnection();
		$sql = 'SELECT id, title_'.$_SESSION['lang'].' FROM cuisine';
		$result = $db->prepare($sql);
		$result->execute();
		$result= $result->fetchAll();
		return $result;
	}
	static public function getCuisineById($id)
	{
		
		$db = Db::getConnection();
		$sql = "SELECT * FROM cuisine WHERE id = $id";
		$result = $db->prepare($sql);
		$result->execute();
		$result= $result->fetch();
		return $result;
	}
	static public function getCuisineCategoryById($id)
	{
		
		$db = Db::getConnection();
		$sql = 'SELECT id, title_'.$_SESSION['lang'].', desc_'.$_SESSION['lang'].', img FROM category WHERE cuisine_id = '.$id.'';
		$result = $db->prepare($sql);
		$result->execute();
		$result= $result->fetchAll();
		return $result;
	}

	static public function deleteCuisineById($id)
	{
		$db = Db::getConnection();

		$sql = 'DELETE FROM cuisine WHERE id = :id';
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		return $result->execute();
	}

	static public function createCuisine($options)
	{
		$db = Db::getConnection();
		$sql = 'INSERT INTO cuisine (title_ru, title_cn, title_en) VALUES (:title_ru, :title_cn, :title_en)';
		$result = $db->prepare($sql);
		$result->bindParam(':title_ru', $options['title_ru'], PDO::PARAM_STR);
		$result->bindParam(':title_cn', $options['title_cn'], PDO::PARAM_STR);
		$result->bindParam(':title_en', $options['title_en'], PDO::PARAM_STR);

		return $result->execute();
		
	}

	static public function updateAppealById($status, $appealId, $cause, $userId)
	{
		$db = Db::getConnection();
		$empty = '';
		$sql = "UPDATE appeals SET status = :status WHERE id = :id";

		$result = $db->prepare($sql);
		$result->bindParam(':status', $status, PDO::PARAM_STR);
		$result->bindParam(':id', $appealId, PDO::PARAM_INT);
		if ($result->execute()) {
			$sql1 = 'INSERT INTO answers (user_id, appeal_id, text, file, create_at) VALUES (:user_id, :appeal_id, :text, :file, NOW())';
			$result1 = $db->prepare($sql1);
			$result1->bindParam(':user_id', $userId, PDO::PARAM_INT);
			$result1->bindParam(':appeal_id', $appealId, PDO::PARAM_STR);
			$result1->bindParam(':text', $cause, PDO::PARAM_STR);
			$result1->bindParam(':file', $empty, PDO::PARAM_STR);
			// echo "<pre>";
			// print_r($result->execute());
			// die;

			return $result1->execute();
		}else
		{
			return false;
		}
	}

	
}