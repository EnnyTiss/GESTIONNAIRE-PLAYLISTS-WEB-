<?php 

// connexion à la BD, retourne un lien de connexion
function getConnexionBD() {
	$connexion = mysqli_connect(SERVEUR, UTILISATRICE, MOTDEPASSE, BDD);
	if (mysqli_connect_errno()) {
	    printf("Échec de la connexion : %s\n", mysqli_connect_error());
	    exit();
	}
	mysqli_query($connexion,'SET NAMES UTF8'); // noms en UTF8
	return $connexion;
}

// déconnexion de la BD
function deconnectBD($connexion) {
	mysqli_close($connexion);
}

// nombre d'instances d'une table $nomTable
function countInstances($connexion, $nomTable) {
	$requete = "SELECT COUNT(*) AS nb FROM $nomTable";
	$res = mysqli_query($connexion, $requete);
	if($res != FALSE) {
		$row = mysqli_fetch_assoc($res);
		return $row['nb'];
	}
	return -1;  // valeur négative si erreur de requête (ex, $nomTable contient une valeur qui n'est pas une table)
}

// retourne les instances d'une table $nomTable
function getInstances($connexion, $nomTable) {
	$requete = "SELECT * FROM $nomTable";
	$res = mysqli_query($connexion, $requete);
	$instances = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $instances;
}

//function getVersionChanson($connexion){
//	$requete = "SELECT v.* , c.titreChanson FROM Version as v JOIN Chanson as c ON v.idC=c.idC JOIN Genre as g on c.idG = g.idG ";
//	$res = mysqli_query($connexion, $requete);
//	$instances = mysqli_fetch_all($res, MYSQLI_ASSOC);
//	return $instances;
//}

// retourne les instances d'épisodes numérotés 1 et 2 
function getEpisodesPrepared($connexion) {
	$requete = "SELECT titre FROM Episodes WHERE numero = ?";
	$stmt = mysqli_prepare($connexion, $requete);
	if($stmt == false) {
		return null;
	}
	mysqli_stmt_bind_param($stmt, "i", $numEpisode); // lier la variable $var au paramètre de la requête
	// $var à 1 pour afficher les épisodes numérotés 1
	$numEpisode = 1;
	mysqli_stmt_execute($stmt); // exécution de la requête
	$episodes1 = mysqli_stmt_get_result($stmt);  // récupération des tuples résultats dans la variable $episodes1

	// $var à 2 pour afficher les épisodes numérotés 2
	$numEpisode = 2;
	mysqli_stmt_execute($stmt); // pas besoin de lier, exécution directe de la requête
	$episodes2 = mysqli_stmt_get_result($stmt);  // récupération des tuples résultats dans la variable $episodes1
	return array("episodes1" => $episodes1, "episodes2" => $episodes2);
}

// retourne les informations sur la série nommée $titreChanson
function getChansonByName($connexion, $titreChanson) {
	$titre = mysqli_real_escape_string($connexion, $titreChanson); // sécurisation de $titreChanson
	$requete = "SELECT * FROM Chanson WHERE titreChanson = '". $titre . "'";
	$res = mysqli_query($connexion, $requete);
	$Chanson = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $Chanson;
}

function getGroupeByName($connexion, $nomGrp) {
	$nomGroupe = mysqli_real_escape_string($connexion, $nomGrp); // sécurisation de $nomGrp
	$requete = "SELECT * FROM Groupe WHERE nomGrp = '". $nomGroupe . "'";
	$res = mysqli_query($connexion, $requete);
	$Groupe = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $Groupe;
}
// insère une nouvelle série nommée $titreChanson

function insertGroupe($connexion, $nomGrp){
	$nomGroupe = mysqli_real_escape_string($connexion, $nomGrp);
	$requete = "INSERT INTO Groupe (nomGrp) VALUES (' ". $nomGroupe ." ')";
	$res = mysqli_query($connexion, $requete);
	return $res;
}
function insertChanson($connexion, $titreChanson, $genreChanson, $nomGrp){
	$titre = mysqli_real_escape_string($connexion, $titreChanson); // au cas où $titreChanson provient d'un formulaire
	$genre = mysqli_real_escape_string($connexion, $genreChanson); // au cas où $genreChanson vient d'un formulaire
	$nomG = mysqli_real_escape_string($connexion, $nomGrp);
	$requete = "INSERT INTO Chanson (titreChanson, genreChanson, nomGrp) VALUES (' ". $titre ." ', ' ". $genre ." ', ' ". $nomG ." ')";
	$res = mysqli_query($connexion, $requete);
	return $res;
}

function insertVersion($connexion, $titreChanson, $dureeV, $dateV, $nomFichierV){
	$titre = mysqli_real_escape_string($connexion, $titreChanson);
	$idTitre = "SELECT idC FROM Chanson WHERE titreChanson = '". $titre ."'";
	echo($idTitre);
	$dureeVersion = mysqli_real_escape_string($connexion, $dureeV);
	echo('duree ça passe');
	$dateVersion = mysqli_real_escape_string($connexion, $dateV);
	echo('date ça passe');
	$nomFichierVersion = mysqli_real_escape_string($connexion, $nomFichierV);
	echo('nom fichier ça passe');
	$requete= "INSERT INTO Version (idC, dureeV, dateV, nomFichierV) VALUES ('". $idTitre ."','". $dureeVersion ."', '". $dateVersion ."', '". $nomFichierVersion ."')";
	$res = mysqli_query($connexion, $requete);
	return $res;
}


	
function search($connexion, $table, $valeur) {
	$valeur = mysqli_real_escape_string($connexion, $valeur); // au cas où $valeur provient d'un formulaire
	if($table == 'Version'){
		$requete = 'SELECT * FROM Version WHERE titreChanson LIKE \'%'.$valeur.'%\';';
	}
	$res = mysqli_query($connexion, $requete);
	$instances = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $instances;
}

?>
