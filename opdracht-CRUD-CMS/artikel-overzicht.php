<?php

	session_start();


	$user = explode(",",$_COOKIE["login"]);
	$email = $user[0];
	$message = "";

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=opdracht-CRUD-CMS', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch( PDOException $e )
	{
		$message = 'Geen connectie: ' . $e->getMessage();
	}

	$result = $db->query('SELECT * FROM artikels WHERE is_archived IS NULL');
	$queryresult = array();

	while($row=$result->fetch()) 
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

	<a href="dashboard.php">Mijn dashboard</a>
	<p>Ingelogd als <?=$email ?>
	<a href="dashboard.php?uitloggen=true">Uitloggen</a>
	<p><?php if(isset($_SESSION["notification"])) 
 	{
 	echo $_SESSION["notification"];
 	}
 	?>

	<h1>Artikel Overzicht</h1>
	<a href="artikel-toevoegen.php">Artikel toevoegen</a>

	<?php for ($i=0; $i < count($queryresult) ; $i++): ?>
 	 		<article class="<?php if($queryresult[$i]["is_active"]==null) { echo "grey";} ?>">
 	 			<h1><?=$queryresult[$i]["titel"]?></h1>
 	 			<p><?=$queryresult[$i]["datum"]?></p>
 	 			<p><?=$queryresult[$i]["artikel"]?></p>
 	 			<p>Kernwoorden: <?=$queryresult[$i]["kernwoorden"] ?></p>

 	 			<?php if ($queryresult[$i]["is_active"]==null): ?>
 	 				<a href='artikel-activeren.php?id=<?php echo $queryresult[$i]["id"] ?>'>Artikel activeren</a>
 	 			<?php else: ?>
 	 				<a href="artikel-activeren.php?id=<?php echo $queryresult[$i]["id"]."&currentstate=".$queryresult[$i]["is_active"]?>">Artikel de-activeren</a>
 	 			<?php endif ?>

 	 			<a href="artikel-wijzigen.php?id=<?=$queryresult[$i]["id"]?>">Artikel wijzigen</a>
 	 			<a href="artikel-verwijderen.php?id=<?=$queryresult[$i]["id"]?>">Artikel verwijderen</a>
 	 		</article>
		<?php endfor ?>

</body>
</html>