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
