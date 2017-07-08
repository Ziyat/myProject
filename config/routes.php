<?php
$patternLang = '([a-zA-Z][a-zA-Z])';
$patternId = '([0-9]+)';
$patterntext = '([0-9a-zA-Z_%]+)';
$patterntextCyr = '([а-яА-Яa-zA-Z0-9%]+)';

	// Маршруты ЧПУ
	return array(
		'switch/'.$patternLang => 'home/langSwitch/$1',
		
		//Регистрация и Авторизация
		$patternLang.'/user/register'  => 'user/register',
		$patternLang.'/user/login'  => 'user/login',
		$patternLang.'/user/logout'  => 'user/logout',
		$patternLang.'/admin/user/delete/'.$patternId => 'user/delete/$2',
		$patternLang.'/admin/user/update/'.$patternId => 'user/update/$2',
		$patternLang.'/admin/user/page-'.$patternId => 'user/index/$2',
		$patternLang.'/admin/user'  => 'user/index',

		// 'user/restore'  => 'user/restore',
		
			
		
		$patternLang.'/admin/answer/create/'.$patternId => 'adminAnswer/create/$2',
		$patternLang.'/admin/answer/update/'.$patternId => 'adminAnswer/update/$2',
		$patternLang.'/admin/answer/delete/'.$patternId => 'adminAnswer/delete/$2',
		$patternLang.'/admin/answer' => 'adminAnswer/index',

		$patternLang.'/admin/appeals/create' => 'adminAppeal/create',
		$patternLang.'/admin/appeals/update/'.$patternId => 'adminAppeal/update/$2',
		$patternLang.'/admin/appeals/view/'.$patternId => 'adminAppeal/view/$2',
		$patternLang.'/admin/appeals' => 'adminAppeal/index',


		// без вести пропавшие
		$patternLang.'/admin/missing/create' => 'adminMissing/create',
		$patternLang.'/admin/missing/delete/'.$patternId => 'adminMissing/delete/$2',
		$patternLang.'/admin/missing/update/'.$patternId => 'adminMissing/update/$2',
		$patternLang.'/admin/missing/page-'.$patternId => 'adminMissing/index/$2',
		$patternLang.'/admin/missing' => 'adminMissing/index',

		// Разыскиваемые лица
		$patternLang.'/admin/people/create' => 'adminPeople/create',
		$patternLang.'/admin/people/delete/'.$patternId => 'adminPeople/delete/$2',
		$patternLang.'/admin/people/update/'.$patternId => 'adminPeople/update/$2',
		$patternLang.'/admin/people/page-'.$patternId => 'adminPeople/index/$2',
		$patternLang.'/admin/people' => 'adminPeople/index',

		// День профилактики
		$patternLang.'/admin/prevention/create' => 'adminPrevention/create',
		$patternLang.'/admin/prevention/delete/'.$patternId => 'adminPrevention/delete/$2',
		$patternLang.'/admin/prevention/update/'.$patternId => 'adminPrevention/update/$2',
		$patternLang.'/admin/prevention/page-'.$patternId => 'adminPrevention/index/$2',
		$patternLang.'/admin/prevention' => 'adminPrevention/index',

		// Новости
		$patternLang.'/admin/news/create' => 'adminNews/create',
		$patternLang.'/admin/news/delete/'.$patternId => 'adminNews/delete/$2',
		$patternLang.'/admin/news/update/'.$patternId => 'adminNews/update/$2',
		$patternLang.'/admin/news/page-'.$patternId => 'adminNews/index/$2',
		$patternLang.'/admin/news' => 'adminNews/index',
		
		// Комментарий
		$patternLang.'/admin/comments/create' => 'adminComments/create',
		$patternLang.'/admin/comments/delete/'.$patternId => 'adminComments/delete/$2',
		$patternLang.'/admin/comments/update/'.$patternId => 'adminComments/update/$2',
		$patternLang.'/admin/comments/page-'.$patternId => 'adminComments/index/$2',
		$patternLang.'/admin/comments' => 'adminComments/index',

		
		//Административная часть
		$patternLang.'/admin'  => 'admin/index',
		
		//Кабинет
		$patternLang.'/cabinet/edit' => 'cabinet/edit',
		$patternLang.'/cabinet' => 'cabinet/index',


		// Без вести пропавшие
		'missing/search/result/'.$patterntextCyr => 'missing/ajaxSearchMissingResult/$1',
		'missing/search/'.$patterntextCyr => 'missing/ajaxSearchMissing/$1',
		$patternLang.'/missing/'.$patternId => 'missing/view/$2',
		$patternLang.'/missing/page-'.$patternId => 'missing/index/$2',
		$patternLang.'/missing' => 'missing/index',

		// Разыскиваемые лица
		'people/search/result/'.$patterntextCyr => 'people/ajaxSearchPeopleResult/$1',
		'people/search/'.$patterntextCyr => 'people/ajaxSearchPeople/$1',
		$patternLang.'/people/'.$patternId => 'people/view/$2',
		$patternLang.'/people/page-'.$patternId => 'people/index/$2',
		$patternLang.'/people' => 'people/index',

		//День профилактики
		$patternLang.'/prevention/'.$patternId => 'prevention/view/$2',
		$patternLang.'/prevention/page-'.$patternId => 'prevention/index/$2',
		$patternLang.'/prevention' => 'prevention/index',
		//Новости
		$patternLang.'/news/'.$patternId => 'news/view/$2',
		$patternLang.'/news/page-'.$patternId => 'news/index/$2',
		$patternLang.'/news' => 'news/index',
		$patternLang.'/appeals' => 'home/appeals',
		'appeals/check/'.$patterntext.'/'.$patterntext => 'home/ajaxCheckAppeal/$1/$2',
		'comments/more/'.$patterntext.'/'.$patterntext => 'home/ajaxMoreComments/$1/$2',
		$patternLang.'/appeals' => 'home/appeals',
		$patternLang.'/reception' => 'home/reception',
		$patternLang.'/leadership' => 'home/leadership',
		$patternLang.'/questions' => 'home/questions',
		$patternLang.'/documents' => 'home/documents',
		$patternLang.'' => 'home/home/$1',
		'' => 'home/index'
		);