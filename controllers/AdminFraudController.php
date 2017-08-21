<?php

/**
* Контроллер для вывода Администраторской части
*/
class AdminFraudController extends AdminBase
{
	public function actionIndex($page = 1)
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$frauds = Fraud::getFraudOrderDescAdmin($page);
		$total = Fraud::getTotalFraud();
		$pagination = new Pagination($total, $page, Fraud::SHOW_BY_DEFAULT, 'page-');
		require_once(ROOT . '/views/admin/fraud/index.php');
		return true;
	}

	public function actionCreate()
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];


		$name = '';
		$birth_day = '';
		$publish = '';
		$desc_ru = '';
		$desc_uz = '';
		$errors = false;
		if(isset($_POST['submit']))
		{
			$name = $_POST['name'];
			$birth_day = $_POST['birth_day'];
			$file = $_FILES['file'];
			$desc_ru = $_POST['desc_ru'];
			$desc_uz = $_POST['desc_uz'];

			if(isset($_POST['publish']))
			{
				$publish = $_POST['publish'];
			}else
			{
				$publish = 0;
			}
			if (!Home::check_name($name)) {
                	$errors['name'] = ERROR_EMPTY;
                }

			if($errors == false)
			{
				$arrayData = array(
                	'name' => $name,
                	'birth_day' => $birth_day,
                	'publish' => $publish,
                	'desc_ru' => $desc_ru,
                	'desc_uz' => $desc_uz,
				);

                
                if($success = Fraud::createFraud($arrayData))
                {
                	if(isset($file) && $file['error'] == 0)
					{
						

						$baseName = basename($file["name"]);

		                $uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/upload/images/fraud';
				        $tmp_name = $file["tmp_name"];
		                if(Home::check_file_type($baseName))
			            {	$name = $success.'.'.Home::get_file_type($baseName);
			        		ResizeImg::resize_crop_image(300, 300, $tmp_name, "$uploads_dir/$name", 60);
							header("Location: /".$lang."/admin/fraud");
			            }else{
			            	$errors['file'] = ERROR_FILE;
			            }

					}
                }
			}
		}
		require_once(ROOT . '/views/admin/fraud/create.php');
		return true;
	}

	public function actionUpdate($id)
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$fraud = Fraud::getFraudById($id);
		
		$name = $fraud['name'];
		$birth_day = $fraud['birth_day'];
		$publish = $fraud['publish'];
		$desc_ru = $fraud['desc_ru'];
		$desc_uz = $fraud['desc_uz'];
		$errors = false;
		if(isset($_POST['submit']))
		{
			$name = $_POST['name'];
			$birth_day = $_POST['birth_day'];
			$file = $_FILES['file'];
			$desc_ru = $_POST['desc_ru'];
			$desc_uz = $_POST['desc_uz'];

			if(isset($_POST['publish']))
			{
				$publish = $_POST['publish'];
			}else
			{
				$publish = 0;
			}
			if (!Home::check_name($name)) {
                	$errors['name'] = ERROR_EMPTY;
                }

			if($errors == false)
			{
				$arrayData = array(
					'fraud_id' => $id,
                	'name' => $name,
                	'birth_day' => $birth_day,
                	'publish' => $publish,
                	'desc_ru' => $desc_ru,
                	'desc_uz' => $desc_uz,
				);

                
                if($success = Fraud::updateFraud($arrayData))
                {
                	if(isset($file) && $file['error'] == 0)
					{
						

						$baseName = basename($file["name"]);

		                $uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/upload/images/fraud';
				        $tmp_name = $file["tmp_name"];
		                if(Home::check_file_type($baseName))
			            {	$name = $id.'.'.Home::get_file_type($baseName);
							ResizeImg::resize_crop_image(300, 300, $tmp_name, "$uploads_dir/$name", 60);
							header("Location: /".$lang."/admin/fraud");
			            }else{
			            	$errors['file'] = ERROR_FILE;
			            }

					}
					header("Location: /$lang/admin/fraud");
                }
			}
		}
		require_once(ROOT . '/views/admin/fraud/update.php');
		return true;
	}

	public function actionDelete($id)
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$fraud = Fraud::getFraudById($id);
		if(isset($_POST['submit']))
		{
			Fraud::deleteFraud($id);
			header("Location: /$lang/admin/fraud");
		}

		require_once(ROOT . '/views/admin/fraud/delete.php');
		return true;
	}

}