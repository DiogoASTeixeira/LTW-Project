<?php
include_once(__DIR__ . '/../templates/common/header.php');
?>

<form action='../actions/action_register.php' method="post">
<label for="uname"><b>Username</b></label>
<input type="text" name="username" required><br>

<label for="mail"><b>Password</b></label>
<input type="email" name="email" required><br>

<label for="psw"><b>Password</b></label>
<input type="password" name="password" required><br>

<input type="submit">
</form>

<?php
include_once(__DIR__ . '/../templates/common/footer.php');
?>