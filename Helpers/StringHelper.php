<?php

class StringHelper
{
	public static function IsNullOrEmptyString($question)
	{
		return (!isset($question) || trim($question)==='');
	}

	public static function AreNullOrEmptyString($str1, $str2, $str3 = "notPassed", $str4 = "notPassed", $str4 = "notPassed")
	{
	    return StringHelper::IsNullOrEmptyString($str1) || StringHelper::IsNullOrEmptyString($str2) || 
	    	   StringHelper::IsNullOrEmptyString($str3) || StringHelper::IsNullOrEmptyString($str4) ||
	    	   StringHelper::IsNullOrEmptyString($str5);
	}
}