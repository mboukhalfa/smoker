<?php

require_once ( 'model/signUp.php' );
require_once ( 'controller.php' );

if ( userLogedIn () ) { // check that the user not log in

    header('Location: ?' . ACTION . '=home');
    exit ();

}

if ( isset ( $_POST [ 'email' ] ) && isset ( $_POST [ 'passWord' ] ) ) {


    //variable declaration

    $valid = true;
    $email = strtolower ( clearInput ( $_POST [ 'email' ] ) );
    $passWord = clearInput ( $_POST [ 'passWord' ] );
    $birthDate = '04/01/1994';
    $emailError = '';
    $passWordError = '';

    if ( ! checkEmail ( $email ) ) {

        $emailError = 'email not valid';
        $valid = false;

    }

    if ( ! checkPassWord ( $passWord ) ) {

        $passWordError = 'Password not valid';
        $valid = false;

    }

    if ( $valid && checkSmoker ( $email ) ) {
        
        $emailError = 'An account already exists for this email address';
        $valid = false;
        
    }
    
    if ( $valid ) {
        
        $passWordHashed = password_hash ( $passWord, PASSWORD_DEFAULT );
        setSmoker ( $email, $passWordHashed );
        require_once ( 'view/signedUp.php' );
        exit ();
        
    } else {
        
        require_once ('view/welcome.php');
        exit();
        
    }

} else {

    throw new Exception ( 'Check feilds and sing up again.' );

}


