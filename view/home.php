<?php $title = "Home"; ?>

<?php ob_start(); ?>

    <?php require_once ( $page [ 'view' ] [ 'nav' ] ); ?>
    
    this is your home page
percenage of peaple think that smoking is good
percenage of peaple think that smoking is bad
percenage of peaple regrette the first cigarette
percenage of peaple think that they will never stop
percenage of peaple try to stop
percenage of women
percenage of men
percenage of boy
some peaple recently stoped
some new people with us
people start about same date as you
peaple stoped about same date as you
peaple visited your profile recently
peaple have same age
peaple from same region



<?php $contents = ob_get_clean(); ?>

<?php require_once( $page [ 'view' ] [ 'template' ] ); ?>
