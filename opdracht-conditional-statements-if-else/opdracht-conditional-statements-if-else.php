<?php

	$jaartal = 2016;

	$schrikkeljaar = false;

	if($jaartal%4 == 0){
		$schrikkeljaar = true;
	}
	if($jaartal %100 == 0){
		if($jaartal % 400 == 0){
			$schrikkeljaar = true;
		}
		else{
			$schrikkeljaar = false;
		}
	}

	$schrikkeljaartekst = "";

	if($schrikkeljaar){
		$schrikkeljaartekst = $jaartal . " is een schrikkeljaar.";
	}
	else{
		$schrikkeljaartekst = $jaartal . " is geen schrikkeljaar.";
	}


	//deel2


	$aantalseconden = 221108521;

	$aantalminuten = $aantalseconden/60;

	$aantaluren = $aantalminuten/60;

	$aantaldagen= $aantaluren/24;

	$aantalweken = $aantaldagen/7;

	$aantalmaanden = $aantaldagen/31;

	$aantaljaren = $aantaldagen/365;


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-conditional-statements-if-else</title>
</head>
<body>
	<h2>Deel 1:</h2>
	<p><?php echo $schrikkeljaartekst ?></p>

	<h2>Deel 2:</h2>
	<p><?php echo "Aantal seconden: " . $aantalseconden ?></p>

	<p>Resultaat:</p>

	<p><?php echo "Seconden: " . intval($aantalseconden) ?></p>
	<p><?php echo "Minuten: " . intval($aantalminuten) ?></p>
	<p><?php echo "Uren: " . intval($aantaluren) ?></p>
	<p><?php echo "Dagen: " . intval($aantaldagen) ?></p>
	<p><?php echo "Weken: " . intval($aantalweken) ?></p>
	<p><?php echo "Maanden: " . intval($aantalmaanden) ?></p>
	<p><?php echo "Jaren: " . intval($aantaljaren) ?></p>	

</body>
</html>