<?php

session_start();


$email = '';
$nickname = '';
$straat = '';
$nummer = '';
$gemeente = '';
$postcode = '';


if( isset($_POST['email']) )
{
	$_SESSION['email'] = $_POST['email'];
}

if( isset($_POST['nickname']) )
{
	$_SESSION['nickname'] = $_POST['nickname'];
}

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




if( isset($_SESSION['email']) )
{
	$email = $_SESSION['email'];
}

if( isset($_SESSION['nickname']) )
{
	$nickname = $_SESSION['nickname'];
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
		header('Location: opdracht-sessions-deel-3.php');
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
	

	<h2>Overzichtspagina</h2>


	<p>E-mail: <?= $email ?> | <a href="opdracht-sessions-deel-1.php">Wijzig</a></p>
	<p>Nickname: <?= $nickname ?> | <a href="opdracht-sessions-deel-1.php">Wijzig</a></p>
	<p>Straat: <?= $straat ?> | <a href="opdracht-sessions-deel-2.php">Wijzig</a></p>
	<p>Nummer: <?= $nummer ?> | <a href="opdracht-sessions-deel-2.php">Wijzig</a></p>
	<p>Gemeente: <?= $gemeente ?> | <a href="opdracht-sessions-deel-2.php">Wijzig</a></p>
	<p>Postcode: <?= $postcode ?> | <a href="opdracht-sessions-deel-2.php">Wijzig</a></p>


	<a href="opdracht-sessions-deel-2.php"><input type="button" value="Vorige"></a>

	<a href="opdracht-sessions-deel-3.php?session=destroy"><input type="button" value="End session"></a>


</body>
</html>