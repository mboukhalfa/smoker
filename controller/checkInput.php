<?php

//variable declaration

$valid = true;
$email = $passWord = '';

$erreur = array (
    
    $functionName => array (
        'email' => NULL,
        'passWord' => NULL
        )
);

$email = clearInput ( $_POST [ 'email' ] );
$email = strtolower ( $email );
$passWord = clearInput ( $_POST [ 'passWord' ] );

if ( ! checkEmail ( $email ) ) {

    $erreur  [ $functionName ] [ 'email' ] = 'email not valid';
    $valid = false;
    
}

if ( ! checkPassWord ( $passWord ) ) {
    
    $erreur [ $functionName ] [ 'passWord' ] = 'Password not valid';
    $valid = false;

}


function clearInput ( $input ) {
    
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    
    return $input;
    
}


function checkEmail ( $email ) {

    if ( ! preg_match ( '#^[a-z0-9._-]{3,64}@[a-z0-9._-]{2,64}\.[a-z]{2,4}$#', $email) )
        return 0;
        return 1;

}


function checkPassWord ( $passWord ) {
    
    if ( strlen ( $passWord ) < 8 ) return 0;
    
    return 1;

}