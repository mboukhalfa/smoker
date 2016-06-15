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

function getBdd() {
	$bdd = new PDO('mysql:host=localhost;dbname=smoker;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	return $bdd;
}

