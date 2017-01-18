<?php


	if(isset($_GET["zoeken"])) 
	{
		if($_GET["zoeken"] == "") 
		{
			header("Location: artikels/");
			exit();
		}

		$url = "zoeken/content/".$_GET["zoeken"]."/";
		header("Location:".$url);
		exit();
	}

	if(isset($_GET["jaartal"])) 
	{
		if($_GET["jaartal"] == "") 
		{
			header("Location: artikels/");
			exit();
		}

		$url = "zoeken/datum/".$_GET["jaartal"]."/";
		header("Location:".$url);
		exit();
	}


?>