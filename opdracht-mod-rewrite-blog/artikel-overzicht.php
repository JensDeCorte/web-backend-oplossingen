<?php

	session_start();


	$message = "";

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=opdracht-mod-rewrite-blog', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch( PDOException $e )
	{
		$message = 'Geen connectie: ' . $e->getMessage();
	}


	$result = $db->query('SELECT * FROM artikels');
	$queryresult = array();


	while ($row = $result->fetch()) 
	{
		array_push($queryresult,$row);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Overzicht</title>
	<style>
		.grey{
			background-color: grey;
		}
		article{
			border: 2px solid black;
			margin-top: 10px;
		}
	</style>
</head>
<body>

	<p><?php if(isset($_SESSION["notification"])) 
 				{
 					echo $_SESSION["notification"];
 				}
 		?>

	<h1>Artikel Overzicht</h1>

	<form action="artikel-zoeken-redirect.php" method="get">
		<input type="text" name="zoeken" placeholder="Zoeken">
		<button type="submit">Zoek op inhoud</button>
	</form>

	<form action="artikel-zoeken-redirect.php" method="get">
		<input type="text" name="jaartal" placeholder="Datum">
		<button type="submit">Zoek op datum</button>
	</form>

	<a href="toevoegen/">Artikel Toevoegen</a>
	<?php for($i=0 ; $i < count($queryresult) ; $i++): ?>
 	 	<article>
 	 		<h1><?=$queryresult[$i]["titel"]?></h1>
 	 		<p><?=$queryresult[$i]["datum"]?></p>
 	 		<p><?=$queryresult[$i]["artikel"]?></p>
 	 		<p>Kernwoorden: <?=$queryresult[$i]["kernwoorden"] ?></p>
 	 	</article>
	<?php endfor ?>

</body>
</html>