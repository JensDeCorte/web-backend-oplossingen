<?php

	$getal = 59;
	$antwoord="";
	$standaardzin = "Het getal ligt tussen ";

	if(0<$getal && $getal<=10)
	{
		$antwoord = $standaardzin . "0 en 10";
	}
	elseif(10<$getal && $getal<=20)
	{
		$antwoord = $standaardzin . "10 en 20";
	}
	elseif(20<$getal && $getal<=30)
	{
		$antwoord = $standaardzin . "20 en 30";
	}
	elseif(30<$getal && $getal<=40)
	{
		$antwoord = $standaardzin . "30 en 40";
	}
	elseif(40<$getal && $getal<=50)
	{
		$antwoord = $standaardzin . "40 en 50";
	}
	elseif(50<$getal && $getal<=60)
	{
		$antwoord = $standaardzin . "50 en 60";
	}
	elseif(60<$getal && $getal<=70)
	{
		$antwoord = $standaardzin . "60 en 70";
	}
	elseif(70<=$getal && $getal<=80)
	{
		$antwoord = $standaardzin . "70 en 80";
	}
	elseif(80<=$getal && $getal<=90)
	{
		$antwoord = $standaardzin . "80 en 90";
	}
	elseif(90<=$getal && $getal<=100)
	{
		$antwoord = $standaardzin . "90 en 100";
	}
	else
	{
		$antwoord = "Je hebt geen getal tussen 0 en 100 opgegeven";
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-conditional-statements-if-elseif</title>
</head>
<body>
	<p><?php echo "Getal: ".$getal ?></p>
	<p><?php echo strrev($antwoord) ?></p>
</body>
</html>