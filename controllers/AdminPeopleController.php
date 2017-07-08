<?php

/**
* Контроллер для вывода Администраторской части
*/
class AdminPeopleController extends AdminBase
{
	public function actionIndex($page = 1)
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$peoples = People::getPeopleOrderDescAdmin($page);
		$total = People::getTotalPeople();
		$pagination = new Pagination($total, $page, People::SHOW_BY_DEFAULT, 'page-');
		require_once(ROOT . '/views/admin/people/index.php');
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

                
                if($success = People::createPeople($arrayData))
                {
                	if(isset($file) && $file['error'] == 0)
					{
						

						$baseName = basename($file["name"]);

		                $uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/upload/images/people';
				        $tmp_name = $file["tmp_name"];
		                if(Home::check_file_type($baseName))
			            {	$name = $success.'.'.Home::get_file_type($baseName);
			        		ResizeImg::resize_crop_image(300, 300, $tmp_name, "$uploads_dir/$name", 60);
							header("Location: /".$lang."/admin/people");
			            }else{
			            	$errors['file'] = ERROR_FILE;
			            }

					}
                }
			}
		}
		require_once(ROOT . '/views/admin/people/create.php');
		return true;
	}

	public function actionUpdate($id)
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$people = People::getPeopleById($id);
		
		$name = $people['name'];
		$birth_day = $people['birth_day'];
		$publish = $people['publish'];
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
					'people_id' => $id,
                	'name' => $name,
                	'birth_day' => $birth_day,
                	'publish' => $publish
				);

                
                if($success = People::updatePeople($arrayData))
                {
                	if(isset($file) && $file['error'] == 0)
					{
						

						$baseName = basename($file["name"]);

		                $uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/upload/images/people';
				        $tmp_name = $file["tmp_name"];
		                if(Home::check_file_type($baseName))
			            {	$name = $id.'.'.Home::get_file_type($baseName);
							ResizeImg::resize_crop_image(300, 300, $tmp_name, "$uploads_dir/$name", 60);
							header("Location: /".$lang."/admin/people");
			            }else{
			            	$errors['file'] = ERROR_FILE;
			            }

					}
					header("Location: /$lang/admin/people");
                }
			}
		}
		require_once(ROOT . '/views/admin/people/update.php');
		return true;
	}

	public function actionDelete($id)
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$people = People::getPeopleById($id);
		if(isset($_POST['submit']))
		{
			People::deletePeople($id);
			header("Location: /$lang/admin/people");
		}

		require_once(ROOT . '/views/admin/people/delete.php');
		return true;
	}

}