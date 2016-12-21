<?php

	session_start();


	if (isset($_COOKIE['login'])) 
	{
		$user = explode(",",$_COOKIE["login"]);
		$email = $user[0];
		$hashandsaltofcookie = $user[1];

		try
		{
			$db = new PDO('mysql:host=localhost;dbname=opdracht-file-upload', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch( PDOException $e )
		{
			$message='Geen connectie: ' . $e->getMessage();
		}

		$query = $db->prepare('SELECT hashed_password,salt FROM users WHERE email=:emailofcookie');
		$query->bindValue(":emailofcookie", $email);
		$query->execute();
		$result = $query->fetch( PDO:: FETCH_ASSOC);
		$hashandsaltofdatabase = $result["hashed_password"].$result["salt"];

		if($hashandsaltofcookie==$hashandsaltofdatabase) 
		{
			$login = true;
		}
		else
		{
			$_SESSION["notification"]="Er is iets fout gegaan, we denken dat er geknoeid is met de cookie";
			header("Location: login.php");
			exit();
		}

		$querypic=$db->prepare("SELECT profile_picture FROM users WHERE email=:email");
		$querypic->bindValue(":email",$email);
		$querypic->execute();
		$picture=$querypic->fetch();

	}
	else
	{
		header("Location: registratie.php");
		exit();
	}


	if (isset($_GET["uitloggen"])) 
	{
		if ($_GET["uitloggen"]=="true") 
		{
			setcookie("login", "", time() - 3600);
			$_SESSION["notification"]="U bent uitgelogd! Tot de volgende keer!";
			header("Location: login.php");
			exit();
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<style>
		img{
			width: 100px;
			height: 100px;
		}
		
	</style>
</head>
<body>
	<?php if ($login): ?>
		<a href="dashboard.php">Mijn dashboard</a>
		<p>Ingelogd als <?=$email ?>
		<img src="<?=$picture[0]?>" alt="<?=$email ?>">
		<a href="dashboard.php?uitloggen=true">Uitloggen</a>
		<a href="gegevens-wijzigen.php">Gegevens wijzigen</a>
		<h1>Uw dashboard</h1>
		<a href="artikel-overzicht.php">Artikels</a>
	<?php endif ?>
</body>
</html>