<?php

	$user = "";
	$role = "";

	if(isset($_GET['user']) && isset($_GET['user']))
	{
		$user = $_GET['user'];
		$role = $_GET['role'];
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
	<h1><?= $role ?></h1>

	<?php var_dump($_GET) ?>
</body>
</html>