<?php

	$getal = 6;
	$weekdag = "";

	switch($getal)
	{
		case 1:
			$weekdag="Maandag";
			break;

		case 2:
			$weekdag="Dinsdag";
			break;

		case 3:
			$weekdag="Woensdag";
			break;

		case 4:
			$weekdag="Donderdag";
			break;

		case 5:
			$weekdag="Vrijdag";
			break;

		case 6:
			$weekdag="Zaterdag";
			break;

		case 7:
			$weekdag="Zondag";
			break;

		default:
			$weekdag="Geen geldige dag";
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-conditional-statements-switch</title>
</head>
<body>
	<p><?php echo strtolower($weekdag) ?></p>
</body>
</html>