<?php

	session_start();


	if(isset($_COOKIE["login"])) 
	{
		header("Location: dashboard.php");
		exit();
	}


	if(isset($_POST["submit"])) 
	{
		$email = $_POST["email"];
		$wachtwoord = $_POST["wachtwoord"];

		try
		{
			$db = new PDO('mysql:host=localhost;dbname=opdracht-file-upload', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch ( PDOException $e )
		{
			$message='Geen connectie: ' . $e->getMessage();
		}


		$queryuser = 'SELECT email,salt,hashed_password FROM users WHERE email=:currentemail';
		$query = $db->prepare($queryuser);
		$query->bindValue(":currentemail",$email);
		$query->execute();
		$result = $query->fetch( PDO:: FETCH_ASSOC);
		$passwordhash = hash( 'sha512', $result["salt"] . $wachtwoord);

		if($passwordhash==$result["hashed_password"]) 
		{
			setcookie("login", $email.",".$result["hashed_password"].$result["salt"], time() + 2592000);
			header("Location: dashboard.php");
			exit();
		}
		else
		{
			$_SESSION["notification"] = "Email of wachtwoord is fout";
			header("Location: login.php");
			exit();
		}
	}


	header("Location: login.php");
	exit();

?>