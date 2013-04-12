<?php

class ServerManager
{
		public function LoadServerSettings()
		{
			$this->EnableHttps();
			$this->EnableDebugging();
			$this->DisableJavaScriptAccessToCookies();
		}


		private function EnableHttps()
		{
			// force https only on webdev
			if ( $_SERVER['HTTP_HOST'] == 'webdev.cs.kent.edu' && $_SERVER['HTTPS'] != 'on') {
			    header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
			}
		}

		private function EnableDebugging()
		{
			ini_set('display_errors', 'On');
			error_reporting(E_ALL | E_STRICT);	
		}

		private function DisableJavaScriptAccessToCookies()
		{
			ini_set('session.cookie_httponly', true);
		}
}