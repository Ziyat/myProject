<?php

/**
* Контроллер для вывода Главной страницы
*/
class HomeController
{
	public function actionLangSwitch($lang)
	{
		$pattern = '(/[a-zA-Z][a-zA-Z]$|/[a-zA-Z][a-zA-Z]/)';
		$replacement = '/'.$lang.'/';
		$subject = preg_replace($pattern, $replacement, $_SERVER['HTTP_REFERER']);
		$_SESSION['lang'] = $lang;
		header('Location: ' . $subject);
		return true;
	}

	public function actionIndex()
	{
		$pattern = '(/[a-zA-Z][a-zA-Z]$|/[a-zA-Z][a-zA-Z]/)';
		if(!empty($_SESSION['lang'])  && preg_match($pattern, $_SERVER['REQUEST_URI']))
		{
			header('Location: /' . $_SESSION['lang']);
		}
		else
		{
			$_SESSION['lang'] = 'ru';
			header('Location: /' . $_SESSION['lang']);
		}
		
		return true;
	}

	public function actionHome($lang)
	{
		$pattern = '(/[a-zA-Z][a-zA-Z]$)';
		if(preg_match($pattern, $_SERVER['REQUEST_URI']))
		{
			$_SESSION['lang'] = $lang;
		}
		
		$news = Home::getNewsLimit(6, $lang);
		$preventions = Home::getPreventionsLimit(4, $lang);
		require_once(ROOT.'/views/content/index.php');
		return true;
	}

	

	public function actionAppeals()
	{

		$lang = $_SESSION['lang'];
		$themes = Home::getAllThemes($lang);
		$areas = Home::getAllAreas($lang);

		$response = '';
		$email = '';
		$second_name = '';
		$name = '';
		$father_name = '';
		$type_person = '';
		$type_appeal = '';
		$area = '';
		$address = '';
		$mobile_phone = '';
		$birth_date = '';
		$text = '';

		if(isset($_POST['submit']))
		{

			$response 	  = $_POST['response'];
			$email 		  = $_POST['email'];
			$second_name  = $_POST['second_name'];
			$name 		  = $_POST['name'];
			$father_name  = $_POST['father_name'];
			$type_person  = $_POST['type_person'];
			$type_appeal  = $_POST['type_appeal'];
			$area 		  = $_POST['area'];
			$address 	  = $_POST['address'];
			$mobile_phone = $_POST['mobile_phone'];
			$birth_date   = $_POST['birth_date'];
			$text 		  = $_POST['text'];
			
			// удалаем пробелы
			$response 	  = trim($response);
			$email 		  = trim($email);
			$second_name  = trim($second_name);
			$name 		  = trim($name);
			$father_name  = trim($father_name);
			$type_person  = trim($type_person);
			$type_appeal  = trim($type_appeal);
			$area 		  = trim($area);
			$address 	  = trim($address);
			$mobile_phone = trim($mobile_phone);
			$birth_date   = trim($birth_date);
			$text 		  = trim($text);
			
			// удалаем обратные слэши

			$response 	  = stripcslashes($response);
			$email 		  = stripcslashes($email);
			$second_name  = stripcslashes($second_name);
			$name 		  = stripcslashes($name);
			$father_name  = stripcslashes($father_name);
			$type_person  = stripcslashes($type_person);
			$type_appeal  = stripcslashes($type_appeal);
			$area 		  = stripcslashes($area);
			$address 	  = stripcslashes($address);
			$mobile_phone = stripcslashes($mobile_phone);
			$birth_date   = stripcslashes($birth_date);
			$text 		  = stripcslashes($text);

			$errors = false;

			if($response)
				{
					if (!Home::check_email($email)) {
                	$errors['email'] = ERROR_EMPTY;
                	}
				}
				
                if (!Home::check_second_name($second_name)) {
                	$errors['second_name'] = ERROR_EMPTY;
                }

                if (!Home::check_name($name)) {
                	$errors['name'] = ERROR_EMPTY;
                }

                if (!Home::check_father_name($father_name)) {
                	$errors['father_name'] = ERROR_EMPTY;
                }
                if (!Home::check_type_person($type_person)) {
                	$errors['type_person'] = ERROR_EMPTY;
                }
                if (!Home::check_area($area)) {
                	$errors['area'] = ERROR_EMPTY;
                }
                if (!Home::check_address($address)) {
                	$errors['address'] = ERROR_EMPTY;
                }
                if (!Home::check_mobile_phone($mobile_phone)) {
                	$errors['mobile_phone'] = ERROR_EMPTY;
                }
                if (!Home::check_birth_date($birth_date)) {
                	$errors['birth_date'] = ERROR_EMPTY;
                }
                if (!Home::check_text($text)) {
                	$errors['text'] = ERROR_EMPTY;
                }
			if($_SESSION['captcha_keystring'] == $_POST['captcha'])
			{               
                if(isset($_FILES) && $_FILES["file"]["error"] == UPLOAD_ERR_OK)
                {
                	$baseName = basename($_FILES["file"]["name"]);
                	$uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/upload/infiles';
		            $tmp_name = $_FILES["file"]["tmp_name"];
                	if(Home::check_file_type($baseName))
	            	{
	            		$baseName = date('d-m-Y').'-'.$baseName;
						move_uploaded_file($tmp_name, "$uploads_dir/$baseName");
						$path_file = "/upload/infiles/$baseName";
	            	}else{
	            		$errors['file'] = ERROR_EMPTY;
	            	}
	            	
                }
                $arrayData = array(
                	'response' => $response,
					'email' => $email,
					'second_name' => $second_name,
					'name' => $name,
					'father_name' => $father_name,
					'type_person' => $type_person,
					'type_appeal' => $type_appeal,
					'area' => $area,
					'address' => $address,
					'mobile_phone' => $mobile_phone,
					'birth_date' => $birth_date,
					'text' => $text
				);
				
				if(isset($path_file)){
					$arrayData['path_file'] = $path_file;
				}else
				{
					$arrayData['path_file'] = '';
				}
                $success = Home::addAppeal($arrayData);


			}
			else
			{
				$errors['captcha'] = ERROR_NAME;
			}
		}	
		require_once(ROOT.'/views/content/appeals.php');
		return true;
	}

