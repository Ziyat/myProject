<?php
// Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
ini_set('session.cookie_httponly', 1);
// Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/Autoload.php');
// Вызов Router
Functions::getLang();
if(isset($_SESSION['lang']) && !empty($_SESSION['lang']))
{
	$filename = ROOT . '/components/lang/'. $_SESSION['lang'] .'.php';

	if (file_exists($filename)) {
	    require_once($filename);
	} else {
	   header('Location: /');
	}
}else
{
	require_once(ROOT . '/components/lang/ru.php');
}
$router = new Router();
$router->run();