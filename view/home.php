<?php $title = "Home"; ?>
<?php ob_start(); ?>
<?= $_POST['email'] . ' home page '; ?>
<?php $contents = ob_get_clean(); ?>

<?php require_once('view/template.php'); ?>
