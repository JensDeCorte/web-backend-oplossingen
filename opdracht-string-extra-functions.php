<?php

	//deel 1

	$fruit = "kokosnoot";


	//deel 2

	$fruit2 = "ananas";


	//deel 3

	$lettertje = "e";
	$cijfertje = 3;
	$langstewoord = "zandzeepsodemineralenwatersteenstralen";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-string-extra-functions</title>
</head>
<body>
	
	<!-- deel 1 -->

	<p> <?php echo strlen($fruit) ?> </p>
	<p> <?php echo strpos($fruit, 'o') ?> </p>

	
	<!-- deel 2 -->

	<p> <?php echo strpos($fruit2, 'a' [, $offset = -1]) ?> </p>
	<p> <?php echo strtoupper($fruit2) ?> </p>


	<!-- deel 3 -->

	<p> <?php echo str_replace($lettertje, $cijfertje, $langstewoord) ?> </p>

</body>
</html>