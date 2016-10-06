<?php
	
	$voornaam = "Jens";
	$familienaam = "De Corte";

	$volledigeNaam = $voornaam . " " . $familienaam;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-string-concatenate</title>
</head>
<body>
	
	<p> <?php echo $volledigeNaam ?> </p>
	<p> <?php echo strlen($volledigeNaam) ?> </p>

</body>
</html>