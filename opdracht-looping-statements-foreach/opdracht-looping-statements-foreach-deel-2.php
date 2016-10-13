<?php

	$tekst = file_get_contents("text-file.txt");

	$tekstlower = strtolower($tekst);
	$aantal= count_chars($tekstlower);
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-looping-statements-foreach-deel-2</title>
</head>
<body>
	<h2>Deel 2:</h2>
	<?php foreach (count_chars($tekstlower, 1) as $i => $value): ?>
		<li>Er was <?= $value ?> keer " <?= chr($i) ?> " in de tekst.</li>
	<?php endforeach ?>
</body>
</html>