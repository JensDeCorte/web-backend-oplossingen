<?php


	require_once("classes/Message.php");
	require_once("classes/ExceptionImproved.php");

	$MESSAGE = new MESSAGE();
	session_start();
	$melding = "";
	$validcode = false;
	$showform = true;
	$createmessage = false;

//----------------------

	try
	{

		if (isset($_POST["submit"])) 
		{
		  	if (isset($_POST["code"])) 
		  	{
 	 			if (strlen($_POST["code"])==8) 
	  			{
 	 				$validcode=true;
	  				$showform=false;
	  			}
	  			else
	  			{
	  				throw new Exception("CODE LENGHT ERROR" );
	  			}
	  		}
	  		else
	  		{
	  			throw new Exception( "SUBMIT ERROR" );
	  		}
		}

	}
	catch (Exception $e) 
	{

		$messagecode = $e->getMessage();
		$message = array();
		$createmessage = false;

		switch ($messagecode) 
		{
			case "CODE LENGHT ERROR":
				$message[0] = "De kortingscode heeft de foute lengte";
				$message[1] = "ERROR";
				$createmessage = true;
				break;

			case "SUBMIT ERROR":
				$message[0] = "Het code veld bestaat niet meer. Er is met het formulier geknoeid!";
				$message[1] = "ERROR";
				break;
		}

		logToFile($message);

		if ($createmessage) 
		{
			$MESSAGE->setMessage($message);
		}

		$melding = $MESSAGE->getMessage();

	}

//-----------------------

	function logToFile($message)
	{
		$file = "errors.txt";
		$date = "[".date("H:i:s d/m/Y")."]";
		$ip = $_SERVER['REMOTE_ADDR'];
		$type = " Type: [".$message[1]."]";
		$text = $message[0];
		$errortekstlijn = array($date,$ip,$type,$text,"\n\r");
		$errorline = implode("-",$errortekstlijn);
		file_put_contents($file, $errorline);
	}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-error-handling</title>
</head>
<body>

<?php if($validcode): ?>
	<p>Danku! Uw kortingscode werd goedgekeurd</p>
<?php endif ?>

<?php if($showform): ?>
<h1>Geef hier uw kortingscode op!</h1>
	<?php if ($melding != "") :?>
	<p>De kortingscode is niet juist</p>
	<?php endif ?>
	<form action="opdracht-error-handling.php" method="post">
		<label for="code">Uw kortingscode:</label><br>
        <input type="text" name="code" id="code"><br>
        <button type="submit" name="submit">Verzenden</button>
	</form>
<?php endif ?>
	
</body>
</html>