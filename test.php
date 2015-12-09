<?php

$toto='chat';
echo 'toto(dans le contexte global) :'.$toto;
echo'<br>';
$tutu='poisson';
echo'toto (dans le contexte globale) : '.$toto;
echo'<br>';
echo 'tutu (dans le contexte global) ;'.$tutu;
function maMethode($titi)
{
	$toto='chien';
	echo'toto(dans la fonction) : ' .$toto;
	echo'<br>';
	echo'titi(dans la fonction) : ' .$titi;
	echo'<br>';
	echo'tutu (dans la fonction) ;' .$tutu;
}


maMethode($tutu);
echo'titi(dans le contexte global) :'.$titi;
echo'toto :'.$toto;

?>