<?php

	$user = "";

	if(isset($_GET['user']))
	{
		$user = $_GET['user'];
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User</title>
</head>
<body>
	<h1><?= $user ?></h1>

	<?php if(isset($_GET['user'])){var_dump($_GET['user']);} ?>
</body>
</html>