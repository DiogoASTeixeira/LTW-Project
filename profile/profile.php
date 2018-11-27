<?php 
include_once('../templates/common/header.php');
?>	

<img src="../images/profile_example.png" alt="Profile Picture" style="width:128px;height:128px;">
<p> <?=$_SESSION["username"]?> </p>

<a href="../profile/edit_profile.php"> Edit Profile </a>

<?php
    include_once('../templates/common/footer.php');
?>