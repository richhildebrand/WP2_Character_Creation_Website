<?php
include_once("../Helpers/HeaderHelper.php");
include_once("../Helpers/FooterHelper.php");
include_once("../Database/MemberRepository.php");
include_once("../Session/SessionManager.php");
$sessionManager = new SessionManager();
$sessionManager->InSession();

require_once("../Controllers/AccountController.php");

$userName = $_SESSION['user_name'];
$memberRepository = new MemberRepository();
$userProfile = $memberRepository->GetUserProfile($userName);

?>
<!DOCTYPE html>
<html>
    <?php HeaderHelper::DrawHeader(); ?>
    <body>
        <h1>Edit Profile</h1>
        <h2 class="success"> <?php print($successResult); ?> </h2>
        <form method="post" >
            <h2 name="email">
                <?php print($userProfile->GetEmail());?>
            </h2>

            <label >Enter your firstname</label>
            <input type="text" name="firstname"
            value = <?php print('"' . $userProfile->GetFirstName() . '"'); ?>
             />

            <label >Enter your lastname</label>
            <input type="text" name="lastname"
            value = <?php print('"' . $userProfile->GetLastName() . '"'); ?>
             />
            
            <button name="UpdateProfile">Update Profile</button>
        </form>
        <?php FooterHelper::DrawSessionFooter(); ?>
        <script type="text/javascript" src="../Frontend/Scripts/confirmPasswordsMatch.js"></script>
    </body>
</html>