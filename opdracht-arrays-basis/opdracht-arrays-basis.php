<?php
	
	$dieren1[] = "aap";
	$dieren1[] = "leeuw";
	$dieren1[] = "tijger";
	$dieren1[] = "panter";
	$dieren1[] = "dolfijn";
	$dieren1[] = "olifant";
	$dieren1[] = "zeehond";
	$dieren1[] = "flamingo";
	$dieren1[] = "kameel";
	$dieren1[] = "krokodil";

	$dieren2 = array("konijn", "hond", "kat", "vogel", "vis", "kip", "koe", "paard", "ezel", "varken");

	$voertuigen = array( "landvoertuigen" => array("Vespa", "fiets") , "watervoertuigen" => array("surfplank", "vlot", "schoener", "driemaster") , "luchtvoertuigen" => array("luchtballon", "helicopter", "B52") );


	//Deel 2

	$getallen = array(1, 2, 3, 4, 5);

	$getallenvermenigvuldiging = $getallen[0]*$getallen[1]*$getallen[2]*$getallen[3]*$getallen[4];

	$onevengetallen;

	//--------

	for($i=0; $i<count($getallen); $i++)
	{
		if($getallen[$i]%2 != 0)
		{
			$onevengetallen[] = $getallen[$i];
		}
	}

	$onevengetallenstring = "";

	for($i=0; $i<count($onevengetallen); $i++)
	{
			$onevengetallenstring .= $onevengetallen[$i]." ";
	}

	//--------

	$getallen2 = array(5, 4, 3, 2, 1);

	$opgeteldegetallen;

	for($i=0; $i<count($getallen); $i++)
	{
		$opgeteldegetallen[] = $getallen[$i] + $getallen2[$i];
	}

	$opgeteldegetallenstring = "";

	for($i=0; $i<count($opgeteldegetallen); $i++)
	{
		$opgeteldegetallenstring .= $opgeteldegetallen[$i]." ";
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-arrays-basis</title>
</head>
<body>
	<h2>Deel 1:</h2>
	<p><?php echo var_dump($voertuigen) ?></p>

	<h2>Deel 2:</h2>
	<p><?php echo $getallenvermenigvuldiging ?></p>
	<p><?php echo $onevengetallenstring ?></p>
	<p><?php echo $opgeteldegetallenstring ?></p>
</body>
</html>