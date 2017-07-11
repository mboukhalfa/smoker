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

function dateIsNull ( $date ) {
    
    $date = explode( "-", $date );
    
    if ( implode($date) === "" ) {
    
        return 1;
        
    }
    
    return 0;
    
}

function validDate ( $date ) {
    
    $date = explode( "-", $date );
    
    if ( implode($date) === "" ) {
        
        return 1;
        
    } else if ( ! preg_match('#^([0-9])+$#', implode($date) ) ) {
        
        return 0;
        
    }
    
    $y = intval ( $date [ 0 ] );
    $m = intval ( $date [ 1 ] );
    $d = intval ( $date [ 2 ] );
    
    if ( checkdate ( $m, $d, $y ) ) {
        
        return 1;
    }
    
    return 0;

}
/**
*valid photo passer from user before saving in bdd
*
* User pass photo that can be so havy and that 
* Can be so photo not supported by browser
* for that raison we should verifiy
*@param string name.ext of picture
*@return int 1 if true 0 else
*@author boukhalfa mohammed
*/
function validPhoto ( $photo ) {
    
    if ( $photo ["error"] == 4 ) return 1;
    
    echo $photo["type"];
    $conditionType = ( $photo["type"] == "image/jpeg") || ( $photo["type"] == "image/png") || ( $photo["type"] == "image/pjpeg");
    $conditionSize = $photo [ 'size' ] <= PHOTO_PROFILE_MAX_SIZE;
    $photoExts = array('jpg', 'jpeg', 'png');
    $extension = end ( explode ( '.', $photo ['name'] ) );
    $conditionExtention = in_array ( $extension, $photoExts );
    $condition = $conditionType && $conditionSize && $conditionExtention;
    
    if ( ! $condition ) {
        
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
