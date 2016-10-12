<?php

	$tekst = file_get_contents("text-file.txt");

	$tekstlower = strtolower($tekst);
	$aantal= count_chars($tekstlower);
	
?>

<?php
$text=file_get_contents("text-file.txt");
$textlowwer=strtolower($text);
$count=count_chars($textlowwer);
foreach (count_chars($textlowwer, 1) as $i => $val) {
   echo "Er was $val keer  \"" , chr($i) , "\" in de tekst." . "<br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-looping-statements-foreach-deel-2</title>
</head>
<body>
	<h2>Deel 2:</h2>
	<?php foreach (count_chars(tekstlower, 1) as $i => $value): ?>
		<li>Er was <?= $val ?> keer <?php chr($i) ?> in de tekst.</li>
	<?php endforeach ?>
</body>
</html>