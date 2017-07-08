<?php

/**
* 
*/
class Contacts
{
	static public function getData($lang, $page)
	{
		
		$db = Db::getConnection();
		$sql = 'SELECT meta_k_'. $lang .', meta_d_'. $lang .', title_'. $lang .', content_'. $lang .' FROM page WHERE title_en ="'. $page .'"';
		$result = $db->prepare($sql);
		$result->execute();
		$result= $result->fetch();
		return $result;
	}
}