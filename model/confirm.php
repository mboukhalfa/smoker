<?php

function confirmAccount ( $email ) {
    
    $bdd = getBdd();
    
	$query = $bdd->prepare(' update smoker set  confirmationId = :confirmationId where ( email = :email) ');
	$query->execute(array(

		'email' => $email,
		'confirmationId' => NULL
        
	));
    
}

function createProfile ( $id ) {
    
    $bdd = getBdd();
    
    $query = $bdd->prepare('insert into profile (id) values (:id)');
	$query->execute(array(

		'id' => $id,
        
	));
    
}

function getConfirmationId ( $email ) {
    
    $bdd = getBdd();
	$query = $bdd->prepare('select confirmationId from smoker where ( email = :email )');
	$query->execute(array(

		'email' => $email,

	));
    
    $confirmationId = $query->fetch() ['confirmationId'];
    $query->closeCursor();
    
    return $confirmationId;
}