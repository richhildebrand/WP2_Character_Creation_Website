<?php

class FooterHelper
{
	public static function DrawSessionFooter()
	{
		print('<footer>');
			print('<a href="../Character/Create.php" class="basicbutton">Create New Character</a>');
			print('<a href="../Character/Select.php" class="basicbutton">Select Character</a>');
			//print('<a href="../Character/Sheet.php" class="basicbutton">View Character Sheet</a>');
	        
	        //print('<div class="adminFooterLinks">');
	        	print('<a href="../Account/Edit-Profile.php" class="basicbutton">Edit Profile</a>');
	        	print('<a href="../index.html" class="basicbutton">Log Out</a>');
				print('</div>');
	    print('</footer>');
	} 

	public static function DrawAnonymousFooter()
	{
		print('<footer>');
	        print('<a href="../index.html" class="basicbutton">Back</a>');
	        //print('<a href="../Account/Register.php" class="basicbutton">Register</a>');
	        //print('<a href="../Account/Forgot-Password.php" class="basicbutton">Forgot Password</a>');
	    print('</footer>');
	}
}