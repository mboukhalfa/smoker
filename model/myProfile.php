<?php

function saveChanges ( $id, $firstName, $lastName, $sex, $photo, $birthDate, $residence, $firstCigarette, $hopeStop, $regret ) {
	$bdd = getBdd();
	$querySmoker = $bdd->prepare('update smoker set firstName = :firstName, lastName = :lastName where  id = :id ' );
	$queryProfile = $bdd->prepare('update profile set sex = :sex, photo = :photo, birthDate = :birthDate, residence = :residence, firstCigarette = :firstCigarette, hopeStop = :hopeStop, regret = :regret where  id = :id ' );
    
	$querySmoker->execute(array(
	        
		'id'           => $id,
		'firstName'    => $firstName,
		'lastName'     => $lastName,
	
	));
    
    $queryProfile->execute(array(
            
		'id'              => $id,
		'sex'             => $sex,
		'photo'           => $photo,
		'birthDate'       => $birthDate,
        'residence'       => $residence,
        'firstCigarette'  => $firstCigarette,
        'hopeStop'        => $hopeStop,
        'regret'          => $regret,
            
	));
	
}