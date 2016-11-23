<?php

	require_once("classes/Animal.php");
	require_once("classes/Lion.php");
	require_once("classes/Zebra.php");

	//-------------

	$tijger = new Animal("tijger", "man", 6);
	$kat = new Animal("kat", "man", 10);
	$vis = new Animal("vis", "vrouw", 3);

	$kat->changeHealth(8);

	//-------------

	$leeuw1 = new Lion("Simba", "man", 9, "Congo");
	$leeuw2 = new Lion("Scar", "vrouw", 2, "Kenia");

	//-------------

	$zebra1 = new Zebra("Zeke", "man", 7, "Quagga");
	$zebra2 = new Zebra("Zana", "vrouw", 10, "Selous");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-classes-extends</title>
</head>
<body>

<h2>Animal</h2>

	<p>
	<?= $tijger->getName(); ?> is van het geslacht <?= $tijger->getGender() ?> en heeft momenteel <?= $tijger->getHealth(); ?> levenspunten (special move: <?= $tijger->doSpecialMove() ?> )
	</p>

 	<p><?= $kat->getName(); ?> is van het geslacht <?= $kat->getGender() ?> en heeft momenteel <?= $kat->getHealth(); ?> levenspunten (special move: <?= $kat->doSpecialMove() ?> )</p> 

 	<p><?= $vis->getName(); ?> is van het geslacht <?= $vis->getGender() ?> en heeft momenteel <?= $vis->getHealth(); ?> levenspunten (special move: <?= $vis->doSpecialMove() ?> ) </p>


 <h2>Lion</h2>

  	<p>De speciale move van <?= $leeuw1->getName(); ?> (soort: <?=$leeuw1->getSpecies(); ?> lion) is: <?=$leeuw1->doSpecialMove(); ?></p>

 	<p>De speciale move van <?= $leeuw2->getName(); ?> (soort: <?=$leeuw2->getSpecies(); ?> lion) is: <?=$leeuw2->doSpecialMove(); ?></p>


<h2>Zebra</h2>

	 <p>De speciale move van <?= $zebra1->getName(); ?> (soort: <?=$zebra1->getSpecies(); ?>) is: <?=$zebra1->doSpecialMove(); ?></p>

 	<p>De speciale move van <?= $zebra2->getName(); ?> (soort: <?=$zebra2->getSpecies(); ?>) is: <?=$zebra2->doSpecialMove(); ?></p>

</body>
</html>