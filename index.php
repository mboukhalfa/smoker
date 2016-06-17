<?php

require_once('controller/controller.php');
const ACTION='action';
try {
	if(isset($_GET[ACTION])){
		
        if($_GET[ACTION]== 'signUp') {
			
            signUp();
            
		} else if ( $_GET[ACTION]== 'logIn' ) {
            
            logIn ();
            
        }
	} else {
		welcome();	
	}	
} catch (Exception $e) {
	error($e->getMessage());
}
