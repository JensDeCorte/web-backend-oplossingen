<?php

	session_start();

	if(isset($_COOKIE["login"])) 
	{
		header("Location: dashboard.php");
		exit();
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registreren</title>
</head>
<body>
	

	<p><?php if( isset($_SESSION["notification"]) ) 
		{
			echo $_SESSION["notification"];
		}?>
	</p>


 	 <form action="registratie-process.php" method="post">

		<label for="email">E-mail</label><br>
        <input type="text" name="email" value="<?php if (isset($_SESSION["email"])) {echo $_SESSION["email"]; }?>"><br>
        <label for="password">Wachtwoord</label><br>
        <input type="<?php 	if(isset($_SESSION["wachtwoord"]))
        					{ echo "text";} 
        					else
        					{echo "password";}?>" 
        		name="wachtwoord" 
        		value="<?php if( isset($_SESSION["wachtwoord"]) ){ echo $_SESSION["wachtwoord"];} ?>">
        <button type="submit" name="generate">Genereer een passwoord</button><br>
        <button type="submit" name="submit">Account maken!</button>

	</form>


</body>
</html>