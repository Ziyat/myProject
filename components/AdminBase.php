<?php

/**
* Контроллер для вывода Администраторской части
*/
abstract class AdminBase
{
	public static function checkAdmin()
	{
		$userId = User::checkLogged();
		$user = User::getUserById($userId);

		if($user['role'] == 'admin' || $user['role'] == 'moderator')
		{
			return true;
		}

		die('Access denied');
	}
}