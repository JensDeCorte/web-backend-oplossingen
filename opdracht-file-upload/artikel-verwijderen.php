<?php

	session_start();


	try
	{
		$db = new PDO('mysql:host=localhost;dbname=opdracht-file-upload', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch ( PDOException $e )
	{
		$message='Geen connectie: ' . $e->getMessage();
	}


	if(isset($_GET["id"])) 
	{
		$query=$db->prepare('UPDATE artikels SET is_archived="1" WHERE id=:id');
		$query->bindValue(":id", $_GET["id"]);
		$query->execute();
		header("Location: artikel-overzicht.php");
		exit();
	}

 ?>