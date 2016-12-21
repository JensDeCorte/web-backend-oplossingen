<?php

	session_start();


	try
	{
		$db = new PDO('mysql:host=localhost;dbname=opdracht-CRUD-CMS', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch( PDOException $e )
	{
		$message = 'Geen connectie: ' . $e->getMessage();
	}

	if(isset($_GET["id"])) 
	{
		$query = $db->prepare('SELECT * FROM artikels WHERE id=:id');
		$query->bindValue(":id",$_GET["id"]);
		$query->execute();
		$result = $query->fetch(PDO:: FETCH_ASSOC);
	}

	if(isset($_POST["submit"])) 
	{
		$query = $db->prepare('UPDATE artikels SET titel=:titel,artikel=:artikel,kernwoorden=:kernwoorden,datum=:datum WHERE id=:id');
		$query->bindValue(":id",$_POST["id"]);
		$query->bindValue(":titel",$_POST["titel"]);
		$query->bindValue(":artikel",$_POST["artikel"]);
		$query->bindValue(":kernwoorden",$_POST["kernwoorden"]);
		$query->bindValue(":datum",$_POST["datum"]);
		$success = $query->execute();

		if($success) 
		{
			$_SESSION["notification"]="Artikel succesvol gewijzigd!";
			header("Location: artikel-overzicht.php");
			exit();
		}
	}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Artikel wijzigen.</title>
 </head>
 <body>
 	<h1>Artikel wijzigen</h1>
	 <form action="artikel-wijzigen.php" method="POST">
	 	<input type="hidden" name="id" value="<?=$result["id"]?>">
		<label for="titel">Titel</label><br>
        <input type="text" name="titel" value="<?=$result["titel"]?>"><br>
        <label for="artikel">Artikel</label><br>
        <textarea name="artikel" cols="40" rows="10"><?=$result["artikel"]?></textarea><br>
        <label for="kernwoorden">Kernwoorden</label><br>
        <input type="text" name="kernwoorden" value="<?=$result["kernwoorden"]?>"><br>
        <label for="datum">Datum</label><br>
        <input type="text" placeholder="jjjjmmdd" name="datum" value="<?=$result["datum"]?>"><br>
        <button type="submit" name="submit">Wijzigen</button>
	</form>
 </body>
 </html>