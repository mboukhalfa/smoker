<?php $title = "Signed Up"; ?>
<?php ob_start(); ?>
<?= $_POST['email'] . ' signed up '; ?>
<?php $contents = ob_get_clean(); ?>

<?php require_once('view/template.php'); ?>
