<?php

require_once ( 'model.php' );

function getHashedPassWord  ( $email ) {
    
    $bdd = getBdd();
	$query = $bdd->prepare('select password from smoker where (email = :email )');
	$result = $query->execute(array(
		'email' => $email,
	));
    

    $hash = $query->fetch() ['password'];
    $query->closeCursor();
    
    return $hash;
    
}
