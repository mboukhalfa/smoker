<?php

session_set_cookie_params ( 0 , '/' , 'localhost' , false , true );
session_name('usr');
session_start();
session_regenerate_id();

define ('ACTION' ,'q');
define ('BASE_URL' ,'/smoker/');

try {
    
	if ( isset ( $_GET [ ACTION ] ) ) {
		
        switch ( $_GET [ ACTION ] ) {

            case 'welcome':

                require_once ( 'controller/welcome.php' );
                break;

            case 'signUp':

                require_once ( 'controller/signUp.php' );
                break;
            case 'accountConfirmation':

                require_once ( 'controller/confirm.php' );
                break;

            case 'logIn':

                require_once ( 'controller/logIn.php' );
                break;

            case 'logOut':

                require_once ( 'controller/logOut.php' );
                break;

            case 'home':

                require_once ( 'controller/home.php' );
                break;
            
            case 'profile':

                require_once ( 'controller/profile.php' );
                break;

            case 'error':

                $errorMsg = isset ( $_GET [ 'errorMsg' ] ) ? $_GET['errorMsg'] : ''; 
                throw new Exception ( $errorMsg );

            default :

                throw new Exception ( 'Page not found' );	
                break;
        }
        
	} else {
        
		require_once ( 'controller/home.php' );
	}	
    
} catch (Exception $e) {

    require_once ( 'controller/error.php' );

}