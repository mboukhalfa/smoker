<?php

require_once ( $page [ 'model' ] [ 'model' ] );

function clearInput ( $input ) {
    
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    
    return $input;
    
}

function validName ( $name ) {
    
    if ( ! preg_match ( '#^[a-zA-Z]{3,30}$#', $name ) )
        
        return 0;
    
    return 1;
}

function validEmail ( $email ) {

    if ( ! preg_match ( '#^[a-z0-9._-]{3,64}@[a-z0-9._-]{2,64}\.[a-z]{2,4}$#', $email) )
        
        return 0;
    
    return 1;

}


function validPassWord ( $passWord ) {
    
    if ( strlen ( $passWord ) < 8 ) return 0;
    
    return 1;

}

function validSex ( $sex ) {
    
    if ( preg_match ( '#^(M|W)$#', $sex )   ) return 1;
    
    return 0;

}

function validPhoto ( $photo ) {
    
    if ( $photo ["error"] == 4 ) return 1;
    
    $photoExts = array('jpg', 'jpeg', 'png');
    $extension = end ( explode ( '.', $photo ['name'] ) );
    
    if (!(
        (
            
            ( $photo["type"] == "image/jpeg")
         || ( $photo["type"] == "image/png")
         || ( $photo["type"] == "image/pjpeg")
        
        )
        
        && ($photo [ 'size' ] < 2000000)
        && in_array($extension, $photoExts)
        
        )
        ) {
        return 0;
    }
        
        if ( $photo [ 'error' ] > 0) {
            
            throw new Exception ( $_FILES["file"]["error"] );
        
        } 
        
    return 1;

}

function userLogedIn () {
    
    if ( isset ( $_SESSION [ 'email' ] ) && isset ( $_SESSION [ 'passWord' ] ) ) { // check that the user not log in
        
        $email = $_SESSION [ 'email' ];
        $passWord = $_SESSION [ 'passWord' ];
        
        if ( checkSmoker ( $email ) ) {
            
            if ( password_verify ( $passWord, getHashedPassWord ( $email ) ) ) {
                
                if ( accountConfirmed ( $email ) ) {
                
                    return true;
                
                } else {
                    
                    require_once ( $page [ 'view' ] [ 'signedUp' ] );
                    exit ();
                
                }
                
            }
            
        }
    
    }
    
    return false;
}
