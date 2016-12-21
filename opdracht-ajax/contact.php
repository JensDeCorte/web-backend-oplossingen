<?php

	session_start();


	if(isset($_POST["submit"])) 
	{
		$admin = "jens585@hotmail.com";
		$email = $_POST['email'];
		$message = $_POST["message"];
		$_SESSION["email"] = $email;
		$_SESSION["message"] = $message;
	
		if(isset($_POST["copy"])) 
		{
			$copy = "copy";
		}
		else
		{
			$copy = "Ncopy";
		}

		try
		{
			$db = new PDO('mysql:host=localhost;dbname=opdracht-ajax', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch( PDOException $e )
		{
			$message = 'Geen connectie: ' . $e->getMessage();
			echo $message;
		}

		$header = "FROM: ".$email;
		$mailtome = true;//mail($admin,"Opdracht-Mail",$message,$header);

		if($copy=="copy") 
		{
			$mailcopy=true;//mail($email,"Opdracht-Mail",$message,$header);
		}

		if($mailtome) 
		{
			echo "Bericht verstuurd!";
			$query = $db->prepare('INSERT INTO contact_messages (email,message) VALUES (:email,:message)');
			$query->bindValue(":email",$email);
			$query->bindValue(":message",$message);
			$succes = $query->execute();

			session_destroy();
		}
		else
		{
			$_SESSION["error"]="Niet gelukt!";
			header("Location: contacteer-ons.php");
			exit();
		}
	}
	else
	{
		header("Location: contacteer-ons.php");
		exit();
	}

?>