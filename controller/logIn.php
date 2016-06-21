<?php

require_once ( 'model/logIn.php' );
require_once ( 'controller.php' );

if ( userLogedIn () ) { // check that the user not log in
    
    header('Location: ?' . ACTION . '=home');
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
        header('Location: index.php?'. ACTION . '=home');
        exit ();

    } else {

        require_once ('view/welcome.php');
        exit();

    }

} else {

    throw new Exception ( 'Check feilds and Log in again.' );

}
