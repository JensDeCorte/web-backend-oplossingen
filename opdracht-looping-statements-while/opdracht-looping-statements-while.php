<?php

	//Deel 2

	$boodschappenlijstje = array("choco", "crème-glace", "confituur", "waspoeder", "brood", "icetea", "nesquick");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-looping-statements-while</title>
</head>
<body>

	<h2>Deel 1:</h2>
	<p>
		<?php
			$getal = 0; 
			while($getal<=100)
			{
				echo $getal.", ";
				++$getal;
			} 
		?>	
	</p>

	<p>
		<?php
			$getal=41;
			while($getal<80)
			{
				if($getal%3 == 0)
				{
					echo $getal.", ";
				}
				++$getal;
			}
		?>
	</p>


	<h2>Deel 2:</h2>
	<ul>

		<?php 
			$i = 0;
			while($i<count($boodschappenlijstje)):
			
		?>

			<li><?php echo $boodschappenlijstje[$i] ?></li>

		<?php 
			$i++; 
			endwhile; 
		?>

	</ul>

</body>
</html>