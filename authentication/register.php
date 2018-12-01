<?php
include_once('../templates/common/header.php');
?>

<form action='../actions/action_register.php' method="post">
    <label for="uname"><b>Username</b></label>
    <input type="username" name="username" required><br>
    
    <label for="psw"><b>Password</b></label>
    <input type="password" name="password" required><br>

    <input type="submit" value="Register">
</form>

<?php
include_once('../templates/common/footer.php'); 
?> 