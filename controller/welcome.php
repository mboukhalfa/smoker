<?php

require_once ( 'controller.php' );

if ( userLogedIn () ) { // check that the user not log in

    header('Location: ?' . ACTION . '=home');
    exit ();

}

require_once ( 'view/welcome.php' );