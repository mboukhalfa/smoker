<?php $title = "Home"; ?>

<?php ob_start(); ?>

    <?php require_once ( $page [ 'view' ] [ 'nav' ] ); ?>
    
    this is your home page

<?php $contents = ob_get_clean(); ?>

<?php require_once( $page [ 'view' ] [ 'template' ] ); ?>
