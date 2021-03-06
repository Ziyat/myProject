<?php

/**
* Контроллер для вывода Администраторской части
*/
class AdminMissingController extends AdminBase
{
	public function actionIndex($page = 1)
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$missings = Missing::getMissingOrderDescAdmin($page);
		$total = Missing::getTotalMissing();
		$pagination = new Pagination($total, $page, Missing::SHOW_BY_DEFAULT, 'page-');
		require_once(ROOT . '/views/admin/missing/index.php');
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
		$errors = false;
		if(isset($_POST['submit']))
		{
			$name = $_POST['name'];
			$birth_day = $_POST['birth_day'];
			$file = $_FILES['file'];

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
                	'publish' => $publish
				);

                
                if($success = Missing::createMissing($arrayData))
                {
                	if(isset($file) && $file['error'] == 0)
					{
						

						$baseName = basename($file["name"]);

		                $uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/upload/images/missing';
				        $tmp_name = $file["tmp_name"];
		                if(Home::check_file_type($baseName))
			            {	$name = $success.'.'.Home::get_file_type($baseName);
			        		ResizeImg::resize_crop_image(300, 300, $tmp_name, "$uploads_dir/$name", 60);
							header("Location: /".$lang."/admin/missing");
			            }else{
			            	$errors['file'] = ERROR_FILE;
			            }

					}
                }
			}
		}
		require_once(ROOT . '/views/admin/missing/create.php');
		return true;
	}

	public function actionUpdate($id)
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$missing = Missing::getMissingById($id);
		
		$name = $missing['name'];
		$birth_day = $missing['birth_day'];
		$publish = $missing['publish'];
		$errors = false;
		if(isset($_POST['submit']))
		{
			$name = $_POST['name'];
			$birth_day = $_POST['birth_day'];
			$file = $_FILES['file'];

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
					'missing_id' => $id,
                	'name' => $name,
                	'birth_day' => $birth_day,
                	'publish' => $publish
				);

                
                if($success = Missing::updateMissing($arrayData))
                {
                	if(isset($file) && $file['error'] == 0)
					{
						

						$baseName = basename($file["name"]);

		                $uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/upload/images/missing';
				        $tmp_name = $file["tmp_name"];
		                if(Home::check_file_type($baseName))
			            {	$name = $id.'.'.Home::get_file_type($baseName);
							ResizeImg::resize_crop_image(300, 300, $tmp_name, "$uploads_dir/$name", 60);
							header("Location: /".$lang."/admin/missing");
			            }else{
			            	$errors['file'] = ERROR_FILE;
			            }

					}
					header("Location: /$lang/admin/missing");
                }
			}
		}
		require_once(ROOT . '/views/admin/missing/update.php');
		return true;
	}

	public function actionDelete($id)
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$missing = Missing::getMissingById($id);
		if(isset($_POST['submit']))
		{
			Missing::deleteMissing($id);
			header("Location: /$lang/admin/missing");
		}

		require_once(ROOT . '/views/admin/missing/delete.php');
		return true;
	}

}