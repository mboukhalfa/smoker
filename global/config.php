<?php

define ('BASE_PATH','./');
define ('BASE_URL','http://localhost/smoker/');
define ('ACTION' ,'q');

$path = array (
    
    'model'         => BASE_PATH . 'model/',
    'controller'    => BASE_PATH . 'controller/',
    'view'          => BASE_PATH . 'view/',
    
);

$url = array (
    
    'home'          => BASE_URL . '?' . ACTION . '=home',
    'welcome'       => BASE_URL . '?' . ACTION . '=welcome',
    'logOut'        => BASE_URL . '?' . ACTION . '=logOut',
    'profile'       => BASE_URL . '?' . ACTION . '=profile',
    'confirm'       => BASE_URL . '?' . ACTION . '=accountConfirmation',
    'signUp'        => BASE_URL . '?' . ACTION . '=signUp',
    'logIn'         => BASE_URL . '?' . ACTION . '=logIn',
    'myProfile'     => BASE_URL . '?' . ACTION . '=myProfile',
    
);

$page = array (

    'model' => array (
    
        'model'     => $path [ 'model' ] . 'model.php', 
        'signUp'    => $path [ 'model' ] . 'signUp.php', 
        'confirm'   => $path [ 'model' ] . 'confirm.php', 
        'logIn'     => $path [ 'model' ] . 'logIn.php', 
        'profile'   => $path [ 'model' ] . 'profile.php', 
        'myProfile'   => $path [ 'model' ] . 'myProfile.php', 
        
    ),

    'controller' => array (
    
        'controller' => $path [ 'controller' ] . 'controller.php', 
        'welcome'    => $path [ 'controller' ] . 'welcome.php', 
        'signUp'     => $path [ 'controller' ] . 'signUp.php', 
        'confirm'    => $path [ 'controller' ] . 'confirm.php', 
        'logIn'      => $path [ 'controller' ] . 'logIn.php', 
        'logOut'     => $path [ 'controller' ] . 'logOut.php', 
        'home'       => $path [ 'controller' ] . 'home.php', 
        'profile'    => $path [ 'controller' ] . 'profile.php', 
        'error'      => $path [ 'controller' ] . 'error.php', 
        'myProfile'  => $path [ 'controller' ] . 'myProfile.php', 
        
    ),

    'view' => array (
    
        'template'      => $path [ 'view' ] . 'template.php', 
        'welcome'       => $path [ 'view' ] . 'welcome.php', 
        'signedUp'      => $path [ 'view' ] . 'signedUp.php', 
        'home'          => $path [ 'view' ] . 'home.php', 
        'profile'       => $path [ 'view' ] . 'profile.php', 
        'error'         => $path [ 'view' ] . 'error.php', 
        'nav'           => $path [ 'view' ] . 'nav.php', 
        'myProfile'     => $path [ 'view' ] . 'myProfile.php', 
        'editMyProfile' => $path [ 'view' ] . 'editMyProfile.php', 
        
    ),

);