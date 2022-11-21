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

// insère une nouvelle série nommée $titreChanson
function insertChanson($connexion, $titreChanson, $genreChanson){
	$titre = mysqli_real_escape_string($connexion, $titreChanson); // au cas où $titreChanson provient d'un formulaire
	$genre = mysqli_real_escape_string($connexion, $genreChanson); // au cas où $genreChanson vient d'un formulaire
	$requete = "INSERT INTO Chanson (titreChanson, genreChanson) VALUES (' ". $titre ." ', ' ". $genre ." ')";
	$res = musli_query($connexion, $requete);
	return $res;
}

function insertVersion($connexion, $dureeV, $dateV, $nomFichierV){
	$dureeVersion = mysqli_real_escape_string($connexion, $dureeV);
	$dateVersion = mysqli_real_escape_string($connexion, $dateV);
	$nomFichierVersion = mysqli_real_escape_string($connexion, $nomFichierV);
	$requete= "INSERT INTO Version(dureeV, dateV, nomFichierV) VALUES ('". $dureeVersion . "', '". $dateVersion ."', '". $nomFichierVersion ."')";
	$res = mysqli_query($connexion, $requete);
	return $res;
}

function insertGroupe($connexion, $nomGrp){
	$nomGroupe = mysqli_real_escape_string($conneixon, $nomGrp);
	$requete = "INSERT INTO Groupe (nomGrp) VALUES (' ". $nomGroupe ." ')";
	$res = mysqli_query($connexion, $requete);
	return $res;
}
	
/*function search($connexion, $table, $valeur) {
	$valeur = mysqli_real_escape_string($connexion, $valeur); // au cas où $valeur provient d'un formulaire
	if($table == 'Series')
		$requete = 'SELECT * FROM Series WHERE nomSerie LIKE \'%'.$valeur.'%\';';
	else  // $table == 'Actrices'
		$requete = 'SELECT * FROM Actrices WHERE nom LIKE \'%'.$valeur.'%\' OR prenom LIKE \'%'.$valeur.'%\';';
	$res = mysqli_query($connexion, $requete);
	$instances = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $instances;
}
*/
?>
