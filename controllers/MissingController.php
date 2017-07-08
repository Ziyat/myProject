<?php

/**
* Контроллер для вывода Новости страницы
*/
class MissingController
{
	
	public function actionIndex($page = 1)
	{
		
		$lang = $_SESSION['lang'];		
		$missing = Missing::getMissingOrderDesc($page);
		$total = Missing::getTotalMissing();
		$pagination = new Pagination($total, $page, Missing::SHOW_BY_DEFAULT, 'page-');
		
		require_once(ROOT.'/views/content/missing/index.php');
		return true;
	}

	

	public function actionView($id){
		
		$g = $_SESSION['lang'];
		$new = Missing::getMissingById($id);
		$comments = Comments::getCommnetsMissing($id);
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
					$success = Comments::createNewComment($fio, $text, $id);
					header("Location: /$lang/missing/$id#comments");
				}
		}
		require_once(ROOT.'/views/content/missing/view.php');
		return true;
	}

	public function actionAjaxSearchMissing($text){
		
		
		
		$text = urldecode($text);
		
		$data = Missing::searchMissing($text);
		if($data)
		{
			$val = '';
			$bool = 0;
			if(count($data) > 1 && is_array($data))
			{
				foreach ($data as $value) {
					if(1 == $bool) {
						$val .= ', ';
					}
					$img = Home::getImageCategory($value['missing_id'], 'missing');
					$name = $value["name"];
					$val .= '"'.$name .'":"'. $img .'"';
					$bool = 1;
				
				}
				print_r('{'.$val.'}');
				die;
			}else
			{
				foreach ($data as $value) {
				echo ' {"'.$value['name'].'": "'.Home::getImageCategory($value['missing_id'], 'missing').'"}';
				}
				die;
			}

		}else
		{
			echo '';
			die;
		}
		
		return false;
	}

	public function actionAjaxSearchMissingResult($text){
		$text = urldecode($text);
		$data = Missing::searchMissing($text);
		if($data)
		{
			$val = '';
			$bool = 0;
			if(count($data) > 1 && is_array($data))
			{
				foreach ($data as $value) {
					if(1 == $bool) {
						$val .= ', ';
					}
					$img = Home::getImageCategory($value['missing_id'], 'missing');
					$name = $value["name"];
					$birth_day = $value["birth_day"];
					$val .= '"name":"'. $name .'"';
					$val .= ', ';
					$val .= '"birth_day":"'. $birth_day .'"';
					$val .= ', ';
					$val .= '"img":"'. $img .'"';
					$bool = 1;
				
				}
				print_r('{'.$val.'}');
				die;
			}else
			{
				foreach ($data as $value) {
				echo '{"name": "'.$value['name'].'", "birth_day":"'.$value['birth_day'].'", "img":"'.Home::getImageCategory($value['missing_id'], 'missing').'"}';
				}
				die;
			}

		}else
		{
			echo '';
			die;
		}
		
		return false;
	}
}