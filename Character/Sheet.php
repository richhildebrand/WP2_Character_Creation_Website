<?php
include_once("../Models/Character.php");
include_once("../Helpers/HeaderHelper.php");
include_once("../Helpers/FooterHelper.php");
include_once("../Templates/CharacterTemplateGenerator.php");
include_once("../Templates/StatTemplateGenerator.php");
include_once("../Templates/HitPointsTemplateGenerator.php");
include_once("../Session/SessionManager.php");
$sessionManager = new SessionManager();
$sessionManager->InSession();

require_once("../Controllers/CharacterController.php");

$characterTemplateGenerator = new CharacterTemplateGenerator();
$statTemplateGenerator = new StatTemplateGenerator();
$hitPointsTemplateGenerator = new HitPointsTemplateGenerator();
$character = $_SESSION['Character'];

?>
<!DOCTYPE html>
<html>
    <?php HeaderHelper::DrawHeader(); ?>
    <body>
        <h1>Character Sheet</h1>
        <form method="post" >
        	<?php 
            echo $characterTemplateGenerator->ListCharacter($character);
            echo $hitPointsTemplateGenerator->ListCharacterHitPoints($character->GetHitPoints());
            echo '<input name="AdjustHitPoints" type="text" placeholder="Enter New Hit Points" />';
            echo '<button name="UpdateHitPoints" class="basicbutton">Update Hit Points</button>';
        	$statTemplateGenerator->ListCharacterStats($character->GetStats()); ?>
        	<button name="LevelUp" class="basicbutton">Level Up</button>
        </form>
        <?php FooterHelper::DrawSessionFooter(); ?>
    </body>
</html>