<?php $title = "Signed Up"; ?>
<?php ob_start(); ?>
<?= $email . ' signed up '; ?>
<i>We have send an email to <?= $email ?> </i>
<b>Please confirme your account</b>
<a href=" <?= $url [ 'confirm' ] . '&confirmationId=' . $confirmationId ?> "> Confirm your account <a/>
<?php $contents = ob_get_clean(); ?>

<?php require_once( $page [ 'view' ] [ 'template' ] ); ?>
