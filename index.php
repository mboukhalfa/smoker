<?php

session_set_cookie_params ( 0 , '/' , 'localhost' , false , true );
session_name('usr');
session_start();
session_regenerate_id();



require_once('controller/controller.php');
const ACTION='action';

try {
    
	if ( isset ( $_GET [ ACTION ] ) ) {
		
        if ( $_GET [ ACTION ] == 'signUp' ) {
			
            signUp();
            
		} else if ( $_GET[ACTION]== 'logIn' ) {
            
            logIn ();
            
        } else if ( $_GET[ACTION]== 'logOut' ) {
            
            logOut ();
            
        } else if ( $_GET[ACTION]== 'home' ) {
            
            home ();
            
        } else if ( $_GET[ACTION]== 'welcome' ) {
            // check that user not log in
            welcome ();
            
        } else if ( $_GET[ACTION]== 'error' ) {
            $errorMsg = isset ( $_GET [ 'errorMsg' ] ) ? $_GET['errorMsg'] : ''; 
            throw new Exception ( $errorMsg );
            
        } else {
            
		throw new Exception ( 'Page not found' );
            
	}
        
	} else {
        
		home();	
	}	
    
} catch (Exception $e) {

    error($e->getMessage());

}
