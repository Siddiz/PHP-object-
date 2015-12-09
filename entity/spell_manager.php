<?php

class SpellManager extends AbstractManager
{
	
	public function add(Sorts $Sorts)
	{
		$q =$this->db->prepare('INSERT INTO Sorts SET name= :name, degats= :degats');
		$q->bindValue(':name', $Sorts->getName());
		$q->bindValue(':degats', $Sorts->getDegats());
		
		$q->execute();
		
		$idSOR =$this->db->lastInsertId();
		$Sorts->setId($idSOR);
		
		return $idSOR;
		
	}
	
	public function delete($id)
	{
		$request= $Sorts->query('DELETE FROM spell WHERE id=' .$Sorts->getId());
		$donnee = $request->fetch(PDO::FETCH_ASSOC);	
	}
	
	public function update(Sorts $Sorts)
	{
		$q=$this->db->prepare('UPDATE spell set name= :name, degats= :degats WHERE id= :toto');
		$q->bindValue(':name', $Sorts->getName(), PDO::PARAM_STR);
		$q->bindValue(':degats', $Sorts->getDegats(),PDO::PARAM_INT);
		$q->bindValue(':toto', $Sorts->getId(), PDO::PARAM_INT);
		return $q->execute();
	}
	
	public function get($id)
	{
		$id =(int) $id;
		
		$request= $this->db->query('SELECT id, name, degats FROM spell WHERE id=' .$id);
		$donnee = $request->fetch(PDO::FETCH_ASSOC);
		
		return new Sorts($donnee);
	}
	
	public function getAll()
	{
		$sorts=array();
		
		$request =$this->db->query('SELECT id,  name, degats FROM spell');
		
		while($donnee = $request->fetch(PDO::FETCH_ASSOC))
		{
			$sorts[]=new Sorts($donnee);
		}
		return $sorts;
	}
	
	
	
	
	
	
	
	
	
	

}