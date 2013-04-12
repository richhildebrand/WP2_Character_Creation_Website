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
    <body>
        <h1>Register</h1>
        <form method="post" >
            <label >Enter your email address</label>
            <input type="email" required autofocus name="email" />
            <span class="error"> <?php print($errorResult) ?> </span>
            
            <label >Create a password between 5 and 250 characters</label>
            <input type="password" pattern=".{5,250}" required 
                   name="password" id="password" onkeyup="confirmPasswordsMatch()"/>
            <span id="password-warning-one" class="error hide"> Your Passwords do not match </span>

            <label >Confirm your password</label>
            <input type="password" pattern=".{5,250}" required 
                   name="confirm-password" id="confirm-password" onkeyup="confirmPasswordsMatch()"/>
            <span id="password-warning-two" class="error hide"> Your Passwords do not match </span>

            <button name="Register">Register</button>
        </form>
        <?php FooterHelper::DrawAnonymousFooter(); ?>
        <script type="text/javascript" src="../Frontend/Scripts/confirmPasswordsMatch.js"></script>
    </body>
</html>