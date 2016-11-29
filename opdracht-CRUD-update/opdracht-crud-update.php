<?php 

	$message = "";
	$todelete = "-2";
	$nrtodelete = "-2";
	$querysucces = false;
	$areyousure = false;
	$showeditform = false;
	$queryeditsucces = false;
	$query = 0;

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch( PDOException $e )
	{
		$message = 'Er ging iets mis. ' . $e->getMessage();
	}

	$result = $db->query('SELECT * FROM brouwers');
	$queryresult = array();

	while($row=$result->fetch( PDO:: FETCH_ASSOC)) 
	{
		array_push($queryresult,$row);
	}

	if(isset($_POST["delete"])) 
	{
		$todelete = $_POST["delete"];
		$areyousure = true;
	}

	if(isset($_POST["confirm"])) 
	{
		$nrtodelete = $_POST["confirm"];
		if ($nrtodelete == "No") 
		{
			$areyousure = false;
		}
		else
		{
			$areyousure = false;
			$querytodelete = "DELETE FROM brouwers WHERE brouwernr = :brouwernr";
			$query = $db->prepare($querytodelete);
			$query->bindValue(":brouwernr", $_POST["confirm"]);
			$querysucces = $query->execute();
		}
	}

	if(isset($_POST["edit"])) 
	{
		$showeditform = true;
	}

	if(isset($_POST["change"])) 
	{
		$showeditform = false;
		$querytoedit = "UPDATE brouwers SET brnaam=:changenaam,adres=:changeadres,postcode=:changepostcode,gemeente=:changegemeente,omzet=:changeomzet WHERE brouwernr=:brouwernr";
		$query_edit = $db->prepare($querytoedit);
		$query_edit->bindValue(":changenaam", $_POST["changenaam"]);
		$query_edit->bindValue(":changeadres", $_POST["changeadres"]);
		$query_edit->bindValue(":changepostcode", $_POST["changepostcode"]);
		$query_edit->bindValue(":changegemeente", $_POST["changegemeente"]);
		$query_edit->bindValue(":changeomzet", $_POST["changeomzet"]);
		$query_edit->bindValue(":brouwernr", $_POST["brouwernummer"]);
		$queryeditsucces = $query_edit->execute();
	}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Opdracht-CRUD-update</title>
 </head>
 <body>

 	<p><?= $message ?></p>


 	<?php if($showeditform): ?>

 		<h1>Brouwerij <?= $_POST["brouwernaam"] ?> met nummer  <?= $_POST["edit"] ?> veranderen</h1>
 		<form action="opdracht-CRUD-update.php" method="post">
 			<input type="hidden" name="brouwernummer" value="<?=$_POST["edit"]?>">
 			<label for="changenaam">Naam</label><br>
        	<input type="text" name="changenaam" value="<?=$_POST["brouwernaam"] ?>"><br>
        	<label for="changeadres">Adres</label><br>
        	<input type="text" name="changeadres" value="<?=$_POST["brouweradres"] ?>"><br>
        	<label for="changepostcode">Postcode</label><br>
        	<input type="text" name="changepostcode" value="<?=$_POST["brouwerpostcode"] ?>"><br>
        	<label for="changegemeente">Gemeente</label><br>
        	<input type="text" name="changegemeente" value="<?=$_POST["brouwergemeente"] ?>"><br>
        	<label for="changeomzet">Omzet</label><br>
        	<input type="text" name="changeomzet" value="<?=$_POST["brouweromzet"] ?>"><br>
        	<button type="submit" name="change">Invoegen!</button>
 		</form>
 	<?php endif ?>


	<?php if($areyousure): ?>
		<p>Are you sure you want to delete the row with number <?=$todelete ?>? </p>

		<form action="opdracht-crud-update.php" method="post">
			<button type="submit" name="confirm" value="<?= $todelete ?>">Yes</button>
			<button type="submit" name="confirm" value="No">No</button>
		</form>
	<?php endif ?>

	<?php if($querysucces): ?>
		<?php header("Refresh:0"); ?>
		<p>De rij is verwijderd</p>
	<?php endif ?>

	<?php if($queryeditsucces): ?>
		<?php header("Refresh:0"); ?>
		<p>De rij is bewerkt</p>
	<?php endif ?>

	<?php if(!$queryeditsucces): ?>
		<p>Niet gelukt! Neem contact op met <a HREF="mailto:gebruiker@provider.nl">systeembeheerder</a> als dit blijft aanhouden.</p>
	<?php endif ?>


 <table>

 	<thead>
 		<th>---</th>
 			<?php foreach ($queryresult[0] as $key=>$value): ?> 
 				<th><?= $key ?></th>
 			<?php endforeach ?>
 		<th>Delete</th>
 		<th>Edit</th>
 	</thead>

  	<tbody>
  	<?php for ($i=0; $i < count($queryresult) ; $i++): ?>

  		<tr>
  			<td><?= $i+1 ?></td>
  			<?php foreach ($queryresult[$i] as $key=>$value): ?> 
  				<td><?=$value ?></td>
  			<?php endforeach ?>

  			<td>
  				<form action="opdracht-crud-update.php" method="post">
  					<button type="submit" name="delete" value="<?=$queryresult[$i]["brouwernr"]?>">Remove</button>
  				</form>
  			</td>

  			<td>
  				<form action="opdracht-crud-update.php" method="post">
  					<input type="hidden" name="brouwernaam" value="<?=$queryresult[$i]["brnaam"]?>">
  					<input type="hidden" name="brouweradres" value="<?=$queryresult[$i]["adres"]?>">
  					<input type="hidden" name="brouwerpostcode" value="<?=$queryresult[$i]["postcode"]?>">
  					<input type="hidden" name="brouwergemeente" value="<?=$queryresult[$i]["gemeente"]?>">
  					<input type="hidden" name="brouweromzet" value="<?=$queryresult[$i]["omzet"]?>">
  					<button type="submit" name="edit" value="<?=$queryresult[$i]["brouwernr"]?>">Edit</button>
  				</form>
  			</td>
  		</tr>

	<?php endfor ?>
 	</tbody>

 </table>

 </body>
 </html>