<?php
	
	$rijen = 10;
	$kolommen = 10;


	//Deel 3

	$tafels = array();

	for ($i=0 ; $i <= $rijen ; ++$i) 
	{ 
		$vermenigvuldigingen = array();

		for($j=0 ; $j<= $kolommen ; ++$j)
		{
			$vermenigvuldigingen[] = $i*$j;
		}

		$tafels[$i] = $vermenigvuldigingen;
	}

	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-looping-statements-for</title>
</head>
<body>
	<h2>Deel 1:</h2>
	<table>
		
		<?php for($i=0 ; $i<$rijen ; ++$i): ?>
			<tr>

			<?php for($j=0 ; $j<$kolommen ; ++$j): ?>
				<td>kolom</td>
			<?php endfor ?>

			</tr>
		<?php endfor ?>

	</table>

	<!-- DEEL 2 -->

	<h2>Deel 2:</h2>
	<table>
		
		<?php for($i=0 ; $i<=$rijen ; ++$i): ?>
			<tr>
				
			<?php for($j=0 ; $j <=$kolommen ; ++$j): ?>
				<td 
					<?php if( ($i*$j)%2 != 0 )
					{
						echo " class='oneven'";
					}
					?> 
					> 
					<?php echo $i*$j ?> 
				</td>
			<?php endfor?>

			</tr>
		<?php endfor ?>

	</table>

	<!-- DEEL 3 -->

	<h2>Deel 3:</h2>

	<table>

	<?php foreach($tafels as $rij): ?>
		<tr>
			
			<?php foreach($rij as $kolom): ?>
				<td <?php if($kolom%2 != 0){ echo "class = 'oneven'"; } ?>>
					<?php echo $kolom ?>
				</td>
			<?php endforeach ?>

		</tr>
	<?php endforeach ?>

	</table>

	<!-- DEEL 4 -->

	<h2>Deel 4:</h2>

	<table>

	<thead>
		<th>Tafel</th>
		<?php
			for($i=0; $i<=$kolommen; ++$i)
			{
				echo "<th>".$i."</th>";
			}
		?>
	</thead>

	<tbody>
		
		<?php foreach($tafels as $kolommen=>$rijen): ?>
			<tr>
				<td><?= $kolommen ?></td>
				<?php foreach($rijen as $getal): ?>
					<td <?php if($getal%2 != 0){ echo "class='oneven'"; } ?>>
						<?php echo $getal ?>
					</td>
				<?php endforeach ?>
			</tr>
		<?php endforeach ?>

	</tbody>

	</table>

</body>
</html>

<style>
	
	.oneven
	{
		background-color: green;
	}

</style>