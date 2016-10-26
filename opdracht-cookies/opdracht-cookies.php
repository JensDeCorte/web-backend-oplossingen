<?php

$logingegevens = file_get_contents("tekstbestand.txt");

$logingegevensarray = explode(",", $logingegevens);


$username = $logingegevensarray[0];
$password = $logingegevensarray[1];

$ingegevenusername = '';
$ingegevenpassword = '';

$zijngegevenscorrect = '';

if( isset($_POST['username']) && isset($_POST['password']) )
{
	$ingegevenusername = $_POST['username'];
	$ingegevenpassword = $_POST['password'];

	$zijngegevenscorrect = false;
}

if( $ingegevenusername == $username  &&  $ingegevenpassword == $password )
{
	$zijngegevenscorrect = true;
	setcookie('ingelogd', True, time()+360 );
	setcookie('username', $ingegevenusername, time()+360);
	setcookie('password', $ingegevenpassword, time()+360);

	header('Location: opdracht-cookies.php');   //refresh
}



//DESTROY COOKIE (UITLOGGEN)

if( isset($_GET['cookie']) )
{
	if( $_GET['cookie']==='destroy' )
	{
		setcookie('ingelogd','', 1);
		setcookie('ingelogd',false);
		unset($_COOKIE['ingelogd']);

		header('Location: opdracht-cookies.php');   //refresh
	}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-cookies</title>
</head>
<body>
	
<?php if( isset($_COOKIE['ingelogd']) ): ?>

	<h2>Dashboard</h2>

	<p>U bent ingelogd.</p>

	<a href="opdracht-cookies.php?cookie=destroy">Uitloggen</a>


<?php else: ?>

	<h2>Inloggen</h2>

	<?php if( !$zijngegevenscorrect && isset($_POST['username']) && isset($_POST['password']) ): ?>
		<p>Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.</p>
	<?php endif ?>

	<form action="opdracht-cookies.php" method="post">

	<ul>
		<li>
			<label for="username">Gebruikersnaam: </label>
			<input type="text" name="username" id="username" value="<?= $ingegevenusername ?>">
		</li>

		<li>
			<label for="password">Paswoord: </label>
			<input type="password" name="password" id="password" value="<?= $ingegevenpassword ?>">
		</li>

		<!--<label><input type="checkbox" id="mijonthouden" value="mijonthouden"> Mij onthouden</label>-->
	</ul>

	<input type="submit" value="Verzenden">


<?php endif ?>


</body>
</html>