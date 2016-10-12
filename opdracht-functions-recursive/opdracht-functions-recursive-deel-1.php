<?php

	function renteCalculate( $geld, $percentage, $duurtijd )
	{
		static $teller		=	1;
		static $bedragelkjaar	=	array();

		if ( $teller <= $duurtijd )
		{
			$renteGeld = floor( $geld * ( $percentage / 100 ) );
			$nieuwGeld = $geld + $renteGeld;
			$bedragelkjaar[$teller]= 'Rente = ' . $renteGeld . '€ --- Nieuw geld = ' . $nieuwGeld . '€';

			++$teller;

			return renteCalculate( $nieuwGeld, $percentage, $duurtijd );
		}
		else
		{
			return $bedragelkjaar;
		}
	}

	$startGeld = 100000;
	$rentepercentage = 8;
	$aantaljaar = 10;

	$winst = renteCalculate( $startGeld, $rentepercentage, $aantaljaar );

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-functions-recursive-deel-1</title>
</head>
<body>
	<h2>Deel 1:</h2>
	<?php foreach ($winst as $resultaat): ?>
		<li><?php echo $resultaat ?></li>
	<?php endforeach ?>
</body>
</html>