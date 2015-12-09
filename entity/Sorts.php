<?php

 class Sorts {
	protected $name;
	protected $degats;
	protected $id;
	public function __construct($donnee_Sorts)
	{
		$this->hydrate($donnee_Sorts);	
	}
	public function __toString()
	{
		return $this->getName().' '.$this->getDegats();
	}
	
	private function hydrate($donnee_Sorts)
	{
		foreach($donnee_Sorts as $cle=> $valeur)
		{
			$method='set'.ucfirst($cle);
			if (method_exists($this,$method))
			{
				
				$this->$method($valeur);
			}
		}
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
	public function getDegats()
	{
		return $this->degats;
	}
	public function setDegats($degats)
    {
		$this->degats=$degats;
		return $this;
    }
	public function getId()
	{
		return $this->id;
	}
	public function setId($id)
    {
		$this->id=$id;
		return $this;
	}
 }
