<h3>Change Image:</h3>
<ul>
    <li>1. <img src="../images/profile_example.png" style="width:128px;height:128px;"</li>
    <li>2. <img src="../images/pr.jpg "style="width:128px;height:128px;"</li>
</ul>

<form class="change_psw" action="../actions/action_change_password.php" method="post">
    <label id="oldPswLabel" for="oldPasswordLabel"><b>Old Password</b></label>
    <input id="oldPsw" type="password" name="oldPassword" required><br>

    <label id="newPswLabel" for="newPasswordLabel"><b>New Password</b></label>
    <input id="newPsw" type="password" name="newPassword" required><br>

    <label id="confirmPswLabel" for="confirmPasswordLabel"><b>Confirm Password</b></label>
    <input id="confirmPsw" type="password" name="confirmPassword" required><br>

    <input type="submit" value="Change">
</form>