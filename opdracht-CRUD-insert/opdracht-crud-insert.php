<?php 

	$ingevoegd = false;
	$message = "";

	if (isset($_GET["submit"])) 
	{
		$ingevoegd = true;

		try
		{
	
			$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
		}
		catch( PDOException $e )
		{
			$message = 'Er ging iets mis. ' . $e->getMessage();
		}
	
		$naam=$_GET["naam"];
		$adres=$_GET["adres"];
		$postcode=$_GET["postcode"];
		$gemeente=$_GET["gemeente"];
		$omzet=$_GET["omzet"];
	
		$query=$db->prepare('INSERT INTO brouwers (brnaam,adres,postcode,gemeente,omzet) VALUES (:naam,:adres,:postcode,:gemeente,:omzet)');
	
		$query->bindValue(":naam", $naam);
		$query->bindValue(":adres", $adres);
		$query->bindValue(":postcode", $postcode);
		$query->bindValue(":gemeente", $gemeente);
		$query->bindValue(":omzet", $omzet);
	
		$query->execute();

	}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Opdracht-CRUD-insert</title>
	<style>
		ul { list-style: none; }
	</style>
 </head>
 <body>

 <?php if (!$ingevoegd): ?>
 	 <h1>Brouwerij toevoegen</h1>

 	<form action="opdracht-CRUD-insert.php" method="get">
 	<ul>
		<li><label for="brnaam">Naam</label></li>
        <li><input type="text" name="naam"></li>
        <li><label for="adres">Adres</label></li>
        <li><input type="text" name="adres"></li>
        <li><label for="postcode">Postcode</label></li>
        <li><input type="text" name="postcode"></li>
        <li><label for="gemeente">Gemeente</label></li>
        <li><input type="text" name="gemeente"></li>
        <li><label for="omzet">Omzet</label></li>
        <li><input type="text" name="omzet"></li>
        <li><button type="submit" name="submit">Invoegen!</button>
    </ul>
	</form>
 <?php endif ?>

 <?php if ($ingevoegd): ?>
 	<p><?=$message ?></p>
 	<p>Brouwerij succesvol toegevoegd! Het unieke nummer van deze brouwerij is: <?= $db->lastInsertId() ?></p>
 <?php endif ?>

 </body>
 </html>