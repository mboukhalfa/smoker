<?php

function getBdd() {
	$bdd = new PDO('mysql:host=localhost;dbname=smoker;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	return $bdd;
}

function checkSmoker ( $email ) {
    
    $bdd = getBdd();
	$query = $bdd->prepare('select email from smoker where (email = :email)');
	$result = $query->execute(array(
		'email' => $email,
	));
    
    $count = $query->rowCount();
    $query->closeCursor();
    
    return $count;
}

function getHashedPassWord  ( $email ) {
    
    $bdd = getBdd();
	$query = $bdd->prepare('select passWord from smoker where (email = :email )');
	$result = $query->execute(array(
		'email' => $email,
	));
    

    $hash = $query->fetch() ['passWord'];
    $query->closeCursor();
    
    return $hash;
    
}

function accountConfirmed ( $email ) {
      
    $bdd = getBdd();
	$query = $bdd->prepare('select confirmationId from smoker where (email = :email )');
	$result = $query->execute(array(
		'email' => $email,
	));
    

    $confirmationId = $query->fetch() ['confirmationId'];
    $query->closeCursor();
    
    if ( $confirmationId )
        return false; // if $confirmationId not null 
    return true;

}

function getId ( $email ) {
    
    $bdd = getBdd();
	
    $query = $bdd->prepare('SELECT id FROM smoker WHERE ( email = :email )');
	$result = $query->execute(array(
		'email' => $email,
	));
    

    $id = $query->fetch() ['id'];
    $query->closeCursor();
    
    return $id;
}