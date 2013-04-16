<?php
include_once("../Helpers/HeaderHelper.php");
include_once("../Helpers/FooterHelper.php");
include_once("../Templates/CharacterTemplateGenerator.php");
include_once("../Session/SessionManager.php");
$sessionManager = new SessionManager();
$sessionManager->InSession();

require_once("../Controllers/CharacterController.php");

$member = $_SESSION['user_name'];
$characterTemplateGenerator = new  CharacterTemplateGenerator();

?>
<!DOCTYPE html>
<html>
    <?php HeaderHelper::DrawHeader(); ?>
    <body>
        <h1>Select Character</h1>
        <form method="post" >      
            <label>Choose a Character:</label>
            <?php $characterTemplateGenerator->ListMemeberCharacters($member); ?>

            <button name="SelectCharacter">Select Character</button>
        </form>
        <?php FooterHelper::DrawSessionFooter(); ?>
    </body>
</html>