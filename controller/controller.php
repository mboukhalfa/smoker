<?php

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

function userLogedIn () {
    
    if ( isset ( $_SESSION [ 'email' ] ) ) { // check that the user not log in
        
        return true;
        
    } else {
        
        return false;
    }
}