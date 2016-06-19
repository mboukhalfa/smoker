<?php $title = "Welcome";?>

<?php 

$logIn [ 'email' ] = '';
$logIn [ 'emailE' ] = '';
$logIn [ 'passWordE' ] = '';
$singUp [ 'email' ] = '';
$singUp [ 'emailE' ] = '';
$singUp [ 'passWordE' ] = '';

if ( isset ($birthDate) ) {
  
    $singUp [ 'email' ] = $email;
    $singUp [ 'emailE' ] = $emailError;
    $singUp [ 'passWordE' ] = $passWordError;
    
} else if ( isset ($email) ) {
    
    $logIn [ 'email' ] = $email;
    $logIn [ 'emailE' ] = $emailError;
    $logIn [ 'passWordE' ] = $passWordError;
    
}
?>

<?php ob_start(); ?>

<header>
    <h2>Log In</h2>
</header>

<form action="index.php?<?= ACTION ?>=logIn" method="POST">
    <input type="text" name="email" placeholder="Your Email" value="<?= $logIn [ 'email' ] ?>"> <?= $logIn [ 'emailE' ] ?>
    <br/>
    <input type="password" name="passWord" placeholder="New pass word" > <?= $logIn [ 'passWordE' ] ?>
    <br/>
    <input type="submit" value="Log In">
</form>

<header> 
    <h2>Sign Up</h2>
</header>



<form action="index.php?<?= ACTION ?>=signUp" method="POST">
    <input type="text" name="email" placeholder="Your Email" value="<?= $singUp [ 'email' ] ?>"> <?= $singUp [ 'emailE' ] ?>
    <br/>
    <input type="password" name="passWord" placeholder="New pass word" > <?= $singUp [ 'passWordE' ] ?>
    <br/>
    <input type="date" name="birthDate"/>
    <br/>
    <input type="submit" value="Sign Up" />
</form>

<?php $contents = ob_get_clean(); ?>

<?php require_once ('view/template.php'); ?>
