<?php

abstract class Perso {
	public $name;
	public $lastName;
	private $hp;
	private $dexterite;
	private $id;
	
	const MAX_HP=100;
	const DEGATS=10;
	
	public function __construct(array $donnee)
	{  	$this->hydrate($donnee);
		$this->setDext();
		$this->setHP(self::MAX_HP);
		
	}
	private function hydrate($donnee)
	{
		foreach($donnee as $cle=> $valeur)
		{
			$method='set'.ucfirst($cle);
			if (method_exists($this,$method))
			{
				
				$this->$method($valeur);
			}
		}
	}
	public function __toString()
	{
		return $this->getName().' '.$this->getLastName();
	}
	
	public function getName()
	{
		return $this->name;
	}
	
   public function setName($nom)
    {
		$this->name=$nom;
		return $this;
    }
	
	public function getId()
	{
		return $this->id;
	}
	
   public function setId($id)
    {
		$this->name=$id;
		return $this;
    }
	
	public function getLastName()
	{
		return $this->lastName;
	}
	public function setLastName($nom)
	{
		$this->lastName=$nom;
		return	$this;
	}
	public function getDext()
	{
		return $this->dexterite;
	}
	public function setDext()
	{
		$this->dexterite=rand(1,100);
		return $this;

	}
	
	public function getHP()
	{
		return $this->hp;
	}
	public function setHP($hp)
	{
		$this->hp = $hp;
		return $this;
	}
	public function minusHP($degats)
	{
		$this->hp-=$degats;
		return $this;
	}
	public function frappe(Perso $adversaire)
	{
		$adversaire -> minusHP(self::DEGATS);
	}
}
?>	