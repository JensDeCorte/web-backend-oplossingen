<?php

	function berekenKapitaal( $data )
	{
		
		if ( $data[ 'teller' ] <= $data[ 'duurtijd' ] )
		{
			$renteGeld = floor( $data['geld'] * ( $data['rentepercentage'] / 100 ) );
			$data['geld'] += $renteGeld;
			$data['bedragelkjaar'][ $data['teller'] ] = 'Nieuw geld = ' . $data['geld'] . '€ --- Rente = ' . $renteGeld . '€';

			$data['teller']++;

			return berekenKapitaal( $data );
		}
		else
		{
			return $data;
		}
	}

	$startGeld = 100000;
	$rente = 8;
	$aantaljaar = 10;

	$winst = berekenKapitaal( array( 'geld' => $startGeld, 'rentepercentage' => $rente, 'duurtijd' => $aantaljaar,'teller'	=> 1,'bedragelkjaar' =>	array() ) );

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-functions-recursive-deel-2</title>
</head>
<body>
	<h2>Deel 2:</h2>
	<?php foreach ($winst['bedragelkjaar'] as $resultaat): ?>
		<li><?php echo $resultaat ?></li>
	<?php endforeach ?>
</body>
</html>