<?php

require_once ('model/model.php');

function logIn () {
	require_once ('view/logIn.php');
}

function signUp(){
	if(isset($_POST['email']) && isset($_POST['passWord']) ) {
		setSmoker($_POST['email'],$_POST['passWord']);
		require_once('view/signedUp.php');
	} else {
		throw new Exception ('check feild email or pass word.');
	}
}

function Error($errorMsg){
	require_once('view/error.php');
}
