<?php
	
	$titel1 = "Wereldleiders 'in shock' na overwinning Trump";
	$titel2 = "Max Verstappen na indrukwekkende Braziliaanse GP verkozen tot 'Driver of The Day'";
	$titel3 = "Ook Rode Duivels houden indrukwekkende Mannequin Challenge";

	$text1 = "Vanuit alle hoeken van de wereld stromen reacties binnen op de overwinning van de Republikein Donald Trump. Europese leiders reageren voorzichtig of ronduit geschokkeerd. Vanuit Rusland en het rechts-populistische front komen positieve reacties.
		De Israëlische premier Benjamin Netanyahu toont zich verheugd over de verkiezing van Donald Trump: ‘De verkozen president Trump is een ‘ware vriend’ van de Staat Israël en ik kijk er naar uit om met hem samen te werken op het gebied van veiligheid en vrede in onze regio.’

		De Duitse Bondskanselier Angela Merkel de Franse president François Hollande hebben Trump woensdag rond de middag gefeliciteerd. Merkel gaf commentaar op de ‘harde confrontaties’ tijdens de de Amerikaanse verkiezingscampagne en zegt dat de bondgenootschap met de VS een essentiele schakel blijft voor het Duitse buitenlandbeleid. Hollande waarschuwt voor een ‘onzekere periode’ en benadrukt dat Trumps overwinning betekent dat Frankrijk sterker moet zijn en pleit voor meer eenheid in Europa.";
	$text2 = "Max Verstappen is tijdens de GP van Brazilië door de F1-fans verkozen tot 'Driver of The Day'.
			Als een verrassing komt het niet dat Verstappen tot 'Driver of The Day' werd verkozen. De Nederlander imponeerde door onder moeilijke omstandigheden in de regen de ene rijder na de andere te passeren. Even ontsnapte Verstappen wel aan een crash, maar zelfs daarna bleef Verstappen er voluit voor gaan. 

			Verstappen eindigde de race als derde op het podium. Naast de trofee op het podium beloonden dus ook de fans Verstappen door hem opnieuw tot 'Driver of The Day' te verkiezen.";
	$text3 = "De Rode Duivels konden niet uitblijven in de nieuwste rage op sociale media: de Mannequin Challenge. De kunst is om een filmpje te maken waarin de deelnemers als paspoppen stokstijf stil proberen te staan. En het moet gezegd: de Rode Duivels kunnen dat erg goed, stilstaan...
		Aan uitblinkers geen gebrek: Batshuayi die aan het truitje trekt, Hazard met een relaxte pose op de grond (uiteraard), een valsspelende Vertonghen, de opscheppende Courtois of de etende Lukaku...";


	$artikels = array( 
						array(	'title'	=> 	$titel1, 
								'text' 	=> 	$text1	),

						array(	'title' => 	$titel2, 
								'text' 	=>	$text2	),

						array(	'title' => 	$titel3, 
								'text' 	=> 	$text3	)
						); 

	include 'view/header-partial.html';
	include 'view/body-partial.html';
	include 'view/footer-partial.html';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-include-require</title>
</head>
<body>
	
</body>
</html>