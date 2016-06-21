<?php $title = $firstName . ' ' . $lastName; ?>
<?php ob_start () ?>
<img src="<?= $photo ?>">
<?php $contents = ob_get_clean (); ?>
<?php require_once('view/template.php'); ?>