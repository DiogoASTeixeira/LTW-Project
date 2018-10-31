<?php
include_once(__DIR__ . '\..\templates\common\header.php');
?>

<form action='../actions/action_login.php' method="post">
<label for="uname"><b>Username</b></label>
<input type="text" name="username"><br>

<label for="psw"><b>Password</b></label>
<input type="password" name="password"><br>

<input type="submit">
</form>

<?php
include_once(__DIR__ . '\..\templates\common\footer.php');
?>