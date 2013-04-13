<?php
include_once("../Helpers/HeaderHelper.php");
include_once("../Helpers/FooterHelper.php");
include_once("../Templates/ClassTemplateGenerator.php");
include_once("../Templates/RaceTemplateGenerator.php");
include_once("../Session/SessionManager.php");
$sessionManager = new SessionManager();
$sessionManager->InSession();

require_once("../Controllers/CharacterController.php");

$classTemplateGenerator = new  ClassTemplateGenerator();
$raceTemplateGenerator = new  RaceTemplateGenerator();

?>
<!DOCTYPE html>
<html>
    <?php HeaderHelper::DrawHeader(); ?>
    <body>
        <h1>Create Character</h1>
        <form method="post" >
            <label>Name: </label>
            <input name="CharacterName" type="Text" />            

            <label>Class: </label>
            <?php $classTemplateGenerator->ListClasses(); ?>

            <label> Race: </label>
            <?php $raceTemplateGenerator->ListRaces(); ?>            

            <label>Starting Level: </label>
            <input name="StartingLevel" type="Number" />

            <button name="CreateNewCharacter">Create This Character</button>
        </form>
        <?php FooterHelper::DrawSessionFooter(); ?>
    </body>
</html>




