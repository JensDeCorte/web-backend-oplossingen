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

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-arrays-functions</title>
</head>
<body>
	
	<h2>Deel 1:</h2>
	<p><?php echo count($dieren) ?></p>
	<p><?php echo $dierzoektekst ?></p>

</body>
</html>