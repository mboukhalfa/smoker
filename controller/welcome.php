<?php

require_once ( $page [ 'controller' ] [ 'controller' ] );

if ( userLogedIn () ) { // check that the user not log in

    header( 'Location: ' . $url [ 'home' ] );
    exit ();

}

require_once ( $page [ 'view' ] [ 'welcome' ] );