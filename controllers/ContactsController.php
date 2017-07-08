<?php

/**
* Контроллер для вывода Главной страницы
*/
class ContactsController
{
	public function actionIndex()
	{
		$data = Contacts::getData($_SESSION['lang'],'contacts');
		echo $data[3];
		return true;
	}
}