<?php 

class ExceptionImproved extends Exception
{

	protected $message = array();
	function __construct($M,$C,$F,$L)
	{
		parent::__construct($M,$C,$F,$L);
	}

}

 ?>