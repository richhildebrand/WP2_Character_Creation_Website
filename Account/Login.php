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
        <h1>Login to Paul's Pizza Palace</h1>
        <form method="post">
            <label >Email</label>
            <input type="email" maxlength="250" required autofocus name="email" />
            <span class="error"> <?php print($errorResult) ?> </span>

            <label >Password</label>
            <input type="password" maxlength="250" required name="password" />

            <button name="Login">Login</button>
        </form>
        <?php FooterHelper::DrawAnonymousFooter(); ?>
    </body>
</html>