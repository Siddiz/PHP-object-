<?php 

class MagicienManager extends AbstractManager
{
	
	const ERREUR_ENTITY_NOT_FOUND ='Erreur';
	public function add(Magicien $Magicien)
	{                          
		$q = $this->db->prepare('INSERT INTO magicien ( name, lastName, hp, dexterite) VALUES (:name, :lastName, :hp, :dexterite)');
		$q->bindValue(':name', $Magicien->getName(), PDO::PARAM_STR);
		$q->bindValue(':lastName', $Magicien->getLastName(), PDO::PARAM_STR);
		$q->bindValue(':hp', $Magicien->getHP(), PDO::PARAM_INT);
		$q->bindValue(':dexterite', $Magicien->getDext(), PDO::PARAM_INT);
		
		$q->execute();
		
		$idMAG =$this->db->lastInsertId();
		$Magicien->setId($idMAG);
		
		return $idMAG;
	}
	
	public function delete(Magicien $Magicien)
	{
		$request= $Sorts->query('DELETE FROM magicien WHERE id=' .$Magicien->getId());
		$donnee = $request->fetch(PDO::FETCH_ASSOC);	
	}
	
	public function update(Magicien $Magicien)
	{
		$q=$this->db->prepare('UPDATE magicien SET id= :id, name= :name, lastName= :lastName; hp= :hp, dexterite= :dexterite' );
		$q->bindValue(':id', $Magicien->getId(), PDO::PARAM_INT);
		$q->bindValue(':name', $Magicien->getName(),PDO::PARAM_STR);
		$q->bindValue(':lastName', $Magicien->getLastName(), PDO::PARAM_STR);
		$q->bindValue(':hp', $Magicien->getHp(), PDO::PARAM_INT);
		$q->bindValue(':dexterite', $Magicien->getDext(), PDO::PARAM_INT );
		return $q->execute();
	}
	
	public function getAll()
	{
		$Magicien=array();
		
		$request =$this->db->query('SELECT id,  name, lastName, hp, dexterite FROM magicien');
		
		while($donnee = $request->fetch(PDO::FETCH_ASSOC))
		{
			$Magicien[]=new Magicien($donnee);
		}
		return $Magicien;
	}
	

	
	public function getById($id)
	{
		$id=(int)$id;
		$magicien= null;
		$request =$this->db->query('SELECT * FROM magicien WHERE id='.$id);
		$donnees = $request->fetch(PDO::FETCH_ASSOC);
		
		
	if (!$donnees)
	{
		echo self::ERREUR_ENTITY_NOT_FOUND;
		return false;
	}
	$magicien =new Magicien($donnees);
		$request_sorts = $this->db->query('SELECT * FROM magicien_spell, spell WHERE magicien_spell.id_magicien ='.$id.' AND magicien_spell.id_spell = spell.id');
		
		while($donneeSorts = $request_sorts->fetch(PDO::FETCH_ASSOC))
		{
			$sorts =new Sorts($donneeSorts);
			$magicien->addSort($sorts);
		}
		return $magicien;
	}
	
	
	
	
	
	
	
	
}