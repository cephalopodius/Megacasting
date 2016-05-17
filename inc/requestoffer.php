<?php
class requestoffer extends bdd
{
	public function listeroffre()
	{
		$reponse = $this->hydrate()->query('SELECT * FROM offrecasting');		
	}
}