<?php

/**
* Контроллер для вывода Новости страницы
*/
class PeopleController
{
	
	public function actionIndex($page = 1)
	{
		
		$lang = $_SESSION['lang'];		
		$people = People::getPeopleOrderDesc($page);
		$total = People::getTotalPeople();
		$pagination = new Pagination($total, $page, People::SHOW_BY_DEFAULT, 'page-');
		
		require_once(ROOT.'/views/content/people/index.php');
		return true;
	}

	

	public function actionView($id){
		
		$lang = $_SESSION['lang'];
		$new = People::getPeopleById($id);
		$comments = Comments::getCommnetsPeople($id);
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

			$fio  = htmlspecialchars($fio);
			$text = htmlspecialchars($text);

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
					header("Location: /$lang/people/$id#comments");
				}
		}
		require_once(ROOT.'/views/content/people/view.php');
		return true;
	}

	public function actionAjaxSearchPeople($text){
		
		
		
		$text = urldecode($text);
		
		$data = People::searchPeople($text);
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
					$img = Home::getImageCategory($value['people_id'], 'people');
					$name = $value["name"];
					$val .= '"'.$name .'":"'. $img .'"';
					$bool = 1;
				
				}
				print_r('{'.$val.'}');
				die;
			}else
			{
				foreach ($data as $value) {
				echo ' {"'.$value['name'].'": "'.Home::getImageCategory($value['people_id'], 'people').'"}';
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

	public function actionAjaxSearchPeopleResult($text){
		$text = urldecode($text);
		$data = People::searchPeople($text);
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
					$img = Home::getImageCategory($value['people_id'], 'people');
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
				echo '{"name": "'.$value['name'].'", "birth_day":"'.$value['birth_day'].'", "img":"'.Home::getImageCategory($value['people_id'], 'people').'"}';
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