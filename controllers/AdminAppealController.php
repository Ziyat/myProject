<?php

/**
* Контроллер для вывода Администраторской части
*/
class AdminAppealController extends AdminBase
{
	public function actionIndex()
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$appeals = Home::getAllAppealsAdmin();
		$stat = Home::getAppealsStat();
		require_once(ROOT . '/views/admin/appeal/index.php');
		return true;
	}

	public function actionView($id)
	{
		self::checkAdmin();
		$userId = $_SESSION['user'];
		$user = User::getUserById($userId);
		$lang = $_SESSION['lang'];
		$appeal = Home::getAppealById($id);
		require_once(ROOT . '/views/admin/appeal/view.php');
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

		require_once(ROOT . '/views/admin/appeal/update.php');
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

		require_once(ROOT . '/views/admin/cuisine/delete.php');
		return true;
	}

}