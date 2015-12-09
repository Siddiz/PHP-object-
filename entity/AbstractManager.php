<?php


abstract class AbstractManager
{
	protected $db;
	
	public function __construct($pdo)
	{
		$this->setDb($pdo);
	}
	
	protected function getDb()
	{
		return $this->db;
	}
	
	protected function setDb($db)
	{
		$this->db=$db;
		
	}
	
	
	
	
	
	
	
	
	
}