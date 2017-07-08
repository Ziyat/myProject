<?php

/**
* 
*/
class Answer
{
	static public function checkText($text){
		if(isset($text) && strlen($text) > 5)
		{
			return true;
		}
		return false;
	}
	static public function checkEmailExist($appeal_id){
		$db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM appeals WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
	}
	static public function createAnswer($data){
		
		$d = '';
		$c = 0;
		$db = Db::getConnection();

        $sql = 'INSERT INTO answers (user_id, appeal_id, text, file, create_at)'
        		.' VALUES (:user_id, :appeal_id, :text, :file, NOW())';
        	
         $result = $db->prepare($sql);
         $result->bindParam(':user_id', $data['user_id'], PDO::PARAM_INT);
         $result->bindParam(':appeal_id', $data['appeal_id'], PDO::PARAM_INT);
         $result->bindParam(':text', $data['text'], PDO::PARAM_STR);
         $result->bindParam(':file', $data['file'], PDO::PARAM_STR);
         
         if($result->execute())
	     {
	     	$sql2 = "UPDATE appeals SET status = 2 WHERE id = :id";
	     	$result2 = $db->prepare($sql2);
         	$result2->bindParam(':id', $data['appeal_id'], PDO::PARAM_INT);
         	$result2->execute();
	     	return true;

	     }
	     return false;
	}
}