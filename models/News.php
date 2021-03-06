<?php

/**
* 
*/
class News
{
	const SHOW_BY_DEFAULT = 8;
	
	static public function titleReplace($string){
		$string = strip_tags($string);
		if(strlen($string) > 100 )
		{
        	$string = substr($string, 0, 100);
		}
        $string = rtrim($string, "!,.-");
        $string = substr($string, 0, strrpos($string, ' '));
        return $string."… ";
	}
	static public function descReplace($string){
		$string = strip_tags($string);
		if(strlen($string) > 200 )
		{
        	$string = substr($string, 0, 200);
		}
        $string = rtrim($string, "!,.-");
        $string = substr($string, 0, strrpos($string, ' '));
        return $string."… ";
	}

	static public function getImage($id)
	{
		$noImage = 'no-image.jpg';

		$path = '/upload/images/news/';

		$pathToProductImage = $path . $id . '.jpg';

		if(file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage))
		{
			return $pathToProductImage;
		}

		return $path . $noImage;
	}

	static public function getNewsOrderDesc($page = 1)
	{
		$page = intval($page);
		$offset = ($page - 1) * self::SHOW_BY_DEFAULT;
		$db = Db::getConnection();
		$sql = 'SELECT * FROM news WHERE publish = 1 ORDER BY id DESC LIMIT '. self::SHOW_BY_DEFAULT .' OFFSET '. $offset;
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	static public function getNewsOrderDescAdmin($page = 1)
	{
		$page = intval($page);
		$offset = ($page - 1) * self::SHOW_BY_DEFAULT;
		$db = Db::getConnection();
		$sql = 'SELECT * FROM news ORDER BY id DESC LIMIT '. self::SHOW_BY_DEFAULT .' OFFSET '. $offset;
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	static public function getTotalNews()
	{
		$db = Db::getConnection();
		$sql = 'SELECT COUNT(id) AS count FROM news';
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetch(PDO::FETCH_ASSOC);
		return $result['count'];
	}

	static public function getNewsById($id)
	{
		
		$db = Db::getConnection();
		$sql = 'SELECT * FROM news WHERE id = :id';
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		$result->execute();
		$result = $result->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	static public function getProductsByIds($idsArray)
	{
		$products = array();
		$db = Db::getConnection();
		$idsString = implode(',', $idsArray);
		$sql = "SELECT * FROM product WHERE delivery='1' AND id IN ($idsString)";
		$result = $db->query($sql);
		$result->setFetchMode(PDO::FETCH_ASSOC);

		$i = 0;
		while($row = $result->fetch()){
			$products[$i]['id'] = $row['id'];
			$products[$i]['title'] = $row['title_'.$_SESSION['lang']];
			$products[$i]['price'] = $row['delivery_price'];
			$products[$i]['img'] = $row['img'];
			$i++;
		}
		return $products;
	}
	static public function getProductList()
	{
		$db = Db::getConnection();

		$result = $db->query('SELECT * FROM product ORDER BY id DESC');
		$productsList = array();
		$i = 0;
		while($row = $result->fetch()){
			
			$cat = self::getCategoryById($row['category_id']);
			$cuisine = Cuisine::getCuisineById($cat['cuisine_id']);
			$productsList[$i]['id'] = $row['id'];
			$productsList[$i]['title'] = $row['title_'.$_SESSION['lang']];
			$productsList[$i]['price'] = $row['price'];
			$productsList[$i]['delivery_price'] = $row['delivery_price'];
			$productsList[$i]['category_id'] = $row['category_id'];
			$productsList[$i]['category'] = $cat['title_'.$_SESSION['lang']] .' ('.$cuisine['title_'.$_SESSION['lang']].')';
			$productsList[$i]['delivery'] = $row['delivery'];
			$productsList[$i]['new'] = $row['new'];
			$productsList[$i]['rec'] = $row['recommended'];

			$i++;
		}
		return $productsList;
	}

	static public function deleteNews($id)
	{
		$db = Db::getConnection();

		$sql = 'DELETE FROM news WHERE id = :id';
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		unlink($_SERVER['DOCUMENT_ROOT'].'/upload/images/news/'.$id.'.jpg');
		return $result->execute();
	}

	static public function createNews($data)
	{
		$db = Db::getConnection();
		$sql = 'INSERT INTO news (title_ru, title_uz, desc_ru, desc_uz, text_ru, text_uz, create_at, publish_at, publish) '
		.'VALUES (:title_ru, :title_uz, :desc_ru, :desc_uz, :text_ru, :text_uz, NOW(), NOW(), :publish)';
		$result = $db->prepare($sql);
		$result->bindParam(':title_ru', $data['title_ru'], PDO::PARAM_STR);
		$result->bindParam(':title_uz', $data['title_uz'], PDO::PARAM_STR);
		$result->bindParam(':desc_ru', $data['desc_ru'], PDO::PARAM_STR);
		$result->bindParam(':desc_uz', $data['desc_uz'], PDO::PARAM_STR);
		$result->bindParam(':text_ru', $data['text_ru'], PDO::PARAM_STR);
		$result->bindParam(':text_uz', $data['text_uz'], PDO::PARAM_STR);
		$result->bindParam(':publish', $data['publish'], PDO::PARAM_INT);
		if($result->execute())
		{
			return $db->lastInsertId();
		}

		return false;
	}

	static public function updateNews($data)
	{
		// echo "<pre>";
		// print_r($data);
		// die;
		$db = Db::getConnection();
		$sql = "UPDATE news SET
		title_ru = :title_ru,
		title_uz = :title_uz,
		desc_ru = :desc_ru,
		desc_uz = :desc_uz,
		text_ru = :text_ru,
		text_uz = :text_uz,
		publish = :publish 
		WHERE id = :id";

		$result = $db->prepare($sql);
		$result->bindParam(':title_ru', $data['title_ru'], PDO::PARAM_STR);
		$result->bindParam(':title_uz', $data['title_uz'], PDO::PARAM_STR);
		$result->bindParam(':desc_ru', $data['desc_ru'], PDO::PARAM_STR);
		$result->bindParam(':desc_uz', $data['desc_uz'], PDO::PARAM_STR);
		$result->bindParam(':text_ru', $data['text_ru'], PDO::PARAM_STR);
		$result->bindParam(':text_uz', $data['text_uz'], PDO::PARAM_STR);
		$result->bindParam(':publish', $data['publish'], PDO::PARAM_INT);
		$result->bindParam(':id', $data['id'], PDO::PARAM_INT);

		return $result->execute();
	}

	
}