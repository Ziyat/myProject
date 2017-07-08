<?php

/**
* 
*/
class Home
{
	static public function randomPassword() {
	    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 8; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass); //turn the array into a string
	}

	static public function statusReplace($status) {
		switch ($status) {
			case 0:
				return 'Новый';
			case 1:
				return 'В обработке';
			case 2:
				return 'Обработано';
			case 3:
				return 'Отклонено';
		}
	}
	static public function typeAppealReplace($type_appeal) {
		switch ($type_appeal) {
			case 'proposal':
				return PROPOSAL;
			case 'appeal':
				return APPEAL;
			case 'declaration':
				return DECLARATION;
			default:
				return '';
		}
	}
	static public function replaceDate($date) {
		$date = explode(' ',$date);
		$date = array_shift($date);
		$date = explode('-', $date);
		$date = $date[2].'/'.$date[1].'/'.$date[0];
		return $date;
	}
	static public function getNewsLimit($limit, $lang)
	{
		$db = Db::getConnection();
		$sql = 'SELECT id, title_'.$lang.', desc_'.$lang.', publish_at FROM news WHERE publish = 1 ORDER BY create_at desc LIMIT '.$limit;

		$result = $db->prepare($sql);
		$result->execute();
		$news = $result->fetchAll(PDO::FETCH_ASSOC);
		return $news;
	}

	static public function getPreventionsLimit($limit, $lang)
	{
		$db = Db::getConnection();
		$sql = 'SELECT id, title_'.$lang.', desc_'.$lang.', publish_at FROM prevention WHERE publish = 1 ORDER BY create_at desc LIMIT '.$limit;

		$result = $db->prepare($sql);
		$result->execute();
		$news = $result->fetchAll(PDO::FETCH_ASSOC);
		return $news;
	}

	static public function getAllThemes($lang)
	{
		$db = Db::getConnection();
		$sql = 'SELECT * FROM themes ';

		$result = $db->prepare($sql);
		$result->execute();
		$themes = $result->fetchAll(PDO::FETCH_ASSOC);
		return $themes;
	}

	static public function getThemeById($id, $lang)
	{
		$db = Db::getConnection();
		$sql = 'SELECT theme_id, title_'.$lang.' FROM themes WHERE theme_id = '.$id;

		$result = $db->prepare($sql);
		$result->execute();
		$theme = $result->fetch(PDO::FETCH_ASSOC);
		return $theme;
	}

	static public function getAllAreas($lang)
	{
		$db = Db::getConnection();
		$sql = 'SELECT area_id, title_'.$lang.' FROM areas ';

		$result = $db->prepare($sql);
		$result->execute();
		$areas = $result->fetchAll(PDO::FETCH_ASSOC);
		return $areas;
	}
	static public function getAreaById($id, $lang)
	{
		$db = Db::getConnection();
		$sql = 'SELECT area_id, title_'.$lang.' FROM areas WHERE area_id = '. $id;

		$result = $db->prepare($sql);
		$result->execute();
		$area = $result->fetch(PDO::FETCH_ASSOC);
		return $area['title_'.$lang];
	}

	static public function check_email($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
	}

	static public function getAllAppealsAdmin()
	{
		$lang = $_SESSION['lang'];
		$db = Db::getConnection();
		$sql = 'SELECT * FROM appeals ORDER BY create_at desc';

		$result = $db->prepare($sql);
		$result->execute();
		$appeals = $result->fetchAll(PDO::FETCH_ASSOC);
		
		for ($i=0; $i < count($appeals); $i++){
			$appealsNew[$i]['id'] = $appeals[$i]['id'];
			$appealsNew[$i]['appeal_number'] = $appeals[$i]['appeal_number'];
			$appealsNew[$i]['fio'] = $appeals[$i]['second_name'] .' '.$appeals[$i]['name'].' '.$appeals[$i]['father_name'];
			$appealsNew[$i]['mobile_phone'] = $appeals[$i]['mobile_phone'];
			$appealsNew[$i]['date'] = $appeals[$i]['create_at'];
			$appealsNew[$i]['path_file'] = $appeals[$i]['path_file'];
			$appealsNew[$i]['status'] = $appeals[$i]['status'];
			$appealsNew[$i]['area'] = self::getAreaById($appeals[$i]['area'], $lang);
		}
		return $appealsNew;
	}

	static public function check_second_name($second_name)
	{
		if (strlen($second_name) >= 2) {
            return true;
        }
        return false;
	}

	static public function check_name($name)
	{
		if (strlen($name) >= 2) {
            return true;
        }
        return false;
	}


	static public function check_father_name($father_name)
	{
		if (strlen($father_name) >= 2) {
            return true;
        }
        return false;
	}

	static public function check_type_person($type_person)
	{
		if ($type_person == 'individual'  || $type_person == 'entity') {
            return true;
        }
        return false;
	}

	static public function check_area($area)
	{
		$db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM areas WHERE area_id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $area, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn())
        {
            return true;
        }
        return false;
	}

	static public function check_address($address)
	{
		if (strlen($address) >= 5) {
            return true;
        }
        return false;
	}

	static public function check_mobile_phone($mobile_phone)
	{
		if (strlen($mobile_phone) >= 7) {
            return true;
        }
        return false;
	}

	static public function check_birth_date($birth_date)
	{
		if (strlen($birth_date) >= 5) {
            return true;
        }
        return false;
	}

	static public function check_text($text)
	{
		if (strlen($text) >= 25) {
            return true;
        }
        return false;
	}

	static public function check_file_type($filename)
	{
		$filesType = array( 'jpg' => 'jpg', 'bmp' => 'bmp', 'png' => 'png', 'pdf' => 'pdf', 'doc' => 'doc', 'docx' => 'docx', 'xls' => 'xls');
		if (isset($filename)) {
			$fileType = explode(".", $filename);
			$fileType = array_pop($fileType);
			if($filesType[$fileType] != null)
			{
				return true;
			}

        }
        return false;
	}
	static public function get_file_type($filename)
		{
			$filesType = array( 'jpg' => 'jpg', 'bmp' => 'bmp', 'png' => 'png', 'pdf' => 'pdf', 'doc' => 'doc', 'docx' => 'docx', 'xls' => 'xls');
			if (isset($filename)) {
				$fileType = explode(".", $filename);
				$fileType = array_pop($fileType);
				if($filesType[$fileType] != null)
				{
					return $fileType;
				}

	        }
	        return false;
		}
	static public function addAppeal($data)
	{
		$d = '';
		$c = 0;
		$db = Db::getConnection();

        $sql = 'INSERT INTO appeals (response, email, second_name, name, '
        		.'father_name, type_person, type_appeal, area, address, mobile_phone, '
        		.'birth_date, text, path_file, appeal_number, appeal_secret, status, create_at) '
                . 'VALUES (:response, :email, :second_name, :name, '
        		.':father_name, :type_person, :type_appeal, :area, :address, :mobile_phone, '
        		.':birth_date, :text, :path_file, :appeal_number, :appeal_secret, :status, NOW())';
        	
         $result = $db->prepare($sql);
         $result->bindParam(':response', $data['response'], PDO::PARAM_INT);
         $result->bindParam(':email', $data['email'], PDO::PARAM_STR);
         $result->bindParam(':second_name', $data['second_name'], PDO::PARAM_STR);
         $result->bindParam(':name', $data['name'], PDO::PARAM_STR);
         $result->bindParam(':father_name', $data['father_name'], PDO::PARAM_STR);
         $result->bindParam(':type_person', $data['type_person'], PDO::PARAM_STR);
         $result->bindParam(':type_appeal', $data['type_appeal'], PDO::PARAM_STR);
         $result->bindParam(':area', $data['area'], PDO::PARAM_INT);
         $result->bindParam(':address', $data['address'], PDO::PARAM_STR);
         $result->bindParam(':mobile_phone', $data['mobile_phone'], PDO::PARAM_STR);
         $result->bindParam(':birth_date', $data['birth_date'], PDO::PARAM_STR);
         $result->bindParam(':text', $data['text'], PDO::PARAM_STR);
         $result->bindParam(':path_file', $data['path_file'], PDO::PARAM_STR);
         $result->bindParam(':appeal_number', $d, PDO::PARAM_STR);
         $result->bindParam(':appeal_secret', $d, PDO::PARAM_STR);
         $result->bindParam(':status', $c, PDO::PARAM_INT);
         
         if($result->execute())
	     {
	     	$id = $db->lastInsertId();
	     	$appeal_number = 'GUVD_'.date('Y').'_'.$id;
			$appeal_secret = self::randomPassword();
			$updateSql = "UPDATE appeals SET appeal_number = :appeal_number, "
						."appeal_secret = :appeal_secret WHERE id = :id";
			$updateResult = $db->prepare($updateSql);
			$updateResult->bindParam(':id', $id, PDO::PARAM_INT);
         	$updateResult->bindParam(':appeal_number', $appeal_number, PDO::PARAM_STR);
         	$updateResult->bindParam(':appeal_secret', $appeal_secret, PDO::PARAM_STR);
         	$updateResult->execute();
         	$success['appeal_number'] = $appeal_number;
         	$success['appeal_secret'] = $appeal_secret;
         	return $success;

	     }
	     
	     return false;
	}


	static public function checkAppeal($appeal_number, $appeal_secret){
		$db = Db::getConnection();
		$sql = "SELECT id, status FROM appeals WHERE appeal_number = :appeal_number AND appeal_secret = :appeal_secret";
		$result = $db->prepare($sql);
		$result->bindParam(':appeal_number', $appeal_number, PDO::PARAM_STR);
		$result->bindParam(':appeal_secret', $appeal_secret, PDO::PARAM_STR);
		$result->execute();
		$result = $result->fetch(PDO::FETCH_ASSOC);
		if($result['status'] == 3 || $result['status'] == 2)
		{
			$sql1 = "SELECT file, text, create_at FROM answers WHERE appeal_id = :appeal_id ORDER BY create_at desc";
			$result1 = $db->prepare($sql1);
			$result1->bindParam(':appeal_id', $result['id'], PDO::PARAM_STR);
			$result1->execute();
			$result1 = $result1->fetchAll(PDO::FETCH_ASSOC);
			$result1['status'] = '<p class="center-align">Статус: <b>'.self::statusReplace($result['status']).'</b></p>';
			
			return $result1;
		}
		if(isset($result['status']))
		{
			return '<p class="center-align">Статус: <b>'.self::statusReplace($result['status']).'</b></p>';
			
		}else
		{
				return '<p class="center-align"><b>Мурожаат рақами ёки холатни текшириш коди нотоғри<br/>Не правильный номер обращения или код проверки состояния</b></p>';
			
		}
		
		
	}

	static public function getAppealsStat()
	{
		$db = Db::getConnection();
		$sql = "SELECT status, COUNT(*) FROM appeals GROUP BY status";
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		$sql2 = "SELECT COUNT(*) FROM appeals";
		$result2 = $db->prepare($sql2);
		$result2->execute();
		$result2 = $result2->fetch(PDO::FETCH_ASSOC);
		for ($i=0; $i < count($result) ; $i++) { 
			$finish[$result[$i]['status']] = $result[$i]['COUNT(*)'];
		}
		$finish['total'] = $result2['COUNT(*)'];
		$_SESSION['stat_new'] = $finish[0];
		return $finish;
	}

	static public function getAppealById($id)
	{
		$db = Db::getConnection();

		if(isset($id))
		{
			$sql = 'SELECT * FROM appeals WHERE id = :id';
			$result = $db->prepare($sql);
			$result->bindParam(':id', $id, PDO::PARAM_INT);
			$result->execute();
			$result = $result->fetch(PDO::FETCH_ASSOC);

			return $result;
		}
		return false;
		
	}
	static public function getDataReceptionDays()
	{
		$db = Db::getConnection();
		$sql = 'SELECT * FROM reception_days ORDER BY id ASC';
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		$result->execute();
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		// echo "<pre>";
		// print_r($result);
		// die;
		return $result;
		
	}
	static public function getDataLidership()
	{
		$db = Db::getConnection();
		$sql = 'SELECT * FROM lidership ORDER BY id ASC';
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		$result->execute();
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		// echo "<pre>";
		// print_r($result);
		// die;
		return $result;
		
	}
	static public function getDataDocuments()
	{
		$db = Db::getConnection();
		$sql = 'SELECT * FROM documents ORDER BY id ASC';
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		$result->execute();
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		// echo "<pre>";
		// print_r($result);
		// die;
		return $result;
		
	}

	static public function getMissing()
	{
		$db = Db::getConnection();
		$sql = 'SELECT * FROM missing ORDER BY missing_id ASC';
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		// echo "<pre>";
		// print_r($result);
		// die;
		return $result;
		
	}
	static public function getWanted()
	{
		$db = Db::getConnection();
		$sql = 'SELECT * FROM wanted ORDER BY wanted_id ASC';
		$result = $db->prepare($sql);
		
		
		if($result->execute())
		{
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}
		return false;
		
	}
	static public function getImageCategory($id, $cat)
	{
		$noImage = 'no-photo.jpg';

		$path = '/upload/images/'.$cat.'/';

		$pathToProductImage = $path . $id . '.jpg';

		if(file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage))
		{
			return $pathToProductImage;
		}

		return $path . $noImage;
	}
}

