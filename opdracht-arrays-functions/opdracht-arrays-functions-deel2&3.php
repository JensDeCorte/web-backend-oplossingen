<?php

	$dieren = array("aap", "olifant", "tijger", "leeuw", "dolfijn", "kangoeroe", "flamingo", "giraf", "panter");

	$teZoekenDier = "tijger";
	$dierzoektekst;

	if(in_array($teZoekenDier, $dieren))
	{
		$dierzoektekst = "Het dier is gevonden!";
	}
	else
	{
		$dierzoektekst = "Het dier is niet gevonden.";
	}


	//deel 2

	sort($dieren);

	$gesorteerdedierentekst = "";

	for($i=0;$i<count($dieren); $i++)
	{
		$gesorteerdedierentekst .= $dieren[$i]." ";
	}


	$zoogdieren = array("hond", "kat", "varken");


	$dierenlijst = array_merge($dieren, $zoogdieren);


	//deel 3

	$getallen = array(8, 7, 8, 7, 3, 2, 1, 2, 4);

	$getallenzonderduplicaat = array_unique($getallen);
	rsort($getallenzonderduplicaat);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-arrays-functions</title>
</head>
<body>
	
	<h2>Deel 2:</h2>
	<p><?php echo $gesorteerdedierentekst ?></p>
	<p><?php echo print_r($dierenlijst) ?></p>

	<h2>Deel 3:</h2>
	<p><?php echo print_r($getallenzonderduplicaat) ?></p>

</body>
</html>