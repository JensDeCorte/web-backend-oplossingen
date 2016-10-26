<?php

session_start();


$email = '';
$nickname = '';


if( isset($_POST['email']) )
{
	$_SESSION['email'] = $_POST['email'];
}

if( isset($_POST['nickname']) )
{
	$_SESSION['nickname'] = $_POST['nickname'];
}



if( isset($_SESSION['email']) )
{
	$email = $_SESSION['email'];
}

if( isset($_SESSION['nickname']) )
{
	$nickname = $_SESSION['nickname'];
}





$straat = '';
$nummer = '';
$gemeente = '';
$postcode = '';


if( isset($_POST['straat']) )
{
	$_SESSION['straat'] = $_POST['straat'];
}

if( isset($_POST['nummer']) )
{
	$_SESSION['nummer'] = $_POST['nummer'];
}

if( isset($_POST['gemeente']) )
{
	$_SESSION['gemeente'] = $_POST['gemeente'];
}

if( isset($_POST['postcode']) )
{
	$_SESSION['postcode'] = $_POST['postcode'];
}



if( isset($_SESSION['straat']) )
{
	$straat = $_SESSION['straat'];
}

if( isset($_SESSION['nummer']) )
{
	$nummer = $_SESSION['nummer'];
}

if( isset($_SESSION['gemeente']) )
{
	$gemeente = $_SESSION['gemeente'];
}

if( isset($_SESSION['postcode']) )
{
	$postcode = $_SESSION['postcode'];
}



//DESTROY SESSION

if( isset($_GET['session']) )
{
	if($_GET['session'] === 'destroy')
	{
		session_destroy();
		header('Location: opdracht-sessions-deel-2.php');
	}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-sessions-deel-2</title>
</head>
<body>
	

	<h2>Registratiegegevens</h2>

	<p>E-mail: <?= $email ?></p>
	<p>Nickname: <?= $nickname ?></p>



<!-- DEEL 2 -->

	<form action="opdracht-sessions-deel-3.php" method="post">

	<ul>
		<li>
			<label for="straat">Straat: </label>
			<input type="text" name="straat" id="straat" value="<?= $straat ?>">
		</li>

		<li>
			<label for="nummer">Nummer: </label>
			<input type="text" name="nummer" id="nummer" value="<?= $nummer ?>">
		</li>

		<li>
			<label for="gemeente">Gemeente: </label>
			<input type="text" name="gemeente" id="gemeente" value="<?= $gemeente ?>">
		</li>

		<li>
			<label for="postcode">Postcode: </label>
			<input type="postcode" name="postcode" id="postcode" value="<?= $postcode ?>">
		</li>
	</ul>

	<a href="opdracht-sessions-deel-1.php"><input type="button" value="Vorige"></a>
	

	<input type="submit" value="Volgende">


	<a href="opdracht-sessions-deel-2.php?session=destroy"><input type="button" value="End session"></a>


</body>
</html>