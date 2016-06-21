<?php

require_once ( 'model/signUp.php' );
require_once ( 'controller.php' );

if ( userLogedIn () ) { // check that the user not log in

    header('Location: ?' . ACTION . '=home');
    exit ();

}

if ( isset ( $_POST [ 'email' ] ) && isset ( $_POST [ 'passWord' ] ) && isset ( $_POST [ 'firstName' ] ) && isset ( $_POST [ 'lastName' ] ) ) {


    //variable declaration
    $operation='signUp';// display errors in view page
    $valid = true;
    $firstName = ucfirst( strtolower ( clearInput ( $_POST [ 'firstName' ] ) ) );
    $firstNameE = '';
    $lastName = strtoupper ( clearInput ( $_POST [ 'lastName' ] ) );
    $lastNameE = '';
    $email = strtolower ( clearInput ( $_POST [ 'email' ] ) );
    $passWord = clearInput ( $_POST [ 'passWord' ] );
    $emailError = '';
    $passWordError = '';


    if ( ! validName ( $firstName ) ) {
        
        $firstNameE = 'First name not valid';
        $valid = false;
        
    }
    
    if ( ! validName ( $lastName ) ) {
        
        $lastNameE = 'First name not valid';
        $valid = false;
        
    }
    
    if ( ! validEmail ( $email ) ) {

        $emailError = 'email not valid';
        $valid = false;

    }

    if ( $valid && checkSmoker ( $email ) ) {
        
        $emailError = 'An account already exists for this email address';
        $valid = false;
        
    }
    
    if ( ! validPassWord ( $passWord ) ) {

        $passWordError = 'Password not valid';
        $valid = false;

    }

    if ( $valid ) {
        
        $passWordHashed = password_hash ( $passWord, PASSWORD_DEFAULT );
        $confirmationId = uniqid('', true);
        setSmoker ( $firstName, $lastName ,$email, $passWordHashed, $confirmationId );
        $_SESSION [ 'email' ] = $email;
        $_SESSION [ 'passWord' ] = $passWord;
        require_once ( 'view/signedUp.php' );
        exit ();
        
    } else {
        
        require_once ('view/welcome.php');
        exit();
        
    }

} else {

    throw new Exception ( 'Check feilds and sing up again.' );

}


