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
/*$genres=array();
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
*/
/*$genres=array();
foreach($tabGenre as $tab){
	$genres = explode("/",$tab['nomGenre']);
	foreach($genres as $genre){
		$req_insert = "INSERT INTO p1810913.Genre (idG, nomGenre) VALUES (NULL, '". $genre ."')";
		$res = mysqli_query($connexion,$req_insert);
		echo($req_insert);
	}	
}

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
?>