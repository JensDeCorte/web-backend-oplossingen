<?php

	session_start();


	$email = "";
	$message= "";
	$error= "";


	if(isset($_SESSION["email"])) 
	{
		$email = $_SESSION["email"];
	}

	if(isset($_SESSION["message"])) 
	{
		$message = $_SESSION["message"];
	}

	if(isset($_SESSION["error"])) 
	{
		$error = $_SESSION["error"];
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contacteer ons!</title>
</head>
<body>

<p><?= $error ?></p>
	<h1>Contacteer ons!</h1>

	<form action="contact.php" method="post">
		<label for="email">Email</label><br>
        <input type="text" name="email" value="<?=$email?>"><br>
        <label for="message">Bericht</label><br>
        <textarea name="message"><?=$message?></textarea><br>
        <button type="submit" name="submit">Verzenden!</button>
        <input type="checkbox" name="copy" value="copy">Stuur me een kopie!
	</form>

</body>
</html>