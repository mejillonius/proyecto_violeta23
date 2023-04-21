<?php
echo(LOADDEBUG?"Loader debug MontaTPLS ":"");

class MontaTpls
{
	public function montaTpls()
	{
		require_once "views/template.php";
	}
}
