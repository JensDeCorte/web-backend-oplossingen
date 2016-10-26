<?php

$timestamp = mktime(22, 35, 25, 1, 21, 1904);

$datum = date('d F Y, h:i:s a', $timestamp);


setlocale(LC_ALL, 'nld_nld');

$datumnederlands = strftime("%d %B %Y, %H:%M:%S", $timestamp);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-date</title>
</head>
<body>
	
	<h2>Deel 1:</h2>

	<p><?= 'Timestamp: '.$timestamp ?></p>

	<p><?= 'Datum: '.$datum ?></p>


	<h2>Deel 2:</h2>

	<p><?= 'Datum: '.$datumnederlands ?></p>


</body>
</html>