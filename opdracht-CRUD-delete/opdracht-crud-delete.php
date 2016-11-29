<?php

	$message = "";
	$todelete = "-2";
	$nrtodelete = "-2";
	$areyousure = false;
	$query = 0;
	$querysucces = false;

	try
	{

		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	}
	catch ( PDOException $e )
	{
		$message= 'Er ging iets mis. ' . $e->getMessage();
	}

	$result = $db->query('SELECT * FROM brouwers');
	$queryresult = array();

	while ($row=$result->fetch( PDO:: FETCH_ASSOC)) 
	{
		array_push($queryresult,$row);
	}

	if (isset($_POST["delete"])) 
	{
		$todelete = $_POST["delete"];
		$areyousure = true;
	}

	if (isset($_POST["confirm"])) 
	{
		$nrtodelete = $_POST["confirm"];

		if ($nrtodelete == "No") 
		{
			$areyousure = false;
		}
		else
		{
			$areyousure=false;
			$querytodelete = "DELETE FROM brouwers WHERE brouwernr = :brouwernr";
			$query = $db->prepare($querytodelete);
			$query->bindValue(":brouwernr", $_POST["confirm"]);
			$querysucces = $query->execute();
		}

	}

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Opdracht-crud-delete</title>
 </head>
 <body>

 	<p><?=$message ?></p>

	<?php if($areyousure): ?>
		<p>Are you sure you want to delete the row with number <?= $todelete ?>? </p>
		<form action="opdracht-crud-delete.php" method="post">
		<button type="submit" name="confirm" value="<?= $todelete ?>">Yes</button>
		<button type="submit" name="confirm" value="No">No</button>
		</form>
	<?php endif ?>

	<?php if($querysucces): ?>
		<p>De rij is verwijderd</p>
	<?php endif ?>

 <table>
 	<thead>
 		<th>---</th>
 			<?php foreach ($queryresult[0] as $key=>$value): ?> 
 				<th><?= $key ?></th>
 			<?php endforeach ?>
 		<th>Delete</th>
 	</thead>

 	<tbody>
 		<?php for ($i=0; $i < count($queryresult) ; $i++): ?>

 	 		<tr>
 	 			<td><?= $i+1 ?></td>

 	 			<?php foreach ($queryresult[$i] as $key => $value): ?> 
 	 				<td><?=$value ?></td>
 	 			<?php endforeach ?>

 	 			<td>
 	 				<form action="opdracht-crud-delete.php" method="post">
 	 					<button type="submit" name="delete" value="<?=$queryresult[$i]["brouwernr"]?>">Remove</button>
 	 				</form>
				</td>
 	 		<tr>

		<?php endfor ?>
 	</tbody>
 </table>

 </body>
 </html>