	public static function actionAjaxCheckAppeal($appeal_number, $appeal_password)
	{
		$appeal_number = urldecode($appeal_number);
		$appeal_password = urldecode($appeal_password);
		$appeal_number = Comments::fixtags($appeal_number);
		$appeal_password = Comments::fixtags($appeal_password);
		print_r($appeal_number);
		echo '<br>';
		print_r($appeal_password);
		die;

		$results = Home::checkAppeal($appeal_number, $appeal_password);
		if(is_array($results))
		{
			$status = array_pop($results);
			echo $status;
			for ($i=0; $i < count($results); $i++) { 
				echo '<div class="card"><div class="card-content">';
				echo 'Дата: <b>'.Home::replaceDate($results[$i]['create_at']).'</b>';
				echo '<p>Текст: <b>'.$results[$i]['text'].'</b></p>';
				echo '</div>';
				if($results[$i]['file'] != '')
				{
					echo '
						<div class="card-action">
							<a class="blue-text text-darken-4" href="'.$results[$i]['file'].'" download>
							<i class="material-icons left">attach_file</i>Скачать файл</a>
						</div>
						';
				}
				echo '</div>';
				
			}
		}else
		{
			echo $results;
			
		}
		
		
		return true;
	}
	public static function actionAjaxMoreComments($news_id, $offset)
	{
		$comments = Comments::getMoreCommnetsNews($news_id, $offset);
		if($comments)
		{
			$val = '';
			$bool = 0;
			if(count($comments) > 1 && is_array($comments))
			{
				foreach ($comments as $value) {
					if(1 == $bool) {
						$val .= ', ';
					}
					
					$name = $value['comment']["name"];
					$text = $value['comment']["text"];
					$text = str_replace("\r\n", "", $text);
					$date = Home::replaceDate($value['comment']["create_at"]);
					$val .= '{ "name" : "'.$name.'", "text" : "'.$text.'", "create_at" : "'.$date.'" }';
					$bool = 1;
				
				}
				$val = trim($val, "\u \" \\ \n \r \t \/ \b \f -or-\-or- -OR-\-OR-");
				echo "[ $val ]";
				die;
			}else
			{
				foreach ($comments as $value) {
					$name = $value['comment']["name"];
					$text = $value['comment']["text"];
					$text = str_replace("\r\n", "", $text);
					$date = Home::replaceDate($value['comment']["create_at"]);
					
				echo ' {"name":"'.$name.'", "text":"'.$text.'", "create_at":"'.$date.'"}';
				}
				die;
			}

		}else
		{
			echo '';
			die;
		}
		return true;
	}

	public static function actionQuestions()
	{
		$lang = $_SESSION['lang'];
		require_once(ROOT.'/views/content/questions.php');
		return true;
	}

	public static function actionLeadership()
	{
		$lang = $_SESSION['lang'];
		$data = Home::getDataLidership();
		require_once(ROOT.'/views/content/leadership.php');
		return true;
	}
	public static function actionReception()
	{
		$lang = $_SESSION['lang'];
		$data = Home::getDataReceptionDays();
		require_once(ROOT.'/views/content/reception.php');
		return true;
	}
	public static function actionPrevention()
	{
		$lang = $_SESSION['lang'];
		require_once(ROOT.'/views/content/prevention.php');
		return true;
	}
	public static function actionWanted()
	{
		$lang = $_SESSION['lang'];
		$data = Home::getWanted();
		require_once(ROOT.'/views/content/wanted.php');
		return true;
	}
	public static function actionMissing()
	{
		$lang = $_SESSION['lang'];
		$data = Home::getMissing();
		require_once(ROOT.'/views/content/missing.php');
		return true;
	}
	public static function actionDocuments()
	{
		$lang = $_SESSION['lang'];
		$data = Home::getDataDocuments();
		require_once(ROOT.'/views/content/documents.php');
		return true;
	}
}