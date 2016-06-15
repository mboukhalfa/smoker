<?php $title = "Log In";?>
<?php ob_start(); ?>
<header>
<h1>Log In</h1>
</header>
<form action="index.php?action=signUp" method="POST">
<input type="email" name="email">
<input type="password" name="passWord">
<input type="submit" value="Sign Up">
</form>

<?php $contents = ob_get_clean(); ?>

<?php require_once ('view/template.php'); ?>
