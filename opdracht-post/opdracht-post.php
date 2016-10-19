<?php

	$username = "jens";
	$password = "azerty";

	$ingegevenUsername = 'niets ingevuld';
	$ingegevenPassword = 'niets ingevuld';

	$ingegevenUsername = ( isset($_POST['username']) ? strval($_POST['username']) : 'niets ingevuld');
	$ingegevenPassword = ( isset($_POST['password']) ? strval($_POST['password']) : 'niets ingevuld');


	$zijnGegevensCorrect = '';
	$message = '';

	if($ingegevenUsername != 'niets ingevuld' && $ingegevenPassword != 'niets ingevuld')
	{
		if($username == $ingegevenUsername && $password == $ingegevenPassword)
		{
			$zijnGegevensCorrect = true;
			$message = "Welkom!";
		}
		else
		{
			$zijnGegevensCorrect = false;
			$message = "Er ging iets mis bij het inloggen, probeer opnieuw.";
		}
	}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-post</title>
</head>
<body>

	
	<h2>Inloggen</h2>

	<form action="Opdracht-post.php" method="post">

	<ul>
		<li>
			<label for="username">Gebruikersnaam: </label>
			<input type="text" name="username" id="username">
		</li>

		<li>
			<label for="password">Paswoord: </label>
			<input type="password" name="password" id="password">
		</li>
	</ul>

	<input type="submit" value="Verzenden">

	</form>


	<?php if( $message != '' ){ echo "<h3>".$message."</h3>"; } ?>


</body>
</html>