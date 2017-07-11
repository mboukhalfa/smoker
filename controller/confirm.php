<?php


require_once ( $page [ 'model' ] [ 'confirm' ] );
require_once ( $page [ 'controller' ] [ 'controller' ] );

if ( isset ( $_SESSION [ 'email' ] ) && isset ( $_SESSION [ 'passWord' ] ) ) { // check that the user log in
        
    $email = $_SESSION [ 'email' ];
    $passWord = $_SESSION [ 'passWord' ];

    if ( checkSmoker ( $email ) ) {

        if ( password_verify ( $passWord, getHashedPassWord ( $email ) ) ) {

            if ( accountConfirmed ( $email ) ) {

                header( 'Location: ' . $url [ 'home' ] );
                exit ();

            } else { // account not confirmed

                if ( isset ( $_GET [ 'confirmationId' ] ) ) {

                    $confirmationId = clearInput ( $_GET [ 'confirmationId' ] );
                    
                    if ( $confirmationId == getConfirmationId ( $email ) ) {
                        
                        confirmAccount ( $email);
                        $id = getId ( $email );
                        createProfile ( $id );
                        
                        header( 'Location: ' . $url [ 'home' ] );
                        exit ();
                        
                    } else {
                        
                        throw new Exception ( 'Your confirmation ID is not valid' );
                        
                    }

                } else {

                    throw new Exception ( 'We can\'t find id check your URL' );

                }

            }

        }

    }

}

throw new Exception ( 'You must sign in to confirm your account' );
