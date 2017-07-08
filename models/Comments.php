<?php

/**
* 
*/
class Comments
{
	const SHOW_BY_DEFAULT = 15;
	static public function fixtags($text){
			$text = htmlspecialchars($text);
			$text = preg_replace("/=/", "=\"\"", $text);
			$text = preg_replace("/&quot;/", "&quot;\"", $text);
			$tags = "/&lt;(\/|)(\w*)(\ |)(\w*)([\\\=]*)(?|(\")\"&quot;\"|)(?|(.*)?&quot;(\")|)([\ ]?)(\/|)&gt;/i";
			$replacement = "<$1$2$3$4$5$6$7$8$9$10>";
			$text = preg_replace($tags, $replacement, $text);
			$text = preg_replace("/=\"\"/", "=", $text);
			return $text;
			}
	static public function getCommnetsNews($id){
		$db = Db::getConnection();

        $sql = 'SELECT * FROM comments WHERE news_id = :id ORDER BY comment_id DESC LIMIT '. self::SHOW_BY_DEFAULT;
        $comments = $db->prepare($sql);
        $comments->bindParam(':id', $id, PDO::PARAM_STR);
        $comments->execute();
		$comments = $comments->fetchAll(PDO::FETCH_ASSOC);

		$sql = 'SELECT * FROM comments_answers';
        $comments_answers = $db->prepare($sql);
        $comments_answers->execute();
		$comments_answers = $comments_answers->fetchAll(PDO::FETCH_ASSOC);
		for ($i=0; $i < count($comments); $i++) { 
			
			for ($j=0; $j < count($comments_answers); $j++) { 
				if($comments_answers[$j]['comment_id'] == $comments[$i]['comment_id'])
				{
					$newCom[$i] = array('comment' => $comments[$i], 'answer' => $comments_answers[$j]);
				}
			}
			$newCom[$i]['comment'] = $comments[$i];
		}
		return $newCom;
	}
	static public function getMoreCommnetsNews($id, $offset){
		$db = Db::getConnection();

        $sql = 'SELECT * FROM comments WHERE news_id = :id ORDER BY comment_id DESC LIMIT '. self::SHOW_BY_DEFAULT.' OFFSET '. $offset;
        $comments = $db->prepare($sql);
        $comments->bindParam(':id', $id, PDO::PARAM_STR);
        $comments->execute();
		$comments = $comments->fetchAll(PDO::FETCH_ASSOC);

		$sql = 'SELECT * FROM comments_answers';
        $comments_answers = $db->prepare($sql);
        $comments_answers->execute();
		$comments_answers = $comments_answers->fetchAll(PDO::FETCH_ASSOC);
		for ($i=0; $i < count($comments); $i++) { 
			
			for ($j=0; $j < count($comments_answers); $j++) { 
				if($comments_answers[$j]['comment_id'] == $comments[$i]['comment_id'])
				{
					$newCom[$i] = array('comment' => $comments[$i], 'answer' => $comments_answers[$j]);
				}
			}
			$newCom[$i]['comment'] = $comments[$i];
		}
		return $newCom;
	}
	static public function getCommnetsPrevention($id){
		$db = Db::getConnection();

        $sql = 'SELECT * FROM comments WHERE prevention_id = :id ORDER BY comment_id DESC LIMIT '. self::SHOW_BY_DEFAULT;
        $comments = $db->prepare($sql);
        $comments->bindParam(':id', $id, PDO::PARAM_STR);
        $comments->execute();
		$comments = $comments->fetchAll(PDO::FETCH_ASSOC);

		$sql = 'SELECT * FROM comments_answers';
        $comments_answers = $db->prepare($sql);
        $comments_answers->execute();
		$comments_answers = $comments_answers->fetchAll(PDO::FETCH_ASSOC);
		for ($i=0; $i < count($comments); $i++) { 
			
			for ($j=0; $j < count($comments_answers); $j++) { 
				if($comments_answers[$j]['comment_id'] == $comments[$i]['comment_id'])
				{
					$newCom[$i] = array('comment' => $comments[$i], 'answer' => $comments_answers[$j]);
				}
			}
			$newCom[$i]['comment'] = $comments[$i];
		}
		return $newCom;
	}
	static public function createNewComment($fio, $text, $news_id, $prevention_id)
	{
		$db = Db::getConnection();
		$sql = 'INSERT INTO comments (news_id, prevention_id, name, text, create_at) VALUES (:news_id, :prevention_id, :name, :text, NOW())';
        $comments = $db->prepare($sql);

        $comments->bindParam(':news_id', $news_id, PDO::PARAM_INT);
        $comments->bindParam(':prevention_id', $prevention_id, PDO::PARAM_INT);
        $comments->bindParam(':name', $fio, PDO::PARAM_STR);
        $comments->bindParam(':text', $text, PDO::PARAM_STR);
        return $comments->execute();
	}

	static public function getCommentsOrderDescAdmin($page){
		$page = intval($page);
		$offset = ($page - 1) * self::SHOW_BY_DEFAULT;
		// $db = Db::getConnection();
		// $sql = 'SELECT * FROM comments ORDER BY create_at DESC LIMIT '. self::SHOW_BY_DEFAULT .' OFFSET '. $offset;
		// $result = $db->prepare($sql);
		// $result->execute();
		// $result = $result->fetchAll(PDO::FETCH_ASSOC);
		// return $result;
		$db = Db::getConnection();

        $sql = 'SELECT * FROM comments ORDER BY create_at DESC LIMIT '. self::SHOW_BY_DEFAULT .' OFFSET '. $offset;;
        $comments = $db->prepare($sql);
        $comments->execute();
		$comments = $comments->fetchAll(PDO::FETCH_ASSOC);

		$sql = 'SELECT * FROM comments_answers';
        $comments_answers = $db->prepare($sql);
        $comments_answers->execute();
		$comments_answers = $comments_answers->fetchAll(PDO::FETCH_ASSOC);
		for ($i=0; $i < count($comments); $i++) { 
			
			for ($j=0; $j < count($comments_answers); $j++) { 
				if($comments_answers[$j]['comment_id'] == $comments[$i]['comment_id'])
				{
					$newCom[$i] = array('comment' => $comments[$i], 'answer' => $comments_answers[$j]);
				}
			}
			$newCom[$i]['comment'] = $comments[$i];
		}
		return $newCom;
	}

	static public function getTotalComments()
	{
		$db = Db::getConnection();
		$sql = 'SELECT COUNT(comment_id) AS count FROM comments';
		$result = $db->prepare($sql);
		$result->execute();
		$result = $result->fetch(PDO::FETCH_ASSOC);
		return $result['count'];
	}

	static public function getCommentsById($id)
	{
		$db = Db::getConnection();
		$sql = 'SELECT * FROM comments WHERE comment_id = :id';
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		$result->execute();
		$result = $result->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	static public function updateComments($data)
	{
		$db = Db::getConnection();
		$sql = 'UPDATE comments SET	name = :name, text = :text	WHERE comment_id = :id';
		$result = $db->prepare($sql);
		$result->bindParam(':name', $data['name'], PDO::PARAM_STR);
		$result->bindParam(':text', $data['text'], PDO::PARAM_STR);
		$result->bindParam(':id', $data['comment_id'], PDO::PARAM_STR);
		return $result->execute();
	}

	static public function deleteComments($id)
	{
		$db = Db::getConnection();

		$sql = 'DELETE FROM comments WHERE comment_id = :id';
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		return $result->execute();
	}
}