<?php

/**
* Контроллер для вывода Новости страницы
*/
class NewsController
{
	
	public function actionIndex($page = 1)
	{
		
		$lang = $_SESSION['lang'];		
		$news = News::getNewsOrderDesc($page);
		$total = News::getTotalNews();
		$pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');
		
		require_once(ROOT.'/views/content/news/index.php');
		return true;
	}

	

	public function actionView($id){
		$lang = $_SESSION['lang'];
		$new = News::getNewsById($id);
		$comments = Comments::getCommnetsNews($id);
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
					$success = Comments::createNewComment($fio, $text, $id, 0);
					header("Location: /$lang/news/$id#comments");
				}
		}
		require_once(ROOT.'/views/content/news/view.php');
		return true;
	}
}