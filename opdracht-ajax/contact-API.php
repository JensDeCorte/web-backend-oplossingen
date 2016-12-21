<?php

	session_start();



	if(  if( !empty($_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] )  )
	{

		if (isset($_POST["submit"])) 
		{

			$admin = "jens585@hotmail.com";
			$email = $_POST['email'];
			$message = $_POST["message"];
			$_SESSION["email"] = $email;
			$_SESSION["message"] = $message;


			if(isset($_POST["copy"])) 
			{
				$copy="copy";
			}
			else
			{
				$copy="Ncopy";
			}


			try
			{
				$db = new PDO('mysql:host=localhost;dbname=opdracht-ajax', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
			catch ( PDOException $e )
			{
				$message = 'Geen connectie: ' . $e->getMessage();
				echo $message;
			}


			$header = "FROM: ".$email;
			$mailtome = true;//mail($admin,"Opdracht-Mail",$message,$header);

			if ($copy=="copy") 
			{
				$mailcopy = true;//mail($email,"Opdracht-Mail",$message,$header);
			}

			if ($mailtome) 
			{
				$query = $db->prepare('INSERT INTO contact_messages (email,message) VALUES (:email,:message)');
				$query->bindValue(":email",$email);
				$query->bindValue(":message",$message);
				$succes = $query->execute();

				session_destroy();
			}
			else
			{
				$returnData["message"]=="NO_SUCCES";
			}
			
		}
		else
		{
			$returnData["message"]=="NOT RIGHT";
		}

		echo $returnData;
	}


?>