<?php $title = $firstName . ' ' . $lastName; ?>

<?php ob_start () ?>

    <?php require_once ( $page [ 'view' ] [ 'nav' ] ); ?>
    
    <img src="<?= $photo ?>">

<?php $contents = ob_get_clean (); ?>

<?php require_once( $page [ 'view' ] [ 'template' ] ); ?>