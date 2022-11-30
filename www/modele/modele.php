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

function getGroupeByName($connexion, $nomGrp) {
	$nomGroupe = mysqli_real_escape_string($connexion, $nomGrp); // sécurisation de $nomGrp
	$requete = "SELECT * FROM Groupe WHERE nomGrp = '". $nomGroupe . "'";
	$res = mysqli_query($connexion, $requete);
	$Groupe = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $Groupe;
}

//cherche playlist par titre
function getPlaylistByName($connexion, $titrePlaylist){
	$titrePlay = mysqli_real_escape_string($connexion, $titrePlaylist);
	$requete = "SELECT * FROM Groupe WHERE nomGrp = '". $titrePlay . "'";
	$res = mysqli_query($connexion, $requete);
	$Playlist = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $Playlist;
}

function insertGroupe($connexion, $nomGrp){
	$nomGroupe = mysqli_real_escape_string($connexion, $nomGrp);
	$requete = "INSERT INTO Groupe (nomGrp) VALUES ('". $nomGroupe ."')";
	$res = mysqli_query($connexion, $requete);
	return $res;
}
function insertChanson($connexion, $titreChanson, $nomGrp){
	$titre = mysqli_real_escape_string($connexion, $titreChanson); // au cas où $titreChanson provient d'un formulaire
	//$genre = mysqli_real_escape_string($connexion, $genreChanson); // au cas où $genreChanson vient d'un formulaire
	$nomG = mysqli_real_escape_string($connexion, $nomGrp);
	$requete = "INSERT INTO Chanson (titreChanson, nomGrp) VALUES ('". $titre ."', '". $nomG ."')";
	echo($requete);
	$res = mysqli_query($connexion, $requete);
	return $res;
}

function insertGenre($connexion){
	$req_select = "SELECT genre FROM dataset.songs2000";
	$res_select = mysqli_query($connexion,$req_select);
	$tabGenre = mysqli_fetch_all($res_select);
	foreach($tabGenre as $tab){
		$genre = explode(";",$tab);
		$genre = explode ("/",$tab);
		$req_insert = "INSERT INTO p1810913.Genre (idG, nomGenre) VALUES (NULL, '". $genre ."')";
		$res = mysqli_query($connexion,$req_insert);
		echo("l'insertion des genres s'est bien déroulée");
	}
	return $res;
}

