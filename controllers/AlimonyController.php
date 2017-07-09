<?php

/**
* Контроллер для вывода Новости страницы
*/
class AlimonyController
{
	
	public function actionIndex($page = 1)
	{
		
		$lang = $_SESSION['lang'];		
		$alimony = Alimony::getAlimonyOrderDesc($page);
		$total = Alimony::getTotalAlimony();
		$pagination = new Pagination($total, $page, Alimony::SHOW_BY_DEFAULT, 'page-');
		
		require_once(ROOT.'/views/content/alimony/index.php');
		return true;
	}

	

	public function actionView($id){
		
		$g = $_SESSION['lang'];
		$new = Alimony::getAlimonyById($id);
		$comments = Comments::getCommnetsAlimony($id);
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
					header("Location: /$lang/alimony/$id#comments");
				}
		}
		require_once(ROOT.'/views/content/alimony/view.php');
		return true;
	}

	public function actionAjaxSearchAlimony($text){
		
		
		
		$text = urldecode($text);
		
		$data = Alimony::searchAlimony($text);
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
					$img = Home::getImageCategory($value['alimony_id'], 'alimony');
					$name = $value["name"];
					$val .= '"'.$name .'":"'. $img .'"';
					$bool = 1;
				
				}
				print_r('{'.$val.'}');
				die;
			}else
			{
				foreach ($data as $value) {
				echo ' {"'.$value['name'].'": "'.Home::getImageCategory($value['alimony_id'], 'alimony').'"}';
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

	public function actionAjaxSearchAlimonyResult($text){
		$lang = $_SESSION['lang'];
		$text = urldecode($text);
		$data = Alimony::searchAlimony($text);
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
					$img = Home::getImageCategory($value['alimony_id'], 'alimony');
					$name = $value["name"];
					$birth_day = $value["birth_day"];
					$val .= '"name":"'. $name .'"';
					$val .= ', ';
					$val .= '"birth_day":"'. $birth_day .'"';
					$val .= ', ';
					$val .= '"img":"'. $img .'"';
					$val .= '"descRU":"'. $desc = $value['desc_ru'] .'"';
					$val .= '"descUZ":"'. $desc = $value['desc_uz'] .'"';
					$bool = 1;
				
				}
				//print_r('{'.$val.'}');
				print_r($data);
				die;
			}else
			{
				foreach ($data as $value) {
				echo '{"name": "'.$value['name'].'", "birth_day":"'.$value['birth_day'].'", "img":"'.Home::getImageCategory($value['alimony_id'], 'alimony').'", "descRU":"'.$desc = $value['desc_ru'].'", "descUZ":"'.$desc = $value['desc_uz'].'"}';
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