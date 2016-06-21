<?php $title = "Home"; ?>
<?php ob_start(); ?>
<?= $_SESSION['email'] . ' home page '; ?>
<a href="index.php?<?= ACTION ?>=logOut">Log Out</a>
<a href="index.php?<?= ACTION ?>=profile&profileId=<?= $profileId ?>">my Pofile</a>
<?php $contents = ob_get_clean(); ?>

<?php require_once('view/template.php'); ?>
