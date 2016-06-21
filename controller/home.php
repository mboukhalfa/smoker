<?php

require_once ( 'controller.php' );

if ( userLogedIn () ) {
    $id = getId ( $_SESSION [ 'email' ] );
    $profileId = $id; 
    require_once ('view/home.php');
    exit();

} else {

    header('Location: ?' . ACTION . '=welcome');
    exit;

}