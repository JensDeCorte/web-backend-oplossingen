<?php 
	
	$titel1 = "Geruzie om Plopsaqua in Deurne";
	$titel2 = "Van Avermaet bedankt olympische ploeg met prachtig cadeau";
	$titel3 = "Peter Sagan geeft ludieke persconferentie in Qatar";

	$paragraaf1 = "Een maand na de sluiting van de Kaasboerin staat Deurne opnieuw in rep en roer. Oorzaak: het verdwijnen van skipiste Zondal. Dat die moet wijken voor een zwembad - vermoedelijk Plopsaqua - zorgt voor heel wat ongenoegen. Ook het mobiliteitsaspect baart de Deurnenaar zorgen.";
	$paragraaf2 = "Morgen strijdt Greg Van Avermaet voor de wereldtitel, maar de olympische kampioen vergeet in de tussentijd zijn collega’s niet. De ploeg die hem aan de olympische titel hielp, kreeg afgelopen week een gepersonaliseerd espressomachine cadeau. Zo bewijst Van Avermaet dat hij een van de sympathiekste jongens van het peloton is.";
	$paragraaf3 = "Uittredend wereldkampioen Peter Sagan was vrijdagavond op een persconferentie in zijn hotel, het Melia Hotel waar ook de Belgen verblijven, kort van stof over het WK in Qatar. “We zullen zondag zien”, was het antwoord dat hij steeds weer in de mond nam.";

	$afbeelding1 = "img/plopsaqua.jpg";
	$afbeelding2 = "img/vanavermaet.jpg";
	$afbeelding3 = "img/sagan.jpg";

	$beschrijving1 = "plopsaqua";
	$beschrijving2 = "koffiemachine";
	$beschrijving3 = "sagan";


	$artikels = array(  array(	'titel' => $titel1 ,
								'paragraaf' => $paragraaf1 ,
								'afbeelding' => $afbeelding1 ,
								'beschrijving' => $beschrijving1 ) ,

						array(	'titel' => $titel2 ,
								'paragraaf' => $paragraaf2 ,
								'afbeelding' => $afbeelding2 ,
								'beschrijving' => $beschrijving2 ) ,

						array(	'titel' => $titel3 ,
								'paragraaf' => $paragraaf3 ,
								'afbeelding' => $afbeelding3 ,
								'beschrijving' => $beschrijving3 ) );



	/*    WERKEND
	$titels = array($titel1, $titel2, $titel3);
	$paragrafen = array($paragraaf1, $paragraaf2, $paragraaf3);
	$afbeeldingen = array($afbeelding1, $afbeelding2, $afbeelding3);
	$beschrijving = array($beschrijving1, $beschrijving2, $beschrijving3);

	$artikels = array( $titels, $paragrafen, $afbeeldingen, $beschrijving );
	*/

/*
	$id = 0;

	foreach($artikels as $onderdeel => $artikel)
	{
		switch($onderdeel):
			case 'titel':
				$id = 0;
				break;

			case 'paragraaf':
				$id = 1;
				break;

			case 'afbeelding':
				$id = 2;
				break;

			case 'beschrijving':
				$id = 3;
				break;

			default:
				$id = 0;

			endswitch;
	}*/

	$volledigartikel = false;

	if(isset( $_GET['id']))
	{
		$id = $_GET['id'];
		
		$artikels = array($artikels[$id]);
		$volledigartikel =true;
	}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-get 
			<?php
				if($volledigartikel)
				{
					echo ": ".$artikels[0]['titel'];
				}
			?>
		
	</title>
</head>
<body>


<?php foreach($artikels as $id => $artikel): ?>
<div class = "artikel">
	<h2> <?php echo $artikel['titel'] ?> </h2>
	<p>
		<?php 
			if($volledigartikel)
			{ echo $artikel['paragraaf']; } 
			else{ echo substr($artikel['paragraaf'], 0, 50)."..."; } 
		?>	
	</p>
	<p>
	<?php if($volledigartikel): ?>
		
			<a href='http://web-backend.local/oplossingen/opdracht-get/opdracht-get.php'>Vorige</a>
		
	<?php	else: ?>
		<a href='http://web-backend.local/oplossingen/opdracht-get/opdracht-get.php?id=<?= $id ?>'>Lees meer</a>
		
	<?php endif ?>
	</p>
	<figure>
		<img src=" <?= $artikel['afbeelding'] ?> ">
		<figcaption><?= $artikel['beschrijving']?></figcaption>
	</figure>
</div>
<?php endforeach ?>





</body>
</html>



<style>

	body
	{
		font-family: arial;
	}

	.artikel
	{
		margin-bottom: 100px;
		padding: 20px;
		border: 2px solid black;
		border-radius: 20px;
	}

</style>