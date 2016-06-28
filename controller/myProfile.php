<?php
/***

this will be myProfile controlle profile of user loged in don't need profile id
page profile return any user profile exept the user loged in

***/
require_once ( $page [ 'controller' ] [ 'controller' ] );
require_once ( $page [ 'model' ] [ 'profile' ] );
require_once ( $page [ 'model' ] [ 'myProfile' ] );

if ( ! userLogedIn () ) { // check that the user not log in
    
    header( 'Location: ' . $url [ 'welcome' ] );
    exit ();

}

$myId = getId ( $_SESSION [ 'email' ] );

$profile = getProfileData ( $myId );

$firstName = $profile [ 'firstName' ];
$lastName = $profile [ 'lastName' ];
$email = $profile [ 'email' ];
$sex = $profile [ 'sex' ];
$birthDate = $profile [ 'birthDate' ];
$birthPlace = $profile [ 'birthPlace' ];
$residence = $profile [ 'residence' ];
$photo = $profile [ 'photo' ];
$firstCigarette = $profile [ 'firstCigarette' ];
$regret = $profile [ 'regret' ];
$hopeStop = $profile [ 'hopeStop' ];
$loveSmoking = $profile [ 'loveSmoking' ];
$creationDate = $profile [ 'creationDate' ];

if ( isset ( $_GET [ 'edit' ] ) ) {

    $saveChangesAlert = '';
    $firstNameE = '';
    $lastNameE = '';
    $sexE = '';
    $photoE = '';
    
    if ( isset ( $_POST [ 'save' ] ) ) {

        $valid = true;

        $firstName = isset ( $_POST [ 'firstName' ] ) ? ucfirst( strtolower ( clearInput ( $_POST [ 'firstName' ] ) ) ) : $profile [ 'firstName' ];
        $lastName = isset ( $_POST [ 'lastName' ] ) ? strtoupper ( clearInput ( $_POST [ 'lastName' ] ) ) : $profile [ 'lastName' ];
        $sex =  isset ( $_POST [ 'sex' ] ) ? clearInput ( $_POST [ 'sex' ] ) : $profile [ 'sex' ];
        
        print_r($_FILES);
        if ( ! validName ( $firstName ) ) {

            $firstNameE = 'First name not valid';
            $valid = false;

        }

        if ( ! validName ( $lastName ) ) {

            $lastNameE = 'First name not valid';
            $valid = false;

        }

        if ( ! validSex ( $sex ) ) {
            
            $sex = NULL;

        }
        
        if ( ! validPhoto ( $_FILES [ 'photo' ] ) ) {
            
            $photoE = 'Photo not valid';
            $valid = false;

        } 

        if ( $valid ) {
             if ( $_FILES ['photo']["error"] !== 4 ) {
                $photoExts = array('jpg', 'jpeg', 'png');
                for ($i = 0; $i < count($photoExts) ; $i++) {
                    if ( file_exists('test/' . $myId . '.' . $photoExts [ $i ] ) )
                        unlink ( 'test/' . $myId . '.' . $photoExts [ $i ] );
                }
                move_uploaded_file($_FILES [ 'photo' ]['tmp_name'], 'test/' . $myId . '.' . end ( explode(".", $_FILES [ 'photo' ]['name'] )));
                $photo = $myId . '.' . end ( explode(".", $_FILES [ 'photo' ]['name'] ));
             }
            saveChanges ($myId, $firstName, $lastName, $sex, $photo);
            $saveChangesAlert = 'Your changes saved';

        } else {

            $saveChangesAlert = 'You have errors in your changes';
        }

    }
    
    require_once ( $page [ 'view' ] [ 'editMyProfile' ] );

} else {
    
    require_once ( $page [ 'view' ] [ 'myProfile' ] );
    
}

        