<?php

class HTMLBuilder
{

	public $header;
	public $body;
	public $footer;

	public function __construct( $header, $body, $footer )
	{
		$this->header = "html/".$header;
		$this->body = "html/".$body;
		$this->footer = "html/".$footer;
	}

	public function buildHeader()
	{
		include $this->header;
	}

	public function buildBody()
	{
		include $this->body;
	}

	public function buildFooter()
	{
		include $this->footer;
	}

}

?>