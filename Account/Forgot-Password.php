<?php

include_once("../Helpers/FooterHelper.php");
include_once("../Helpers/HeaderHelper.php");
include_once("../Session/SessionManager.php");
$sessionManager = new SessionManager();
$sessionManager->NotInSession();

require_once("../Controllers/AccountController.php");

?>
<!DOCTYPE html>
<html>
    <?php HeaderHelper::DrawHeader(); ?>
	<link rel="stylesheet" type="text/css" href="../Frontend/Styles/site.css">
    <body>
        <h1>Get a New Password</h1>
        <form method="post" >
			<center>
            <label >Email</label>
            <input type="email" maxlength="250" required autofocus name="email" />
            <span class="error"> <?php print($errorResult) ?> </span>
			
			<br/><br/>
            <button name="ForgotPassword" class="basicbutton">Send Password</button>
			</center>
        </form>
        <?php FooterHelper::DrawAnonymousFooter(); ?>
    </body>
</html>