<?php
function setSmoker($email, $passWord) {
	$bdd = getBdd();
	$query = $bdd->prepare('insert into smoker(id, email, password) values (:id,:email,:passWord)');
	$query->execute(array(
		'id' => '',
		'email' => $email,
		'passWord' => $passWord
	));
	
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
	$query = $bdd->prepare('select password from smoker where (email = :email )');
	$result = $query->execute(array(
		'email' => $email,
	));
    

    $hash = $query->fetch() ['password'];
    $query->closeCursor();
    
    return $hash;
    
}

function getBdd() {
	$bdd = new PDO('mysql:host=localhost;dbname=smoker;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	return $bdd;
}

