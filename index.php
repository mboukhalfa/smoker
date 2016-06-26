<?php

session_set_cookie_params ( 0 , '/' , 'localhost' , false , true );
session_name('usr');
session_start();
session_regenerate_id();

include_once ('global/config.php');


try {
    
	if ( isset ( $_GET [ ACTION ] ) ) {
		
        switch ( $_GET [ ACTION ] ) {

            case 'welcome':

                require_once ( $page [ 'controller' ] [ 'welcome' ] );
                break;

            case 'signUp':

                require_once ( $page [ 'controller' ] [ 'signUp' ] );
                break;
            case 'accountConfirmation':

                require_once ( $page [ 'controller' ] [ 'confirm' ] );
                break;

            case 'logIn':

                require_once ( $page [ 'controller' ] [ 'logIn' ] );
                break;

            case 'logOut':

                require_once ( $page [ 'controller' ] [ 'logOut' ] );
                break;

            case 'home':

                require_once ( $page [ 'controller' ] [ 'home' ] );
                break;
            
            case 'profile':

                require_once ( $page [ 'controller' ] [ 'profile' ] );
                break;

            case 'error':

                $errorMsg = isset ( $_GET [ 'errorMsg' ] ) ? $_GET['errorMsg'] : ''; 
                throw new Exception ( $errorMsg );

            default :

                throw new Exception ( 'Page not found' );	
                break;
        }
        
	} else {
        
		require_once ( $page [ 'controller' ] [ 'home' ] );
	}	
    
} catch (Exception $e) {

    require_once ( $page [ 'controller' ] [ 'error' ] );

}