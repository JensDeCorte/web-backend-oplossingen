<?php

	session_start();


	$user = explode(",",$_COOKIE["login"]);
	$email = $user[0];

	$db = new PDO('mysql:host=localhost;dbname=opdracht-file-upload', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$query = $db->prepare("SELECT profile_picture FROM users WHERE email=:email");
	$query->bindValue(":email",$email);
	$query->execute();
	$result = $query->fetch();

	if(isset($_POST["submit"])) 
	{	
		$file=$_FILES["profilepicture"];

		if($file["error"]!=0) 
		{
			$_SESSION["notification"]="ERROR occurred";
			header("Location: dashboard.php");
		}

		echo $file["type"];

		if(($file["type"]="image/jpeg" || $file["type"]="image/PNG" || $file["type"]="image/GIF") && $file["size"]<2097152) 
		{
			$date = $date = date("HisdmY");
			$bestandnaam = $date.$file["name"];
			move_uploaded_file($file["tmp_name"], "img/".$bestandnaam);
			$query = $db->prepare('UPDATE users SET profile_picture=:src WHERE email=:email');
			$query->bindValue(":src", "img/".$bestandnaam);
			$query->bindValue(":email",$email);
			$success = $query->execute();

			if($success) 
			{
				$_SESSION["notification"]="Afbeelding veranderd";
				header("Location: dashboard.php");
			}
		}
		else
		{
			$_SESSION["notification"]="Image not correct";
		}
	}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Gegevens wijzigen</title>
 	<style>
 		img{
 			width: 400px;
 			height: 400px;
 		}
 	</style>
 </head>
 <body>
 <p><?php if(isset($_SESSION["notification"])){ echo $_SESSION["notification"];} ?></p>
 	<img src="<?=$result[0]?>" alt="<?=$email ?>">
 	<form action="gegevens-wijzigen.php" method="post" enctype="multipart/form-data">
 	<input type="file" name="profilepicture"><br>
    <button type="submit" name="submit">Uploaden</button>
 </body>
 </html>