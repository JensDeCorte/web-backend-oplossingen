<?php

	session_start();


	try
	{
		$db = new PDO('mysql:host=localhost;dbname=opdracht-file-upload', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch( PDOException $e )
	{
		$message='Geen connectie: ' . $e->getMessage();
	}


	if (isset($_GET["id"])) 
	{
		$id = $_GET["id"];

		if(isset($_GET["currentstate"]))
		{
			$state = $_GET["currentstate"];

			if($state="1") 
			{
				$query = $db->prepare('UPDATE artikels SET is_active=DEFAULT WHERE id=:id');
				$query->bindValue(":id", $id);
				$query->execute();
				$_SESSION["notification"]="Artikel geactiveerd";
				header("Location: artikel-overzicht.php");
				exit();
			}
		}
		else
		{
			$query = $db->prepare('UPDATE artikels SET is_active="1" WHERE id=:id');
			$query->bindValue(":id", $id);
			$query->execute();
			$_SESSION["notification"]="Artikel geactiveerd";
			header("Location: artikel-overzicht.php");
			exit();
		}
	}

 ?>