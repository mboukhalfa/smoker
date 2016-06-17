<?php

require_once ( 'model/model.php' );

function welcome () {
    
	require_once ( 'view/logIn.php' );

} // welcome ();

function logIn () {
    
    if ( isset ( $_POST [ 'email' ] ) && isset ( $_POST [ 'passWord' ] ) ) {
    
    $functionName = __FUNCTION__;
    require_once ( 'controller/checkInput.php' );
    
    if( $valid ) {

        if ( ! checkSmoker ( $email ) ) {

            $erreur [ $functionName ] [ 'email' ] = (  'No account mutched to this email address' );

            $valid = false;

        } else {

            if ( ! password_verify ( $passWord, getHashedPassWord ( $email ) ) ) {

                $erreur [ $functionName ] [ 'passWord' ] = 'password incorrect';
                $valid = false;

            }

        }
        
    }
    
    if( $valid ) {
    
        require_once ('view/home.php');
        exit();
    
    } else {
        
        require_once ('view/logIn.php');
        exit();
        
    }
        
    } else {
        
		throw new Exception ( 'Check feilds and Log in again.' );
	
    }
    
} // logIn ();

function signUp () {
    
	if ( isset ( $_POST [ 'email' ] ) && isset ( $_POST [ 'passWord' ] ) ) {
        
        $functionName = __FUNCTION__;
        require_once ( 'controller/checkInput.php' );
        
        if( ! $valid ) {
    
            require_once ('view/logIn.php');
            exit();
    
        }
        
        $passWord = password_hash ( $passWord, PASSWORD_DEFAULT );
        
        if ( ! checkSmoker ( $email ) ) {
            
            setSmoker ( $email, $passWord );
            require_once ( 'view/signedUp.php' );
            
        } else {
            
           $erreur  [ 'signUp' ] [ 'email' ] = 'An account already exists for this email address'; 
            require_once ('view/logIn.php');
            exit();
            
        }
        
	} else {
        
		throw new Exception ( 'Check feilds and sing up again.' );
	
    }
} // signUp ();


function Error ( $errorMsg ) {
    
	require_once ( 'view/error.php' );

} // Error ();
