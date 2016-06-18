<?php $title = "Log In";?>
<?php ob_start(); ?>
<header>
<h2>Log In</h2>
</header>
<form action="index.php?action=logIn" method="POST">
<input type="text" name="email" placeholder="Your Email" value="<?php if ( isset ( $email ) ) echo $email ?>"> <?php if ( isset ( $erreur [ 'logIn' ] [ 'email' ] ) ) echo $erreur [ 'logIn' ] ['email']; ?>
<br/>
<input type="password" name="passWord" placeholder="New pass word" value="<?php if ( isset ( $passWord ) ) echo $passWord ?>"> <?php if ( isset ( $erreur [ 'logIn' ] [ 'passWord' ] ) ) echo $erreur [ 'logIn' ] [ 'passWord' ]; ?>
<br/>
<input type="submit" value="Log In">
</form>

<header> 
<h2>Sign Up</h2>
</header>
<form action="index.php?action=signUp" method="POST">
<input type="text" name="email" placeholder="Your Email" value="<?php if ( isset ( $email ) ) echo $email ?>"> <?php if ( isset ( $erreur [ 'signUp' ] [ 'email' ] ) ) echo $erreur [ 'signUp' ] ['email']; ?>
<br/>
<input type="password" name="passWord" placeholder="New pass word" value="<?php if ( isset ( $passWord ) ) echo $passWord ?>"> <?php if ( isset ( $erreur [ 'signUp' ] [ 'passWord' ] ) ) echo $erreur [ 'signUp' ] [ 'passWord' ]; ?>
<br/>
<input type="date" name="birthDate"/>
<br/>
<input type="submit" value="Sign Up">
</form>

<?php $contents = ob_get_clean(); ?>

<?php require_once ('view/template.php'); ?>
