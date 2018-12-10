<?php
include_once('../includes/session.php');
include_once('../templates/common/header.php');

if(isset($_SESSION['username']))
{
    $_SESSION['msg'] = array('type' => 'warning', 'message' => 'You are already logged in.'); 
    header("Location: ../index/index.php");
}
?>
<section id="register">
    <?php
    include_once('../templates/authentication/register.php');
    ?>
</section>
<?php
include_once('../templates/common/footer.php'); 
?> 