<?php

class Magicien extends Perso {
		
	private $sorts = array();
	const DEGATS_sorts=20;
	const MESSAGE_ABSCENCE_DE_SORTS ='Tu ne possède pas ce sort jeune magicien <br><br>';
	public function __construct(array $donnee)
	{
		parent::__construct($donnee);
	
		
	}
	
	
	public function getSorts()
	{
		return $this->sorts;
	}
	
	public function addSort(Sorts $sort)
	{
		$this->sorts[]=$sort;
		
	}
	
	public function lancersorts(Perso $adversaire,$nomSorts)
	{
		$hasSorts =false;
		
		foreach($this->sorts as $key =>$sorts)
		{
			if($sorts->getName()==$nomSorts)
			{
				$hasSorts =true;
				$degat =$sorts->getDegats();
			}
		}
		
			if ($hasSorts)
			{
				$adversaire->minusHP($degat);
				return $this;
			}
			else
			{
				echo self::MESSAGE_ABSCENCE_DE_SORTS ;
				return $this;
			}
	}
		
		
		
	
}
?>	