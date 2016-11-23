<?php

	$classname = 'Percent';

	require_once("classes/".$classname.".php");

	$Percent1 = new Percent(150, 100);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-classes-begin</title>
</head>
<body>

<table>
<tbody>

	<tr>
		<td>Absoluut</td>
		<td><?=$Percent1->absolute ?></td>
	</tr>

	<tr>
		<td>Relatief</td>
		<td><?=$Percent1->relative ?></td>
	</tr>

	<tr>
		<td>Geheel getal</td>
		<td><?=$Percent1->hundred ?>%</td>
	</tr>

	<tr>
		<td>Nominaal</td>
		<td><?=$Percent1->nominal ?></td>
	</tr>

</tbody>
</table>

</body>
</html>