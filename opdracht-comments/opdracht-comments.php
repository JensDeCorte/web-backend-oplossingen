<?php
	
	$voornaam = "Jens";
	$naam = "De Corte";
	$email = "@student.kdg.be"

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-comments</title>
</head>
<body>
	
	<p> <?php echo $voornaam . " " . $naam ?></p>
	<p> <?= $voornaam . " " . $naam ?> </p>

	<p>
		<?php
			/*
			* echo $naam
			* echo $voornaam . "." . $naam . $email
			*/
		?>
	</p>

</body>
</html>