<?php
	
	$md5HashKey = "d1fa402db91a7a93c4f414b8278ce073";


	function findinstring1($zoekhiernaar)
	{
		$md5HashKey = "d1fa402db91a7a93c4f414b8278ce073";

		$aantal = substr_count($md5HashKey, $zoekhiernaar);

		$percentage = ($aantal/strlen($md5HashKey))*100;

		return "De needle '" . $zoekhiernaar . "' komt " . $percentage . "% voor in de hash key '" . $md5HashKey . "'";
	}

	function findinstring2($zoekhiernaar)
	{
		global $md5HashKey;

		$aantal = substr_count($md5HashKey, $zoekhiernaar);

		$percentage = ($aantal/strlen($md5HashKey))*100;

		return "De needle '" . $zoekhiernaar . "' komt " . $percentage . "% voor in de hash key '" . $md5HashKey . "'";
	}

	function findinstring3($md5HashKey, $zoekhiernaar)
	{
		$aantal = substr_count($md5HashKey, $zoekhiernaar);

		$percentage = ($aantal/strlen($md5HashKey))*100;

		return "De needle '" . $zoekhiernaar . "' komt " . $percentage . "% voor in de hash key '" . $md5HashKey . "'";
	} 


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-functions-gevorderd-deel-1</title>
</head>
<body>
	<h2>Deel 1:</h2>

	<p><?= findinstring1("2") ?></p>
	<p><?= findinstring2("8") ?></p>
	<p><?= findinstring3($md5HashKey, "a") ?></p>
</body>
</html>