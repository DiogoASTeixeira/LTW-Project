<?php 
include_once('../templates/common/header.php');
?>

<h3>Change Image:</h3>
<ul>
    <li>1. <img src="../images/profile_example.png" style="width:128px;height:128px;"</li>
    <li>2. <img src="../images/pr.jpg "style="width:128px;height:128px;"</li>
</ul>
 
<form class="change_psw" action="../actions/action_change_password.php" method="post">
    <label for="oldPasswordLabel"><b>Old Password</b></label>
    <input type="password" name="oldPassword" required><br>
    
    <label for="newPasswordLabel"><b>New Password</b></label>
    <input type="password" name="newPassword" required><br>
    
    <label for="confirmPasswordLabel"><b>Confirm Password</b></label>
    <input type="password" name="confirmPassword" required><br>
    
    <input type="submit">
</form>

<?php 
include_once('../templates/common/footer.php');
?>	