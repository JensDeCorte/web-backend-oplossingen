<?php

	$result = "";
	$expinput = "";
	$userinput = "";


	if( isset($_POST["submit"]) )
	{
		$expinput = $_POST["expressie"];
		$exp = "/" . $expinput . "/";
		$userinput = $_POST["tekst"];

		$result = preg_replace($exp, "#", $userinput);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Regular expressions</title>
</head>
<body>
	
	<form action="opdracht-regular-expressions.php" method="post">
		<label for="expressie">Regular Expression:</label><br>
		<input type="text" name="expressie" value="<?= $expinput ?>"><br>

		<label for="tekst">String:</label><br>
		<textarea name="tekst"><?= $userinput ?></textarea><br>

		<button type="submit" name="submit">Submit</button>
	</form>
	
	<p><?= $result ?></p>

</body>
</html>