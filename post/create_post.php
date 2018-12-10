<?php
include_once('../includes/session.php');
include_once('../templates/common/header.php');
if(!isset($_SESSION["username"]))
{
    $_SESSION['msg'] = array('type' => 'warning', 'message' => 'Must log in before creating a post.');
    header("Location: ../authentication/login.php");
}

?>
<section id="create_post">
    <?php
    include_once('../templates/posts/create_post.php');
    ?>
</section>
<?php
include_once('../templates/common/footer.php');
?>