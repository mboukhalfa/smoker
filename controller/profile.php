<?php

require_once ( $page [ 'controller' ] [ 'controller' ] );
require_once ( $page [ 'model' ] [ 'profile' ] );

if ( ! userLogedIn () ) { // check that the user not log in
    
    header( 'Location: ' . $url [ 'welcome' ] );
    exit ();

}

if ( isset ( $_GET [ 'profileId' ] ) ) {
    
    $profileId = clearInput ( $_GET [ 'profileId' ] );
    
    if ( profileExists ( $profileId ) ){
        
        $profile = getProfileData ( $profileId );
        
        $firstName = $profile [ 'firstName' ];
        $lastName = $profile [ 'lastName' ];
        $email = $profile [ 'email' ];
        $birthDate = $profile [ 'birthDate' ];
        $birthPlace = $profile [ 'birthPlace' ];
        $residence = $profile [ 'residence' ];
        $photo = $profile [ 'photo' ];
        $firstCigarette = $profile [ 'firstCigarette' ];
        $creationDate = $profile [ 'creationDate' ];
        
        require_once ( $page [ 'view' ] [ 'profile' ] );
        
    } else {
        
        throw new Exception ('profile not found');
        
    }

} else {
    
    throw new Exception ( 'We can\'t find profile ID' );
    
}