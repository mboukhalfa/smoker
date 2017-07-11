<?php



function setSmoker( $firstName, $lastName, $email, $passWord, $confirmationId ) {
	$bdd = getBdd();
	$query = $bdd->prepare('insert into smoker(id, firstName, lastName, email, passWord, confirmationId) values (:id, :firstName, :lastName, :email,:passWord, :confirmationId)');
	$query->execute(array(
		'id' => '',
		'firstName' => $firstName,
		'lastName' => $lastName,
		'email' => $email,
		'passWord' => $passWord,
		'confirmationId' => $confirmationId
	));
	
}