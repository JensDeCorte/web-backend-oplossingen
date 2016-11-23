<?php
	
	require_once("classes/HTMLBuilder.php");

	$html = new HTMLBuilder( "header-partial.php", "body-partial.php", "footer-partial.php" );

	$html->buildHeader();
	$html->buildBody();
	$html->buildFooter();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-classes-portfolio</title>
</head>
<body>
	
</body>
</html>