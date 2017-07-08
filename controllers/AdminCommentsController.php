<?php

/**
* Контроллер для вывода Администраторской части
*/
class AdminCommentsController extends AdminBase
{
	public function actionIndex($page = 1)
	{

		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$comments = Comments::getCommentsOrderDescAdmin($page);
		$total = Comments::getTotalComments();
		$pagination = new Pagination($total, $page, Comments::SHOW_BY_DEFAULT, 'page-');
		require_once(ROOT . '/views/admin/comments/index.php');
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

                
                if($success = Comments::createComments($arrayData))
                {
                	if(isset($file) && $file['error'] == 0)
					{
						

						$baseName = basename($file["name"]);

		                $uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/upload/images/comments';
				        $tmp_name = $file["tmp_name"];
		                if(Home::check_file_type($baseName))
			            {	$name = $success.'.'.Home::get_file_type($baseName);
			        		ResizeImg::resize_crop_image(300, 300, $tmp_name, "$uploads_dir/$name", 60);
							header("Location: /".$lang."/admin/comments");
			            }else{
			            	$errors['file'] = ERROR_FILE;
			            }

					}
                }
			}
		}
		require_once(ROOT . '/views/admin/comments/create.php');
		return true;
	}

	public function actionUpdate($id)
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$comments = Comments::getCommentsById($id);
		
		$name = $comments['name'];
		$text = $comments['text'];
		$errors = false;
		if(isset($_POST['submit']))
		{
			$name = $_POST['name'];
			$text = $_POST['text'];

			if (!Home::check_name($name)) {
                	$errors['name'] = ERROR_EMPTY;
                }

			if($errors == false)
			{
				$arrayData = array(
					'comment_id' => $id,
                	'name' => $name,
                	'text' => $text
				);

                
                if($success = Comments::updateComments($arrayData))
                {
                	header("Location: /$lang/admin/comments");
                }
			}
		}
		require_once(ROOT . '/views/admin/comments/update.php');
		return true;
	}

	public function actionDelete($id)
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$comments = Comments::getCommentsById($id);
		if(isset($_POST['submit']))
		{
			Comments::deleteComments($id);
			header("Location: /$lang/admin/comments");
		}

		require_once(ROOT . '/views/admin/comments/delete.php');
		return true;
	}

}