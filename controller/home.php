<?php

require_once ( 'controller.php' );

if ( userLogedIn () ) {

    require_once ('view/home.php');
    exit();

} else {

    header('Location: ?' . ACTION . '=welcome');
    exit;

}