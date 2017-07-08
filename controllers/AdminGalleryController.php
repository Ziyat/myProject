<?php

/**
* Контроллер для вывода Администраторской части
*/
class AdminGalleryController extends AdminBase
{
	public function actionIndex()
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$galleries = Gallery::getData($lang);
		require_once(ROOT . '/views/admin/gallery/index.php');
		return true;
	}

	public function actionCreate()
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];

		if(isset($_POST['submit']))
		{

			$options['title_ru'] = $_POST['title_ru'];
			$options['title_cn'] = $_POST['title_cn'];
			$options['title_en'] = $_POST['title_en'];

			$errors = false;

			if(!isset($options['title_ru']) || empty($options['title_ru']))
			{
				$errors[] = ERROR_TITLE .' <strong>"'. TITLE.'"</strong>';
			}

			if($errors == false)
			{
				$id = Gallery::createGallery($options);


				if($id)
				{
					if(is_uploaded_file($_FILES['image']['tmp_name']))
					{
						$fileInput = $_FILES['image']['tmp_name'];
						$fileOutput = "$id.jpg";
						$img = ResizeImg::resize($fileInput, $_SERVER['DOCUMENT_ROOT']. "/upload/images/gallery/cat/". $fileOutput, 100,100, $percent = true);
					}
				};

				header("Location: /$lang/admin/gallery");
			}
		}

		require_once(ROOT . '/views/admin/gallery/create.php');
		return true;
	}

	public function actionUpdate($id)
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$gallery = Gallery::getGalleryById($id);
		if(isset($_POST['submit']))
		{
			$options['title_ru'] = $_POST['title_ru'];
			$options['title_cn'] = $_POST['title_cn'];
			$options['title_en'] = $_POST['title_en'];

			
			if(Gallery::updateGalleryById($id, $options))
			{
				if(is_uploaded_file($_FILES['image']['tmp_name']))
				{
					$fileInput = $_FILES['image']['tmp_name'];
					$fileOutput = "$id.jpg";
					$img = ResizeImg::resize($fileInput, $_SERVER['DOCUMENT_ROOT']. "/upload/images/gallery/cat/". $fileOutput, 100,100, $percent = true);
				};
			}
			header("Location: /$lang/admin/gallery");
			
		}

		require_once(ROOT . '/views/admin/gallery/update.php');
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
			Gallery::deleteGalleryById($id);
			header("Location: /$lang/admin/gallery");
		}

		require_once(ROOT . '/views/admin/gallery/delete.php');
		return true;
	}

}