<?php

	
	$message = '';
	$brouwerij = '';

	try
	{

		$db = new PDO( 'mysql:host=localhost;dbname=bieren', 'root', '', array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ) );

		$resultaat = $db->query('SELECT brouwernr, brnaam FROM brouwers');

		$resultaatArray=array();

		while ($row=$resultaat->fetch()) 
		{
			array_push($resultaatArray,$row);
		}

	}
	catch( PDOException $e )
	{
		$message = 'Er ging iets mis. ' . $e->getMessage();
	}


	if (isset($_GET["brouwerij"])) 
	{

		$brouwerij = $_GET["brouwerij"];

		$brouwerijResultaat=array();

		$brouwerijQuery = $db->prepare('SELECT b.naam FROM bieren as b INNER JOIN brouwers as br ON (br.brouwernr=b.brouwernr) WHERE br.brouwernr LIKE :brouwerij');

		$brouwerijQuery->bindValue(":brouwerij", $brouwerij);

		$brouwerijQuery->execute();

		while ($row=$brouwerijQuery->fetch( PDO:: FETCH_ASSOC)) 
		{
			array_push($brouwerijResultaat,$row);
		}

	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-CRUD-query-deel-2</title>
</head>
<body>
	
	<p><?=$message ?></p>


	<form action="opdracht-crud-query-deel-2.php" method="get">
		<select name="brouwerij">

			<?php for ($i=0; $i < count($resultaatArray) ; $i++):?>
					<option 
						<?php if( $resultaatArray[$i][0] == $brouwerij ) { echo "selected"; } ?> value="<?= $resultaatArray[$i][0] ?>"><?= $resultaatArray[$i][1] ?>
					</option>
			<?php endfor ?>

		</select>
 		<button type="submit" name="submit">GO!</button>
    </form>



<?php if (isset($_GET["brouwerij"])): ?>

 <table>

 	<thead>
 		<th>---</th>
 		<?php foreach ($brouwerijResultaat[0] as $key=>$value): ?> 
 			<th><?= $key ?></th>
 		<?php endforeach ?>
 	</thead>

  	<tbody>

	  	<?php for ($i=0; $i < count($brouwerijResultaat) ; $i++): ?>
	  		<tr> 
	  			<td><?= $i+1 ?></td>
	  			<?php foreach ($brouwerijResultaat[$i] as $key => $value): ?> 
	  				<td><?= $value ?></td>
	  			<?php endforeach ?>
	  		</tr>
		<?php endfor ?>

 	</tbody>

 </table>

<?php endif ?>

</body>
</html>