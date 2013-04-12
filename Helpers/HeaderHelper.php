<?php

class HeaderHelper
{
	public static function DrawHeader()
	{
    	print('<head>');
	        print('<meta content="text/html;charset=utf-8" http-equiv="Content-Type">');
			print('<title> D&D for me </title>');
	        print('<link rel=StyleSheet href="../Frontend/Styles/site.css" type="text/css">');
    	print('</head>');
	}
}