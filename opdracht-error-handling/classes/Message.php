<?php

class Message 
{

	public function setMessage($message)
	{
		$_SESSION["message"] = $message[0];
		$_SESSION["type"] = $message[1];
		return;
	}

	public function getMessage()
	{
			$melding="";

			if ( isset($_SESSION["message"]) ) 
			{
				$melding = $_SESSION["message"];
				unset($_SESSION["message"]);
				unset($_SESSION["type"]);
			}
			else
			{
				$melding = false;
			}

			return $melding;
	}

}

 ?>