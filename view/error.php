<?php $title = 'Error page'?>

<?php ob_start() ?>
<header>
	<h1>Error page</h1>
</header>
<?= $errorMsg ?>
<?php $contents = ob_get_clean(); ?>
<?php require_once('view/template.php'); ?> 
