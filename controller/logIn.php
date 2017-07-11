<?php

require_once ( $page [ 'model' ] [ 'logIn' ] );
require_once ( $page [ 'controller' ] [ 'controller' ] );

if ( userLogedIn () ) { // check that the user not log in
    
    header ( 'Location: ' . $url [ 'home' ] );
    exit ();

}

if ( isset ( $_POST [ 'email' ] ) && isset ( $_POST [ 'passWord' ] ) ) {
    
    //variable declaration
    $operation= 'signIn';// display singIn errors in view page
    $valid = true;
    $email = strtolower ( clearInput ( $_POST [ 'email' ] ) );
    $passWord = clearInput ( $_POST [ 'passWord' ] );
    $emailError = '';
    $passWordError = '';

    if ( ! validEmail ( $email ) ) {

        $emailError = 'email not valid';
        $valid = false;

    }

    if ( ! validPassWord ( $passWord ) ) {

        $passWordError = 'Password not valid';
        $valid = false;

    }
    
    if ( $valid ) {

        if ( ! checkSmoker ( $email ) ) {

            $emailError = 'No account mutched to this email address';
            $valid = false;

        } else {

            if ( ! password_verify ( $passWord, getHashedPassWord ( $email ) ) ) {

                $passWordError = 'password incorrect';
                $valid = false;

            }

        }

    }

    if( $valid ) {

        $_SESSION [ 'email' ] = $email;
        $_SESSION [ 'passWord' ] = $passWord;
        header( 'Location: ' . $url [ 'home' ] );
        exit ();

    } else {

        require_once ( $page [ 'view' ] [ 'welcome' ] );
        exit();

    }

} else {

    throw new Exception ( 'Check feilds and Log in again.' );

}
