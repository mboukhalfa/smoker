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
$residence = $profile [ 'residence' ];
$photo = $profile [ 'photo' ];
$firstCigarette = $profile [ 'firstCigarette' ];
$regret = $profile [ 'regret' ];
$hopeStop = $profile [ 'hopeStop' ];
$creationDate = $profile [ 'creationDate' ];

if ( isset ( $_GET [ 'edit' ] ) ) {

    $saveChangesAlert = '';
    $firstNameE = '';
    $lastNameE = '';
    $sexE = '';
    $photoE = '';
    $birthDateE = '';
    $residenceE= '';
    $firstCigaretteE = '';
    $hopeStopE = '';
    $regretE = '';
    
    if ( isset ( $_POST [ 'save' ] ) ) {

        $valid = true;

        $firstName = isset ( $_POST [ 'firstName' ] ) ? ucfirst( strtolower ( clearInput ( $_POST [ 'firstName' ] ) ) ) : $profile [ 'firstName' ];
        $lastName = isset ( $_POST [ 'lastName' ] ) ? strtoupper ( clearInput ( $_POST [ 'lastName' ] ) ) : $profile [ 'lastName' ];
        
        $sex =  isset ( $_POST [ 'gender' ] ) ? clearInput ( $_POST [ 'gender' ] ) : $profile [ 'sex' ];
        
        $birthDateDay =  isset ( $_POST [ 'birthDateDay' ] ) ? clearInput ( $_POST [ 'birthDateDay' ] ) : date('d', strtotime( $profile [ 'birthDate' ]));
        $birthDateMonth =  isset ( $_POST [ 'birthDateMonth' ] ) ? clearInput ( $_POST [ 'birthDateMonth' ] ) : date('m', strtotime( $profile [ 'birthDate' ]));
        $birthDateYear =  isset ( $_POST [ 'birthDateYear' ] ) ? clearInput ( $_POST [ 'birthDateYear' ] ) : date('Y', strtotime( $profile [ 'birthDate' ]));
        $birthDate = $birthDateYear . '-' . $birthDateMonth . '-' . $birthDateDay;
        
        $residence = isset ( $_POST [ 'residence' ] ) ? clearInput( $_POST [ 'residence' ] ) : $profile [ 'residence' ];
        
        $firstCigaretteDay =  isset ( $_POST [ 'firstCigaretteDay' ] ) ? clearInput ( $_POST [ 'firstCigaretteDay' ] ) : date('d', strtotime( $profile [ 'firstCigarette' ]));
        $firstCigaretteMonth =  isset ( $_POST [ 'firstCigaretteMonth' ] ) ? clearInput ( $_POST [ 'firstCigaretteMonth' ] ) : date('m', strtotime( $profile [ 'firstCigarette' ]));
        $firstCigaretteYear =  isset ( $_POST [ 'firstCigaretteYear' ] ) ? clearInput ( $_POST [ 'firstCigaretteYear' ] ) : date('y', strtotime( $profile [ 'firstCigarette' ]));
        $firstCigarette = $firstCigaretteYear . '-' . $firstCigaretteMonth . '-' . $firstCigaretteDay;
        
        $hopeStop = isset ( $_POST [ 'hopeStop' ] ) ? clearInput ( $_POST [ 'hopeStop' ] ) : $profile [ 'hopeStop' ];
        $regret = isset ( $_POST [ 'regret' ] ) ? clearInput ( $_POST [ 'regret' ] ) : $profile [ 'regret' ];
        
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
        
        if (  ! validDate ( $birthDate ) ) {
            
            $birthDateE = 'Date not valid';
            $valid = false;

        } else if ( $valid && ! dateIsNull ( $birthDate ) ) {
            
            if ( strtotime( 'now' ) < strtotime ( $birthDate ) ) {
            
                $birthDateE = 'Date not valid ( Your date must be older )';
                $valid = false;
                
            } else if ( strtotime ( $birthDate ) < strtotime('1902-01-01') ) {
                
                $birthDateE = 'Date not valid ( all people burned in this date must be dead)';
                $valid = false;
            }
        }
        
        if ( ! validResidence ( $residence) ) {
            
            $residenceE = 'Residence not valid';
            $valid = false;
            
        }
        
        if ( ! validDate ( $firstCigarette ) ) {
        
            $firstCigaretteE = 'Date not valid';
            $valid = false;
        
        } else if ( $valid && ! dateIsNull ( $firstCigarette ) ) {
            
            if ( strtotime( 'now' ) < strtotime ( $firstCigarette ) ) {
            
                $firstCigaretteE = 'Date not valid ( Your date must be older )';
                $valid = false;
                
            } else if ( strtotime ( $firstCigarette ) < strtotime( $birthDate ) ) {
                
                $firstCigaretteE = 'Date not valid ( first cigarette can not be before birth )';
                $valid = false;
            }
        }
        
        if ( ! validYN ( $hopeStop ) ) {

            $hopeStop = NULL; 
            
        }

        if ( ! validYN ( $regret ) ) {
        
            $regret = NULL;
        
        }
        
        if ( $valid ) {
    
            if ( $_FILES ['photo']["error"] !== 4 ) { // if photo is selected
            
                deleteExists ($path [ 'profilePhoto'] ,$myId);
                move_uploaded_file($_FILES [ 'photo' ]['tmp_name'], $path [ 'profilePhoto'] . $myId . '.' . end ( explode(".", $_FILES [ 'photo' ]['name'] )));
                $photo = $myId . '.' . end ( explode(".", $_FILES [ 'photo' ]['name'] ));
             
            }
             
            $birthDate = $birthDateYear . '-' . $birthDateMonth . '-' . $birthDateDay;
            $firstCigarette = $firstCigaretteYear . '-' . $firstCigaretteMonth . '-' . $firstCigaretteDay;
            
            saveChanges ($myId, $firstName, $lastName, $sex, $photo, $birthDate, $residence, $firstCigarette, $hopeStop, $regret );
            $saveChangesAlert = 'Your changes saved'; 

        } else {

            $saveChangesAlert = 'You have errors in your changes';
        }

    }
    
    require_once ( $page [ 'view' ] [ 'editMyProfile' ] );

} else {
    
    require_once ( $page [ 'view' ] [ 'myProfile' ] );
    
}

function deleteExists ($path, $name) {
             
        $photoExts = array('JPG', 'JPEG', 'PNG','jpg','jpeg','png');
    
        for ($i = 0; $i < count($photoExts) ; $i++) { //delete existed pictures
    
            if ( file_exists($path . $name . '.' . $photoExts [ $i ] ) ) {
    
                unlink ($path . $name . '.' . $photoExts [ $i ] );
    
            }
    
        }
}

function validResidence ( $residence ) {
    
    if ( strlen ( $residence ) > 255 ) {
        
        return 0;
        
    }
        return 1;
    
}

function validYN ( $answer ) {
    
    $YN = array ( 'Y', 'N');
    
    if ( ! in_array ( $answer, $YN, true ) ) {
        
        return 0;
    }
    
    return 1;
}