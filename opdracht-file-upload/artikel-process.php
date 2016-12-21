<?php 
	session_start();

	if(isset($_POST["submit"])) 
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=opdracht-file-upload', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch( PDOException $e )
		{
			$message='Geen connectie: ' . $e->getMessage();
		}

		$query = $db->prepare('INSERT INTO artikels (titel,artikel,kernwoorden,datum) VALUES (:titel,:artikel,:kernwoorden,:datum)');
		$query->bindValue(":titel", $_POST["titel"]);
		$query->bindValue(":artikel", $_POST["artikel"]);
		$query->bindValue(":kernwoorden", $_POST["kern"]);
		$query->bindValue(":datum", $_POST["datum"]);
		$success = $query->execute();

		if($success) 
		{
				$_SESSION["notification"]="Artikel toegevoegd!";
				header("Location: artikel-overzicht.php");
				exit();
		}
		else
		{
				$_SESSION["notification"]="Artikel kon niet worden toegevoegd";
				header("Location: artikel-toevoegen.php");
				exit();
		}
	}

?>