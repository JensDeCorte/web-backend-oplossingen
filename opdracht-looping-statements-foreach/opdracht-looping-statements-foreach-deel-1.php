<?php

	$tekst = file_get_contents("text-file.txt");

	$tekstchars = str_split($tekst);

	rsort($tekstchars);

	$letters = array_reverse($tekstchars);

	$hoeveelLetters = array();
	

	foreach($letters as $letter)
	{

		if(isset($hoeveelLetters[$letter]))
		{
			$hoeveelLetters[$letter]++;
		}
		else
		{
			$hoeveelLetters[$letter]=1;
		}

	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-looping-statements-foreach-deel-1</title>
</head>
<body>
	<h2>Deel 1:</h2>
	<p><?php var_dump($letters) ?></p>
	<p><?php var_dump($hoeveelLetters) ?></p>
</body>
</html>