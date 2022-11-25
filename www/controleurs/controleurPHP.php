<?php
$connexion = getConnexionBD();

$req_select = "SELECT nomGenre FROM p1810913.Genre";
$res_select = mysqli_query($connexion,$req_select);
$tabGenre = mysqli_fetch_all($res_select);
echo($req_select);
$req_vider = "DELETE FROM TABLE Genre";
$res_vider = mysqli_query($connexion, $req_vider);
echo($req_vider);
foreach($tabGenre as $tab){
	$genre = explode(";",$tab);
	//$genre = explode ("/",$tab);
	$req_insert = "INSERT INTO p1810913.Genre (idG, nomGenre) VALUES (NULL, '". $genre ."')";
    echo($req_insert);
	$res = mysqli_query($connexion,$req_insert);
	echo("l'insertion des genres s'est bien déroulée");
}
?>