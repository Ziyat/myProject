<?php

class Functions
{
	public static function getLang()
	{
		$pattern = '(/[a-zA-Z][a-zA-Z]$|/[a-zA-Z][a-zA-Z]/)';
		preg_match($pattern, $_SERVER['REQUEST_URI'], $result);
		$result = preg_replace('(/)', '', $result);
		$_SESSION['lang'] = $result[0];
		return true;
	}

	public static function getTitle()
	{
		$pattern = '(/[a-zA-Z][a-zA-Z]$|/[a-zA-Z][a-zA-Z]/$|/[a-zA-Z][a-zA-Z]/[a-zA-Z]+)';
		preg_match($pattern, $_SERVER['REQUEST_URI'], $result);
		$result = preg_replace('(/)', '', $result);
		$_SESSION['lang'] = $result[0];
		return true;
	}
}