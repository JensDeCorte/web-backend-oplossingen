<?php

	$message = "";
	$info = "";

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch( PDOException $e )
	{
		$message = 'Er ging iets mis. ' . $e->getMessage();
	}

	$result = $db->query('SELECT br.biernr,br.naam,b.brnaam,s.soort,br.alcohol FROM bieren as br INNER JOIN brouwers as b ON(br.brouwernr=b.brouwernr) INNER JOIN soorten as s ON(s.soortnr=br.soortnr)');

	$queryresult = array();

	while($row = $result->fetch( PDO:: FETCH_ASSOC)) 
	{
		array_push($queryresult,$row);
	}

	if(isset($_GET["orderby"])) 
	{
		$orderon = $_GET["orderby"];
		$orderdir = " " . $_GET["dir"];
		
		$orderquery='SELECT br.biernr,br.naam,b.brnaam,s.soort,br.alcohol FROM bieren as br INNER JOIN brouwers as b ON(br.brouwernr=b.brouwernr) INNER JOIN soorten as s ON(s.soortnr=br.soortnr) ORDER BY '.$orderon.$orderdir;

		$result = $db->query($orderquery);
		$queryresult = array();

		while( $row=$result->fetch( PDO:: FETCH_ASSOC ) ) 
		{
			array_push($queryresult,$row);
		}

		$info="Gesorteerd op " .$orderon.$orderdir;
	}

?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Opdracht-CRUD-query-order-by</title>
 </head>
 <body>

	<p><?= $message ?></p>

 	<p><?= $info ?></p>

	<table>
	 	<thead>
	 		<th>---</th>
	 		<?php foreach ($queryresult[0] as $key=>$value): ?> 
	 			<th>
	 			<a href="?orderby=<?= $key ?>&dir=<?php
	 			if(isset($_GET["dir"])) 
	 			{
	 				if ($_GET["dir"]=="DESC") 
	 				{
	 					echo "";
	 				}
	 				
	 				if ($_GET["dir"]=="") 
 					{
 						echo "DESC";
 					}
	 			}
	 			else
	 			{
	 				echo "DESC";
	 			}
	 			?>"><?= $key ?></a>
 			 </th>
 		<?php endforeach ?>
 	</thead>

  	<tbody>
 	 	<?php for ($i=0; $i < count($queryresult) ; $i++): ?>
 	 		<tr>
 	 		<td><? $i+1 ?></td>
 	 		<?php foreach ($queryresult[$i] as $key=>$value): ?> 
 	 			<td><?= $value ?></td>
 	 		<?php endforeach ?>
 	 		</tr>
		<?php endfor ?>
 	</tbody>
 </table>

 </body>
 </html>