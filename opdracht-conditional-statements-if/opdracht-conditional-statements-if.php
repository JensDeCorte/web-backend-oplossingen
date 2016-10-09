<?php

	$getal = 1;

	$dag = "";

	if($getal == 1){
		$dag = "maandag";
	}
	if($getal == 2){
		$dag = "dinsdag";
	}
	if($getal == 3){
		$dag = "woensdag";
	}
	if($getal == 4){
		$dag = "donderdag";
	}
	if($getal == 5){
		$dag = "vrijdag";
	}
	if($getal == 6){
		$dag = "zaterdag";
	}
	if($getal == 7){
		$dag = "zondag";
	}


	//deel 2

	$daycaps = strtoupper($dag);

	$daylowera = str_replace('A', 'a', $daycaps);

	$daylowerlasta = substr_replace($daycaps, 'a', strrpos($daycaps, 'A'), 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-conditional-statements-if</title>
</head>
<body>
	<h2>Deel 1:</h2>
	<p><?php echo $dag ?></p>

	<h2>Deel 2:</h2>
	<p><?php echo $daycaps ?> </p>
	<p><?php echo $daylowera ?></p>
	<p><?php echo $daylowerlasta ?></p>
</body>
</html>