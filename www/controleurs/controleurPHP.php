<?php
/*
$connexion = getConnexionBD();

echo "ce qu'il y a en dessous c'est controleurPHP + vuePHP - Oumayma";
$req_select = "SELECT DISTINCT nomGenre FROM p1810913.tempGenre";
$res_select = mysqli_query($connexion,$req_select);
$tabGenre = mysqli_fetch_all($res_select, MYSQLI_ASSOC);
//echo($req_select);
//$req_vider = "DELETE FROM Genre";
//$res_vider = mysqli_query($connexion, $req_vider);
$genres=array();
foreach($tabGenre as $tab){
	/*echo($tab['nomGenre']."<br/>");
	echo("(".strstr(";",$tab['nomGenre']).")");
	if(strstr(";",$tab['nomGenre'])==";"){
		$genres = explode(";",$tab['nomGenre']);
		echo "* <br/>";
	}elseif(strstr("/",$tab['nomGenre'])=="/"){
		$genres = explode("/",$tab['nomGenre']);
		echo "** <br/>";
	}else{echo("++");}
	echo(count($genres));*/
/*	$genres = explode(";",$tab['nomGenre']);
	foreach($genres as $genre){
		$req_insert = "INSERT INTO p1810913.Genre (idG, nomGenre) VALUES (NULL, '". $genre ."')";
		$res = mysqli_query($connexion,$req_insert);
		echo($req_insert);
	}	
}
$req_vider = "DELETE FROM tempGenre";
$res_vider = mysqli_query($connexion, $req_vider);

$genres=array();
foreach($tabGenre as $tab){
	$genres = explode("/",$tab['nomGenre']);
	foreach($genres as $genre){
		$req_insert = "INSERT INTO p1810913.Genre (idG, nomGenre) VALUES (NULL, '". $genre ."')";
		$res = mysqli_query($connexion,$req_insert);
		echo($req_insert);
	}	
}
////le code en dessous n'a pas marché (pb avec les elseif en php)
/*if(strpos(";",$tab['nomGenre'])){
		$genres = explode(";",$tab['nomGenre']);
		echo "; <br/>";
	}elseif(strpos("/",$tab['nomGenre'])){
		$genres = explode("/",$tab['nomGenre']);
		echo "/ <br/>";
	}
	if(strpos("And",$tab['nomGenre'])){
		$genres = explode(" And ",$tab['nomGenre']);
		echo "And <br/>";
	}*/
	/*echo($tab['nomGenre']."<br/>");
	echo("(".strstr(";",$tab['nomGenre']).")");
	if(strstr(";",$tab['nomGenre'])==";"){
		$genres = explode(";",$tab['nomGenre']);
		echo "* <br/>";
	}elseif(strstr("/",$tab['nomGenre'])=="/"){
		$genres = explode("/",$tab['nomGenre']);
		echo "** <br/>";
	}else{echo("++");}
	echo(count($genres));*/

/*	
$genres=array();
foreach($tabGenre as $tab){
	$genres = explode(" And ", $tab['nomGenre']);
	foreach($genres as $genre){
		$req_insert = "INSERT INTO p1810913.Genre (idG, nomGenre) VALUES (NULL, '". $genre ."')";
		$res = mysqli_query($connexion,$req_insert);
		echo($req_insert);
	}	
}

$genres=array();
foreach($tabGenre as $tab){
	$genres = explode(" & ", $tab['nomGenre']);
	foreach($genres as $genre){
		$req_insert = "INSERT INTO p1810913.Genre (idG, nomGenre) VALUES (NULL, '". $genre ."')";
		$res = mysqli_query($connexion,$req_insert);
		echo($req_insert);
	}	
}*/
/////////////FIN CODE QUI MARCHE PAS ///////////////////////
/*
$req_recup = "SELECT title, count(title) as nbtitle, length, filename, playcount, lastplayed, skipcount FROM songs2000 GROUP BY title";
$res_recup = mysqli_query($connexion, $req_recup);	


$recupDonnees = mysqli_fetch_all($res_recup, MYSQLI_ASSOC);



foreach($recupDonnees as $recupDonnee){
	$recupD = mysqli_real_escape_string($connexion, $recupDonnee['title']);
	$req_idC = "SELECT idC, dateChanson FROM Chanson WHERE titreChanson = '". $recupD ."' ";
	echo ($recupDonnee['title'].":".$req_idC."<br/>");
	$res_idC = mysqli_query($connexion, $req_idC);

	$idChansons = mysqli_fetch_all($res_idC, MYSQLI_ASSOC);
	foreach ($idChansons as $idC){
		$i = 1;
		do{
			$req_insertV = "INSERT INTO Version (idC, numV, dureeV, dateV, nomFichierV, playcount, lastplayed, skipcount)
							VALUES ('". $idC['idC'] ."', $i, '". $recupDonnee['length'] ."', NULL, '". $recupDonnee['filename'] ."', '". $recupDonnee['playcount'] ."', '". $recupDonnee['lastplayed'] ."', '". $recupDonnee['skipcount'] ."')";
			echo($req_insertV."<br/>");
			$res_insertV = mysqli_query($connexion, $req_insertV);

			if($res_insertV == TRUE){
				echo("version '". $i ."' a été insérée "."<br/>"."<br/>");
			}

			$i = $i + 1;
		}while($i<=$recupDonnee['nbtitle']);
		
	}
}
*/

?>