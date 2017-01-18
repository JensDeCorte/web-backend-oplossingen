<?php

    function autoloader() 
    {
        require_once("classes/bieren.php");
    }

    spl_autoload_register("autoloader");
    $gets = $_GET;

    if(isset($_GET["controller"]))
    {
   		$bieren = ucfirst($_GET["controller"]);
    }

    $bier = new Bieren();
    
    if(isset($_GET["method"]))
    {
    	$method = $_GET["method"];
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>opdracht mod rewrite basis</title>
    <style type="text/css">
        .container h1 {
            color: darkgray;
            border-bottom: 1px solid darkgrey;
        }
        .container .urls {
            color: #232323;
            padding: 25px;
            background-color: paleturquoise;
            border: 2px solid darkturquoise;
        }
    </style>
</head>
<body>

    <div>
        <h1>Index.php</h1>
        <div class="urls">
            <?php foreach ($gets as $key => $value) : ?>
                <p>[<?= $key ?>] => <?= $value; ?></p>
            <?php endforeach; ?>
        </div>
        <h2><?php if(isset($_GET["method"])){ echo $bier->$method(); } ?></h2>
    </div>

</body>
</html>