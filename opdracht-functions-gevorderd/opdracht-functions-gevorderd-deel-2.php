<?php

	$pigHealth = 5;
	$maximumThrows = 8;

	$angrybirds = array();

	function calculateHit()
	{
		$geraakt = '';
		$randomgetal = intval(rand(0, 100));
		global $pigHealth;

		$hitsarray = array();

		if($randomgetal>0 && $randomgetal<=40)
		{
			$geraakt = true;
		}
		else
		{
			$geraakt=false;
		}

		if($geraakt)
		{
			--$pigHealth;
			$hitsarray['resultaat'] = 'Raak! Er zijn nog maar '.$pigHealth.' varkens over.';
			$hitsarray['isgeraakt'] = true;
		}
		else
		{
			$hitsarray['resultaat'] = 'Mis! Nog '.$pigHealth.' varkens in het team.';
			$hitsarray['isgeraakt'] = false;
		}

		return $hitsarray;
	}

	function launchAngryBird()
	{
		global $maximumThrows;
		global $pigHealth;
		global $angrybirds;

		if($maximumThrows>0 && $pigHealth>0)
		{
			$callback = calculateHit();
			--$maximumThrows;
			$angrybirds[] = $callback['resultaat'];
			launchAngryBird();
		}
		else
		{
			if($pigHealth>0)
			{
				$angrybirds[] = "Verloren!";
			}
			else
			{
				$angrybirds[] = "Gewonnen!";
			}
		}
	}

	launchAngryBird();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-functions-gevorderd-deel-2</title>
</head>
<body>
	<h2>Deel 2:</h2>
	<?php foreach($angrybirds as $result): ?>
		<li><?php echo $result ?></li>
	<?php endforeach ?>
</body>
</html>