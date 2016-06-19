<?php

require_once ( 'model.php' );

function setSmoker($email, $passWord) {
	$bdd = getBdd();
	$query = $bdd->prepare('insert into smoker(id, email, password) values (:id,:email,:passWord)');
	$query->execute(array(
		'id' => '',
		'email' => $email,
		'passWord' => $passWord
	));
	
}