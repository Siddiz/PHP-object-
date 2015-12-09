<?php

class Guerrier extends Perso {
	private $Puissance;
	const DEGATS_massue=40;
		
		
	public function __construct(array $donnee)
	{
		parent::__construct($donnee);
	
		
	}
	
	
	
	public function setPuissance ()
	{
		$this->Puissance=self::DEGATS_massue;
		return $this;
	}
	
	public function getPuissance ()
	{
		return $this->Puissance;
	}
	
}
?>	