<?php

/**
* Контроллер для вывода Новости страницы
*/
class PreventionController
{
	function stringReplace($string){
		$string = strip_tags($string);
        $string = substr($string, 0, 100);
        $string = rtrim($string, "!,.-");
        $string = substr($string, 0, strrpos($string, ' '));
        return $string."… ";
	}
	public function actionIndex($page = 1)
	{
		
		$lang = $_SESSION['lang'];		
		$preventions = Prevention::getPreventionOrderDesc($page);
		$total = Prevention::getTotalPrevention();
		$pagination = new Pagination($total, $page, Prevention::SHOW_BY_DEFAULT, 'page-');
		
		require_once(ROOT.'/views/content/prevention/index.php');
		return true;
	}

	

	public function actionView($id){
		
		$lang = $_SESSION['lang'];
		$prevention = Prevention::getPreventionById($id);
		$comments = Comments::getCommnetsPrevention($id);
		$fio = '';
		$text = '';
		$captcha = '';
		if(isset($_POST['submit']))
		{
			$fio  = $_POST['fio'];
			$text = $_POST['text'];

			$fio  = trim($fio);
			$text = trim($text);

			$fio  = stripcslashes($fio);
			$text = stripcslashes($text);

			$fio  = htmlspecialchars($fio, ENT_QUOTES);
			$text = htmlspecialchars($text, ENT_QUOTES);
			$fio  = Comments::fixtags($fio);
			$text  = Comments::fixtags($text);
			$errors = false;
			if (!Home::check_name($fio)) {
                	$errors['fio'] = ERROR_EMPTY;
                }
            if (!Home::check_text($text)) {
                	$errors['text'] = ERROR_EMPTY;
                }

			if($_SESSION['captcha_keystring'] != $_POST['captcha'])	{
					$errors['captcha'] = ERROR_EMPTY;
				}
			if ($errors == false){
					$success = Comments::createNewComment($fio, $text, 0, $id);
					header("Location: /$lang/prevention/$id#comments");
				}
		}
		require_once(ROOT.'/views/content/prevention/view.php');
		return true;
	}
}