<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />


    <?php
require('config.php');
session_start();

if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
	$result = mysqli_query($conn,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
	if($rows==1){
	    $_SESSION['username'] = $username;
	    header("Location: dash.php");
	}else{
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	}
}
?>
 





  </head>
  <body>
    <div class="container">
      <div class="login">
        <form action="" method="post" name="login">
          <h1>Authentification</h1>
          <hr />
          <p>Bienvenue</p>
          <label>Identifiant</label>
          <input type="text" placeholder="username" name="username"/>
          <label>mot de passe</label>
          <input type="password" name="password" placeholder="Mot de passe"/>
          <input type="submit" value="Connexion " name="submit" class="box-button">
          <?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
        <closeform></closeform></form>
      </div>
      <div class="pic">
        <img src="train1.jpg" />
      </div>
    </div>
  </body>
</html>

