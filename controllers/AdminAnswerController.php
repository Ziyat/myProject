<?php

/**
* Контроллер для вывода Администраторской части
*/
class AdminAnswerController extends AdminBase
{
	public function actionIndex()
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		require_once(ROOT . '/views/admin/answer/answer.php');
		return true;
	}

	public function actionCreate($id)
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$appeal = Home::getAppealById($id);
		// проверка формы
		$text = '';
		$response = '';
		$file = '';
		$errors = false;

		if(isset($_POST['submit']))
		{
			$user_id = $userId;
			$appeal_id = $id;
			$text = $_POST['text'];
			$response = $_POST['response'];
			$file = $_FILES['file'];
			$text = trim($text);
			$text = htmlentities($text);
			$text = stripcslashes($text);
			if(!Answer::checkText($text)){
				$errors['text'] = ERROR_TEXT;
			}
			if(isset($response) && $response == 'on')
			{
				if(!Answer::checkEmailExist($appeal_id)){
				$errors['email'] = ERROR_EMAIL_EXISTS_ANSWER;
				}
			}
			if(isset($file) && $file['error'] == 0)
			{
				$baseName = basename($file["name"]);
                $uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/upload/outfiles';
                $uploads_path = '/upload/outfiles';
		        $tmp_name = $file["tmp_name"];
                if(Home::check_file_type($baseName))
	            {	
	            	move_uploaded_file($tmp_name, "$uploads_dir/$baseName");
					$path_file = "$uploads_path/$baseName";
	            }else{
	            	$errors['file'] = ERROR_FILE;
	            }

			}
			if(!$errors)
			{
				$arrayData = array(
                	'user_id' => $user_id,
                	'appeal_id' => $appeal_id,
                	'text' => $text,
				);
				
				if(isset($path_file)){
					$arrayData['file'] = $path_file;
				}else
				{
					$arrayData['file'] = '';
				}
                $success = Answer::createAnswer($arrayData);
			}
			
			

			
		}
		require_once(ROOT . '/views/admin/answer/create.php');
		return true;
	}

	public function actionView($id)
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$appeal = Home::getAppealById($id);
		require_once(ROOT . '/views/admin/answer/view.php');
		return true;
	}

	public function actionUpdate($id)
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$appeal = Home::getAppealById($id);
		
		if(isset($_POST['submit']))
		{
			$success = Appeals::updateAppealById($_POST['status'], $id, $_POST['cause'], $userId);
		}

		require_once(ROOT . '/views/admin/answer/update.php');
		return true;
	}

	public function actionDelete($id)
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];

		if(isset($_POST['submit']))
		{
			Cuisine::deleteCuisineById($id);
			header("Location: /$lang/admin/cuisine");
		}

		require_once(ROOT . '/views/admin/answer/delete.php');
		return true;
	}

}