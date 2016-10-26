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



//DESTROY SESSION

if( isset($_GET['session']) )
{
	if($_GET['session'] === 'destroy')
	{
		session_destroy();
		header('Location: opdracht-sessions-deel-1.php');
	}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-sessions-deel-1</title>
</head>
<body>
	
	<form action="opdracht-sessions-deel-2.php" method="post">

	<ul>
		<li>
			<label for="email">E-mail: </label>
			<input type="text" name="email" id="email" value="<?= $email ?>">
		</li>

		<li>
			<label for="nickname">Nickname: </label>
			<input type="text" name="nickname" id="nickname" value="<?= $nickname ?>">
		</li>
	</ul>
	

	<input type="submit" value="Volgende">


	<a href="opdracht-sessions-deel-1.php?session=destroy"><input type="button" value="End session"></a>

</body>
</html>