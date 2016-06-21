<?php $title = "Welcome";?>

<?php 

$singUp [ 'firstName' ] = '';
$singUp [ 'firstNameE' ] = '';
$singUp [ 'lastName' ] = '';
$singUp [ 'lastNameE' ] = '';
$logIn [ 'email' ] = '';
$logIn [ 'emailE' ] = '';
$logIn [ 'passWordE' ] = '';
$singUp [ 'email' ] = '';
$singUp [ 'emailE' ] = '';
$singUp [ 'passWordE' ] = '';


if ( isset ( $operation ) ) {
    
    if ( $operation === 'signUp' ) {
        
        $singUp [ 'firstName' ] = $firstName;
        $singUp [ 'firstNameE' ] = $firstNameE;
        $singUp [ 'lastName' ] = $lastName;
        $singUp [ 'lastNameE' ] = $lastNameE;  
        $singUp [ 'email' ] = $email;
        $singUp [ 'emailE' ] = $emailError;
        $singUp [ 'passWordE' ] = $passWordError;

    
    } else if ( $operation === 'signIn' ) {
    
        $logIn [ 'email' ] = $email;
        $logIn [ 'emailE' ] = $emailError;
        $logIn [ 'passWordE' ] = $passWordError;
    
    }
    
}
?>

<?php ob_start(); ?>

<header>
    <h2>Sign in</h2>
</header>

<form action="index.php?<?= ACTION ?>=logIn" method="POST">
    <input type="text" name="email" placeholder="Your Email" value="<?= $logIn [ 'email' ] ?>" required > <?= $logIn [ 'emailE' ] ?>
    <br/>
    <input type="password" name="passWord" placeholder="Your password" required > <?= $logIn [ 'passWordE' ] ?>
    <br/>
    <input type="submit" value="Sing in">
</form>

<header> 
    <h2>Sign up</h2>
</header>



<form action="index.php?<?= ACTION ?>=signUp" method="POST">
    <input type="text" name="firstName" placeholder="Your first name" value="<?= $singUp [ 'firstName' ] ?>" required > <?= $singUp [ 'firstNameE' ] ?>
    <input type="text" name="lastName" placeholder="Your last name" value="<?= $singUp [ 'lastName' ] ?>" required > <?= $singUp [ 'lastNameE' ] ?>
    <br/>
    <input type="text" name="email" placeholder="Your Email" value="<?= $singUp [ 'email' ] ?>" required > <?= $singUp [ 'emailE' ] ?>
    <br/>
    <input type="password" name="passWord" placeholder="New password" required > <?= $singUp [ 'passWordE' ] ?>
    <br/>
    <input type="submit" value="Sign up" />
</form>

<?php $contents = ob_get_clean(); ?>

<?php require_once ('view/template.php'); ?>