function genererPlaylist($connexion, $titrePlaylist, $dureePlaylist/*, $genrePlaylist*/){
	$titrePlay = mysqli_real_escape_string($connexion, $titrePlaylist);
	$dureePlay = mysqli_real_escape_string($connexion, $dureePlaylist); //duree de la playlist voulue
    //$genrePlay = mysqli_real_escape_string($connexion, $genrePlaylist);
	//$datejour = date('d-m-Y'); //date insertion playlist
    //$prefPlay = mysqli_real_escape_string($connexion, $prefPlay); //peut être NULL (heureusement purée)

	$req_play = "INSERT INTO Playlist (idPlay, titrePlay, datePlay) VALUES (NULL, '". $titrePlay ."', NOW())";	
	echo($req_play);
	$res_play = mysqli_query($connexion, $req_play); //création de la playlist
	if($res_play== false){echo "l'insertion marche pas avant boucle";}else{echo("insertion est passée");};
	
	$req_idPlay = "SELECT idPlay FROM Playlist WHERE titrePlay LIKE '". $titrePlay ."' ";
	//$res_idPlay = mysqli_prepare($connexion, $req_idPlay);
	$res_idPlay = mysqli_query($connexion, $req_idPlay); //préparation requête récup idP
	//mysqli_stmt_bind_param($res_idPlay, "i" ,$titrePlaylist); //on relie le résultat de la requête à $idP
	//$idPlay = mysqli_stmt_get_result($res_idPlay); //on stocke l'idP qu'on a créé */
	echo($req_idPlay."<br/>"); //bonne req récupérée
	$idPlay = mysqli_fetch_all($res_idPlay, MYSQLI_ASSOC); //on stocke l'idP qu'on a créé
	$sum_duree = 0;
	foreach($idPlay as $idP){
		echo($idP['idPlay']."<br/>");
		while($sum_duree < ($dureePlay + 60)){//minute près
			$idC = rand()%2000 + 1; //intervalle 1 à 2000  
			echo("idc vaut".$idC."<br/>");
			$req_count = "SELECT COUNT(numV) FROM Version WHERE idC = '". $idC ."' "; //nombre de versions pour une certaine chanson
			$res_count = mysqli_query($connexion, $req_count);

			$counts = mysqli_fetch_all($res_count, MYSQLI_ASSOC);
			/*$res_count = mysqli_prepare($connexion, $req_count); //préparation de la requête
			if($res_count == false) {
				return null;
			}
			mysqli_stmt_bind_param($res_count, "i" ,$idC); //on relie le resultat de la requete à la variable $count en int
			mysqli_stmt_execute($res_count);
			$count = mysqli_stmt_get_result($res_count); //on stocke le résultat dans $count
			*/
			foreach($counts as $count){
				echo($count['COUNT(numV)']."<br/>");
				$numV= rand()%($count['COUNT(numV)']-1) +1; //intervalle 1 à $count;
				$req_insertP = "INSERT INTO Contenir (idC, numV, idPlay) VALUES('". $idC ."', '". $numV ."', '". $idP['idPlay'] ."')";
				$res_insertP = mysqli_query($connexion, $req_insertP); //insertion des chansons dans une playlist (relation Contenir)
				
				$req_duree = "SELECT dureeV FROM Version WHERE idC = '". $idC ."' AND numV = '". $numV ."' ";
				$res_duree = mysqli_query($connexion, $req_duree);
				/*$res_duree = mysqli_prepare($connexion, $req_duree); //recup duree Version insérée dans playlist
				if($res_duree == false) {
					return null;
				}
				mysqli_stmt_bind_param($res_duree, "i", $dureeV);
				mysqli_stmt_execute($res_count);
				$dureeV = mysqli_stmt_get_result($res_duree); //on stocke le résultat dans $dureeV
				*/
				$dureeVersion = mysqli_fetch_all($res_duree, MYSQLI_ASSOC);
				foreach($dureeVersion as $dureeV){
					$sum_duree = $sum_duree + $dureeV; //incrémentation de la somme des durées des versions insérées
				}

				
					
			}
		} 
	}

	return $res_play;
}


/*
function insertVersion($connexion, $titreChanson, $dureeV, $dateV, $nomFichierV){
	$titre = mysqli_real_escape_string($connexion, $titreChanson);
	$req_titre = "SELECT idC FROM Chanson WHERE titreChanson = '". $titre ."'";
	$res_titre = mysqli_query($connexion, $req_titre);
	$idC = implode(mysqli_fetch_all($res_titre, MYSQLI_ASSOC));
	echo($idC);
	$dureeVersion = mysqli_real_escape_string($connexion, $dureeV);
	echo('duree ça passe');
	$dateVersion = mysqli_real_escape_string($connexion, $dateV);
	echo('date ça passe');
	$nomFichierVersion = mysqli_real_escape_string($connexion, $nomFichierV);
	echo('nom fichier ça passe');
	$requete= "INSERT INTO Version (idC, dureeV, dateV, nomFichierV) VALUES ('". $idC ."','". $dureeVersion ."', '". $dateVersion ."', '". $nomFichierVersion ."')";
	$res = mysqli_query($connexion, $requete);
	return $res;
}
*/
function insertVersion($connexion, $titreChanson, $dureeV, $dateV, $nomFichierV){
	$titre = mysqli_real_escape_string($connexion, $titreChanson);
	$idTitre = "SELECT idC FROM Chanson WHERE titreChanson = '". $titre ."'";
	$dureeVersion = mysqli_real_escape_string($connexion, $dureeV);
	echo('duree ça passe');
	$dateVersion = mysqli_real_escape_string($connexion, $dateV);
	echo('date ça passe');
	$nomFichierVersion = mysqli_real_escape_string($connexion, $nomFichierV);
	echo('nom fichier ça passe');
	$requete= "INSERT INTO Version (idC, numV, dureeV, dateV, nomFichierV) VALUES ('". $idTitre ."',2,'". $dureeVersion ."', '". $dateVersion ."', '". $nomFichierVersion ."')";
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
