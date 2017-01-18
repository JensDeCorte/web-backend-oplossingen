<?php

	session_start();


	$titel = "";
	$artikel = "";
	$kern = "";
	$datum = "";

	if(isset($_SESSION["titel"])) 
	{
		$titel = $_SESSION["titel"];
	}
	if(isset($_SESSION["artikel"])) 
	{
		$artikel = $_SESSION["artikel"];
	}
	if(isset($_SESSION["kern"])) 
	{
		$kern = $_SESSION["kern"];
	}
	if(isset($_SESSION["datum"])) 
	{
		$datum = $_SESSION["datum"];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Artikel toevoegen</title>
</head>
<body>

	<p><?php if(isset($_SESSION["notification"])) 
 	{
 		echo $_SESSION["notification"];
 	}
 	?>

	<h1>Artikel Toevoegen</h1>
	<form action="artikel-toevoegen.php/" method="POST">
		<label for="titel">Titel</label><br>
        <input type="text" name="titel" value="<?= $titel ?>"><br>
        <label for="artikel">Artikel</label><br>
        <textarea name="artikel" cols="40" rows="10"><?= $artikel ?></textarea><br>
        <label for="kern">Kernwoorden</label><br>
        <input type="text" name="kern" value="<?= $kern ?>"><br>
        <label for="datum">Datum</label><br>
        <input type="text" placeholder="jjjjmmdd" name="datum" value="<?= $datum ?>"><br>
        <button type="submit" name="submit">Invoegen</button>
	</form>
</body>
</html>