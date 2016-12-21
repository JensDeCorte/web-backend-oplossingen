<?php

	session_start();

	$user = explode(",",$_COOKIE["login"]);
	$email = $user[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Artikel toevoegen</title>
</head>
<body>
	<a href="artikel-overzicht.php">Overzicht</a>
	<p>Ingelogd als <?=$email ?>
	<a href="?uitloggen=true">Uitloggen</a>
	<p><?php if(isset($_SESSION["notification"])) 
 				{
 					echo $_SESSION["notification"];
 				}
 	?>
	<h1>Artikel Toeveoegen</h1>
	<form action="artikel-process.php" method="POST">
		<label for="titel">Titel</label><br>
        <input type="text" name="titel"><br>
        <label for="artikel">Artikel</label><br>
        <textarea name="artikel" cols="40" rows="10"></textarea><br>
        <label for="kern">Kernwoorden</label><br>
        <input type="text" name="kern"><br>
        <label for="datum">Datum</label><br>
        <input type="text" placeholder="jjjjmmdd" name="datum"><br>
        <button type="submit" name="submit">Invoegen!</button>
	</form>
</body>
</html>