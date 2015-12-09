<?php
require_once('/entity/Perso.php');
require_once('/entity/Guerrier.php');
require_once('/entity/Magicien.php');
require_once('/entity/Sorts.php');
require_once('/entity/AbstractManager.php');
require_once('/entity/spell_manager.php');
require_once('/entity/MagicienManager.php');


session_start();
//requette MySql

$db= new PDO('mysql:host=localhost;dbname=jeux', 'root', '');


 
 $mm =new MagicienManager($db);
/*
$magicien1=$mm->getById(1);
if ($magicien1 instanceof magicien)
{
echo ($magicien1->getName());
}
*/


$donnee_magicien2=array(
					'name'=>'Rene',
                     'lastName'=>'Lord');
											
 $magicien2= new Magicien($donnee_magicien2);
 $mm->add($magicien2);
 echo $magicien2;

/*
$magicien1->setName('coucou');
echo ($magicien1->getName());
$mm->update($magicien1);
}


 
 
 
 /*
echo'
<table>
	<tr>
		<td>Id</td>
		<td>Name</td>
		<td>Degats</td>
	</tr> ';

foreach ($sm->getAll() as $spell)
{
	echo'<tr>
		<td>'.$spell->getId().'</td>
		<td>'.$spell->getName().'</td>
		<td>'.$spell->getDegats().'</td>
		</tr>';
}
echo'</table>'




















/*
$sm =new SpellManager($db);

$sort1=$sm->get(1);
echo ($sort1->getName());
$sort1->setName('coucou');
echo ($sort1->getName());
$sm->update($sort1);



$request= $db->query('SELECT id, name, degats FROM spell WHERE id=1');
/*while($donnee_Sorts =$request->fetch(PDO::FETCH_ASSOC))
{
	echo 'id: '.$donnee_Sorts['id'].' name :'.$donnee_Sorts['name'].' degats :'.$donnee_Sorts['degats'];
}*/
/*
$donnee_Sorts =$request->fetch(PDO::FETCH_ASSOC);
$sort1 =new Sorts($donnee_Sorts);
echo 'Sort1 :'. $sort1->getName(), ' inflige ' .$sort1->getDegats(). ' points de degats';
/*
$sort3=new Sorts($donnee_Sorts3);

echo 'LISTE DES SORTS <br>';
echo $sort1->getName();
echo ' '.$sort1->getDegats();
echo '<br>'.$sort2->getName();
echo ' '.$sort2->getDegats();
echo '<br>'.$sort3->getName();
echo ' '.$sort3->getDegats();
echo'<br>';
echo'<br>';

$donnee_perso1=array('name'=>'Richard',
                     'lastName'=>'Lord  ');
$donnee_perso2=array('name'=>'Boule',
                    'lastName'=>'By');
					
$perso2=new Guerrier ($donnee_perso2);
$perso1=new Magicien($donnee_perso1);
$perso1->addSort($sort3);
$perso1->addSort ($sort2);
$perso1->addSort ($sort1);
echo 'PERSONNAGE <br>';
echo $perso1;
echo '<br>';
echo $perso2;
echo'<br>';
echo'<br>';

echo'POINTS DE VIE <br>';
echo (' -Points de vie de : '.$perso1.'  '.$perso1->getHP(). '; dexterite :' .$perso1->getDext());
echo ('<br> -Points de vie de : '.$perso2.'  '.$perso2->getHP(). '; dexterite :' .$perso2->getDext());
echo'<br><br>';
echo 'ATTENTION LE MAGICIEN ATTAQUE LE GUERRIER !!!!!';
echo'<br>';
echo'<br>';
echo 'Richard lance le sort Grogniotte à Boulby : <br>';
$perso1->lancersorts($perso2,'Grogniotte');
echo (' -Points de vie de : '.$perso2.'  '.$perso2->getHP());
echo '<br> <br>Richard lance le sort Boule de Feu à Boulby : <br>';
$perso1->lancersorts($perso2,'Boule de feu');
echo (' -Points de vie de : '.$perso2.'  '.$perso2->getHP());
echo '<br><br> Richard lance le sort Boule de Glace à Boulby : <br>';
$perso1->lancersorts($perso2,'Boule de glace');
echo (' -Points de vie de : '.$perso2.'  '.$perso2->getHP());
echo '<br><br> BOUL BY EST MORT :( !!!! ';
/*$donnee_Sorts=array('name'=>'Boule de feu',
							'degats'=>'30');
$sort1=new Sorts($donnee_Sorts);

$donnee_Sorts2=array('name'=>'Boule de glace',
							'degats'=>'20');
$sort2=new Sorts($donnee_Sorts2);

$donnee_Sorts3=array('name'=>'Grogniotte',
							'degats'=>'50');
							
foreach($perso1->getSorts() as $cle=> $valeur)
		{
			echo $valeur;
		}
$perso1->lancersorts($perso2);
echo (' -Points de vie de : '.$perso1.'  '.$perso2->getHP());


/*	if(isset($_POST['name'])&& !empty($_POST['name']) && isset($_POST['lastName'])&& !empty($_POST['lastName']))
	{
		$prenom=$_POST['name'];
		$nom=$_POST['lastName'];
		$race=$_POST['race'];
		$donnee_perso1=array('name'=>$prenom,
                     'lastName'=>$nom);
					   
		if ($race==1)
		{
			$perso1=new Guerrier($donnee_perso1);
			
			echo $perso1.'<br> hp :'.$perso1->getHP().'<br> dexterite :' .$perso1->getDext().'<br> Puissance de Coup: '.$perso1->getPuissance();
	
		}
		elseif ($race==2)
		{
			$perso1=new Magicien($donnee_perso1);
			echo $perso1.'<br> hp :'.$perso1->getHP().'<br> dexterite :' .$perso1->getDext().'<br> Puissance de Sorts:'.$perso1->getSorts();

		}
		
		
	}	
		
	






/*
$donnee_Nodey=array('name'=>'Richard',
                     'lastName'=>'Lord');
$Nodey = new Perso($donnee_Nodey);
//$Nodey ->setName('Richard')->setLastName('Lord');
echo $Nodey->getName().'  '.$Nodey->getLastName();
echo ('</br>');
echo (' -Dexterite de : '.$Nodey.'  '.$Nodey->getDext());
echo ('</br>');
echo (' -Points de vie de : '.$Nodey.'  '.$Nodey->getHP());

echo ('</br>');
echo ('</br>');

$donnee_Mula=array('name'=>'Maxime',
                     'lastName'=>'King');
$Mula = new Perso($donnee_Mula);
//$Mula ->setName('Maxime')->setLastName('King');
echo $Mula->getName().'  '.$Mula->getLastName();
echo ('</br>');
echo ('  -Dexterite de : '.$Mula.'  '.$Mula->getDext());
echo ('</br>');
echo ('  -Points de vie de : '.$Mula.'  '.$Mula->getHP());
echo ('</br>');
echo ('</br>');
$Nodey->frappe($Mula);
echo (' -Points de vie de : '.$Nodey.'  '.$Nodey->getHP());
echo ('  -Points de vie de : '.$Mula.'  '.$Mula->getHP());




/*
$hulk = new Perso();
$hulk ->setName('Bruce')->setLastName('Lee ');
$hulk->setDext();
$hulk2= clone $hulk;
$hulk2->setName('mouchou')->setLastName('choux');
echo $hulk2->getName().' '.$hulk2->getLastName();
echo ('dexterite de :'.$hulk2.' ' .$hulk2->getDext());
echo ('</br>');
echo $hulk->getName().' '.$hulk->getLastName();
echo ('dexterite de :'.$hulk.' ' .$hulk->getDext());
*/

?>