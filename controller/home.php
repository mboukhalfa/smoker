<?php

require_once ( $page [ 'controller' ] [ 'controller' ] );

if ( userLogedIn () ) {
    $id = getId ( $_SESSION [ 'email' ] );
    $profileId = $id; 
    require_once ( $page [ 'view' ] [ 'home' ] );
    exit();

} else {

    header( 'Location: ' . $url [ 'welcome' ] );
    exit;

}