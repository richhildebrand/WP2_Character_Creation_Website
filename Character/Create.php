<?php
include_once("../Helpers/HeaderHelper.php");
include_once("../Helpers/FooterHelper.php");
include_once("../Templates/ClassTemplateGenerator.php");
include_once("../Session/SessionManager.php");
$sessionManager = new SessionManager();
$sessionManager->InSession();

$classTemplateGenerator = new  ClassTemplateGenerator();

?>
<!DOCTYPE html>
<html>
    <?php HeaderHelper::DrawHeader(); ?>
    <body>
        <h1>Create Character</h1>
        <form method="post" >
            <?php $classTemplateGenerator->ListClasses(); ?>
        </form>
        <?php FooterHelper::DrawSessionFooter(); ?>
        <script type="text/javascript" src="../Frontend/Scripts/confirmPasswordsMatch.js"></script>
    </body>
</html>




