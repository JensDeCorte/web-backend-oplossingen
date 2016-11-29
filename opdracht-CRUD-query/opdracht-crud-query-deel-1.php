<?php

	$message = '';

	try
	{

		$db = new PDO( 'mysql:host=localhost;dbname=bieren', 'root', '', array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ) );

		$resultaat = $db->query('SELECT * FROM bieren as bi INNER JOIN brouwers as br ON(bi.brouwernr=br.brouwernr) WHERE bi.naam LIKE "du%" AND br.brnaam LIKE "%a%"');

		$resultaatArray = array();


		while( $row = $resultaat->fetch( PDO::FETCH_ASSOC ) ) 
		{
			array_push($resultaatArray, $row);
		}

	}
	catch( PDOException $e )
	{
		$message = 'Er ging iets mis. ' . $e->getMessage();
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-CRUD-query-deel-1</title>
</head>
<body>
	
	<p><?= $message ?></p>
	
<table>
	<thead>
		<th>---</th>
		<?php foreach($resultaatArray[0] as $key=>$value): ?>
			<th><?= $key ?></th>
		<?php endforeach ?>
	</thead>

	<tbody>
		<?php for( $i=0 ; $i<count($resultaatArray) ; $i++ ): ?>
			<tr>

				<td>
					<?= $i+1 ?>
				</td>

				<?php foreach($resultaatArray[$i] as $key=>$value): ?>
					<td><?= $value ?></td>
				<?php endforeach ?>

			</tr>
		<?php endfor ?>
	</tbody>
</table>

</body>
</html>