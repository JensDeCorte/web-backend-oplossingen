<?php

	session_start();

	if(isset($_COOKIE["login"])) 
	{
		header("Location: dashboard.php");
		exit();
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>

	<p><?php if(isset($_SESSION["notification"])) { echo $_SESSION["notification"]; } ?></p>

 	<form action="login-process.php" method="post">
		<label for="email">E-mail</label>
        <input type="text" name="email"><br>

        <label for="password">Wachtwoord</label>
        <input type="password" name="wachtwoord"><br>

        <button type="submit" name="submit">Inloggen!</button>
	</form>

	<p>Nog geen account? Ga dan naar onze <a href="registratie.php">registratiepagina</a></p>

 </body>
 </html>