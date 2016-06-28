<?php $title = $firstName . ' ' . $lastName; ?>

<?php ob_start () ?>
    <?php
        $sexTerm = array (
            'M' => 'Mr. ',
            'W' => 'M. ',
            ''  => '',
        );
    ?>
    <?php require_once ( $page [ 'view' ] [ 'nav' ] ); ?>

    <a href="<?= $url [ 'myProfile' ] . '&edit'?>"> edit your profile</a>
    <br/>
    <img src="<?= 'test/' . $photo ?>" style="max-width: 160px;">
    <?= $sexTerm [$sex] . $firstName . ' ' . $lastName ?>
    <br/>
    
<?php $contents = ob_get_clean (); ?>

<?php require_once( $page [ 'view' ] [ 'template' ] ); ?>