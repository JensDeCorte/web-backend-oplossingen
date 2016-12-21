<?php

	session_start();


	if (isset($_COOKIE["login"])) 
	{
		header("Location: dashboard.php"); /* Redirect browser */
		exit();
	}


$_SESSION["email"] = $_POST["email"];
$_SESSION["wachtwoord"] = $_POST['wachtwoord'];


	if (isset($_POST["generate"])) 
	{
		$_SESSION["wachtwoord"]=generatePassword(7);
		header("Location: registratie.php");

		exit();
	}


	if (isset($_POST["submit"])) 
	{
		if (filter_var($_SESSION["email"],FILTER_VALIDATE_EMAIL)) 
		{
			$_SESSION["notification"]="";

			try
			{
				$db = new PDO('mysql:host=localhost;dbname=opdracht-CRUD-CMS', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
			catch ( PDOException $e )
			{
				$message='No Connection: ' . $e->getMessage();
			}

			$querycheckmail = 'SELECT email FROM users WHERE email=:currentemail';
			$query = $db->prepare($querycheckmail);
			$query->bindValue(":currentemail", $_SESSION["email"]);
			$query->execute();
			$result = $query->fetch( PDO:: FETCH_ASSOC);

			if ($result==false) 
			{
				$salt = uniqid(mt_rand (0 ,10000), true);
				$hash = hash( 'sha512', $salt . $_SESSION["wachtwoord"]);
				$queryinsert = $db->prepare('INSERT INTO users (email,salt,hashed_password,last_login_time) VALUES (:email,:salt,:hashed,CURDATE())');
				$queryinsert->bindValue(":email", $_SESSION["email"]);
				$queryinsert->bindValue(":salt", $salt);
				$queryinsert->bindValue(":hashed", $hash);
				$isinserted = $queryinsert->execute();

				if ($isinserted) 
				{
					setcookie("login", $_SESSION["email"].",".$hash.$salt, time() + 2592000);
					header("Location: dashboard.php");

					exit();
				}
				else
				{
					$_SESSION["notification"]="Oops something went wrong";
					header("Location: registratie.php");

					exit();
				}
			}
			else
			{
				$_SESSION["notification"]="Er bestaat reeds een account met dat emailadres";
				header("Location: login.php");

				exit();
			}
		}
		else
		{
			$_SESSION["notification"] = "EMAIL IS NOT VALID";
			header("Location: registratie.php");

			exit();
		}
	}


	function generatePassword($length)
	{
		$password = array();
		$pw = 0;
		$chars = explode("/",file_get_contents("possiblechars.txt"));

		do
		{
			array_push($password,$chars[rand ( 0, count($chars)-1)]);
			$pw++;
		}while($pw<$length);

		$ww = implode("", $password);
		return $ww;
	}

	header("Location: login.php");

	exit();


 ?>