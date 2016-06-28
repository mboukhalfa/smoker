<?php

function saveChanges ( $id, $firstName, $lastName, $sex, $photo ) {
	$bdd = getBdd();
	$querySmoker = $bdd->prepare('update smoker set firstName = :firstName, lastName = :lastName where  id = :id ' );
	$queryProfile = $bdd->prepare('update profile set sex = :sex, photo = :photo  where  id = :id ' );
    
	$querySmoker->execute(array(
		'id' => $id,
		'firstName' => $firstName,
		'lastName' => $lastName,
	));
    
    $queryProfile->execute(array(
		'id' => $id,
		'sex' => $sex,
		'photo' => $photo,
	));
	
}