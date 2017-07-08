<?php

/**
* Контроллер для вывода Администраторской части
*/
class AdminPreventionController extends AdminBase
{
	public function actionIndex($page = 1)
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$preventions = Prevention::getPreventionOrderDescAdmin($page);
		$total = Prevention::getTotalPrevention();
		$pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');
		require_once(ROOT . '/views/admin/prevention/index.php');
		return true;
	}

	public function actionCreate()
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];


		$title_ru = '';
		$title_uz = '';
		$desc_ru = '';
		$desc_uz = '';
		$text_ru = '';
		$text_uz = '';
		$publish = '';
		$errors = false;
		if(isset($_POST['submit']))
		{
			$title_ru = $_POST['title_ru'];
			$title_uz = $_POST['title_uz'];
			$desc_ru  = $_POST['desc_ru'];
			$desc_uz  = $_POST['desc_uz'];
			$text_ru  = $_POST['text_ru'];
			$text_uz  = $_POST['text_uz'];

			if(isset($_POST['publish']))
			{
				$publish  = $_POST['publish'];
			}else
			{
				$publish  = 0;
			}
			$file = $_FILES['file'];
			if(!$errors)
			{
				$arrayData = array(
                	'title_ru' => $title_ru,
                	'title_uz' => $title_uz,
                	'desc_ru' => $desc_ru,
                	'desc_uz' => $desc_uz,
                	'text_ru' => $text_ru,
                	'text_uz' => $text_uz,
                	'publish' => $publish
				);

                
                if($success = Prevention::createPrevention($arrayData))
                {
                	if(isset($file) && $file['error'] == 0)
					{
						

						$baseName = basename($file["name"]);

		                $uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/upload/images/prevention';
				        $tmp_name = $file["tmp_name"];
		                if(Home::check_file_type($baseName))
			            {	$name = $success.'.'.Home::get_file_type($baseName);
			        		ResizeImg::resize_crop_image(600, 400, $tmp_name, "$uploads_dir/$name", 60);
							///move_uploaded_file($tmp_name, "$uploads_dir/$name");
							header("Location: /".$lang."/admin/prevention");
			            }else{
			            	$errors['file'] = ERROR_FILE;
			            }

					}
					header("Location: /".$lang."/admin/prevention");
                }
			}
		}
		require_once(ROOT . '/views/admin/prevention/create.php');
		return true;
	}

	public function actionUpdate($id)
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$data = Prevention::getPreventionById($id);
		
		$title_ru = $data['title_ru'];
		$title_uz = $data['title_uz'];
		$desc_ru = $data['desc_ru'];
		$desc_uz = $data['desc_uz'];
		$text_ru = $data['text_ru'];
		$text_uz = $data['text_uz'];
		$publish = $data['publish'];
		$errors = false;
		if(isset($_POST['submit']))
		{
			$title_ru = $_POST['title_ru'];
			$title_uz = $_POST['title_uz'];
			$desc_ru  = $_POST['desc_ru'];
			$desc_uz  = $_POST['desc_uz'];
			$text_ru  = $_POST['text_ru'];
			$text_uz  = $_POST['text_uz'];
			$file = $_FILES['file'];

			if(isset($_POST['publish']))
			{

				$publish = $_POST['publish'];
			}else
			{
				$publish = 0;
			}

			if(!$errors)
			{
				$arrayData = array(
					'id' => $id,
                	'title_ru' => $title_ru,
                	'title_uz' => $title_uz,
                	'desc_ru' => $desc_ru,
                	'desc_uz' => $desc_uz,
                	'text_ru' => $text_ru,
                	'text_uz' => $text_uz,
                	'publish' => $publish
				);

                
                if($success = Prevention::updatePrevention($arrayData))
                {
                	if(isset($file) && $file['error'] == 0)
					{
						

						$baseName = basename($file["name"]);

		                $uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/upload/images/prevention';
				        $tmp_name = $file["tmp_name"];
		                if(Home::check_file_type($baseName))
			            {	$name = $id.'.'.Home::get_file_type($baseName);
			        		ResizeImg::resize_crop_image(600, 400, $tmp_name, "$uploads_dir/$name", 60);
							//move_uploaded_file($tmp_name, "$uploads_dir/$name");
							header("Location: /".$lang."/admin/prevention");
			            }else{
			            	$errors['file'] = ERROR_FILE;
			            }

					}
					header("Location: /$lang/admin/prevention");
                }
			}
		}
		require_once(ROOT . '/views/admin/prevention/update.php');
		return true;
	}

	public function actionDelete($id)
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$data = Prevention::getPreventionById($id);

		if(isset($_POST['submit']))
		{
			Prevention::deletePrevention($id);
			header("Location: /$lang/admin/prevention");
		}
		require_once(ROOT . '/views/admin/prevention/delete.php');
		return true;
	}

}