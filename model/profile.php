<?php

function profileExists ( $profileId ) {
    
    $bdd = getBdd();
	$query = $bdd->prepare('select id from profile where (id = :id)');
	$result = $query->execute(array(
		'id' => $profileId,
	));
    
    $count = $query->rowCount();
    $query->closeCursor();
    
    return $count;
    
}

function getProfileData ( $profileId ) {

    $bdd = getBdd();
    $query = $bdd->prepare('select * from smoker LEFT JOIN profile ON smoker.id = profile.id where (smoker.id = :id)');
    $result = $query->execute(array(
        'id' => $profileId,
    ));

    $data = $query->fetch( PDO::FETCH_ASSOC );
    $query->closeCursor();

    return $data;
}

    