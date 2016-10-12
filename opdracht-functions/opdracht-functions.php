<?php

	function berekensom($getal1, $getal2)
	{
		$resultaat = $getal1 + $getal2;

		return $resultaat;
	}

	function vermenigvuldig($getal1, $getal2)
	{
		$resultaat = $getal1 * $getal2;

		return $resultaat;
	}

	function isEven($getal)
	{
		$iseven= false;

		if($getal%2 ==0)
		{
			$iseven=true;
		}

		return $iseven;
	}

	function stringlengthupper($astring, $keuze)
	{
		$astring = strtoupper($astring);
		$stringarray = str_split($astring);

		if($keuze == 'lengte')
		{
			return strlen($astring);
		}
		elseif($keuze == 'uppercase')
		{
			return $stringarray;
		}
		else
		{
			return "Geen geldige keuze";
		}
	}


	//Deel 2

	$eenarray = array("choco", "boterham", "kaas", "confituur", "crème-glace");

	function drukArrayAf($array1)
	{
		for($i=0; $i<count($array1); ++$i)
		{
			echo "<p>Array[" . $i . "] heeft waarde '" . $array1[$i] . "'</p>";
		}
	}

	function validateHtmlTag($html)
	{
		$tagaanwezig = false;

		if( strpos($html, "<html>") !== false && strpos($html, "</html>") !== false )
		{
			$tagaanwezig = true;
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-functions</title>
</head>
<body>

	<h2>Deel 1:</h2>
	<p><?= berekensom(5, 3) ?></p>
	<p><?= vermenigvuldig(5, 3) ?></p>
	<p><?= isEven(8) ? "even getal" : "oneven getal" ?></p>

	<p><?php echo stringlengthupper("hallo", "lengte") ?></p>
	<p><?php echo implode(stringlengthupper("hoipiepeloi", "uppercase")) ?></p>


	<h2>Deel 2:</h2>
	<h2>Opdracht functies</h2>
	<?php drukArrayAf($eenarray) ?>

	<p><?php echo validateHtmlTag("<p>'Hallo, deze test moet als resultaat false geven.'</p>") ? "correcte html-tag aanwezig" : "correcte html-tag niet aanwezig" ?></p>

</body>
</html>