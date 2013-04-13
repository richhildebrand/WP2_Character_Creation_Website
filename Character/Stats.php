<?php
include_once("../Models/Character.php");
include_once("../Helpers/HeaderHelper.php");
include_once("../Helpers/FooterHelper.php");
include_once("../Templates/StatTemplateGenerator.php");
include_once("../Session/SessionManager.php");
$sessionManager = new SessionManager();
$sessionManager->InSession();

require_once("../Controllers/CharacterController.php");

$statTemplateGenerator = new StatTemplateGenerator();

$character = $_SESSION['Character'];

?>
<!DOCTYPE html>
<html>
    <?php HeaderHelper::DrawHeader(); ?>
    <body>
        <h1>Create Character</h1>
        <form method="post" >
        	<?php 
        	echo $character->GetName();
        	$statTemplateGenerator->ListCharacterStats($character->GetId()); ?>
        </form>
        <?php FooterHelper::DrawSessionFooter(); ?>
    </body>
</html>