<?php

class FooterHelper
{
	public static function DrawSessionFooter()
	{
		print('<footer>');
			print('<a href="../Character/Create.php">Create New Character</a>');
			print('<a href="../Character/Select.php">Select Character</a>');
			print('<a href="../Character/Sheet.php">View Character Sheet</a>');
	        
	        print('<div class="adminFooterLinks">');
	        	print('<a href="../index.html">Home</a>');
	        	print('<a href="../Account/Edit-Profile.php">Edit Profile</a>');
        	print('</div>');
	    print('</footer>');
	} 

	public static function DrawAnonymousFooter()
	{
		print('<footer>');
	        print('<a href="../Account/Login.php">Login</a>');
	        print('<a href="../Account/Register.php">Register</a>');
	        print('<a href="../Account/Forgot-Password.php">Forgot Password</a>');
	    print('</footer>');
	}
}