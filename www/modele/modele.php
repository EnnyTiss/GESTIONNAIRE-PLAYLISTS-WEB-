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

//retourne les instances de Playlist pour AfficherPlaylist
function GetVersionsDansPlaylist($connexion, $nomTable) {
	$requete = "SELECT p.idPlay, p.titrePlay, COUNT(c.idC) as nbChansons, SUM(dureeV) as dureePl FROM Version v NATURAL JOIN Contenir c JOIN Playlist p ON c.idPlay=p.idPlay GROUP BY c.idPlay";
	$res = mysqli_query($connexion, $requete);
	$instances = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $instances;

}

function GetTitrePlayByID($connexion, $id){
	$requete = "SELECT titrePlay FROM Playlist WHERE idPlay= '". $id ."'" ;
	$res = mysqli_query($connexion, $requete);
	$ret = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $ret;
}

function GetInfoById($connexion, $id){
	$requete = "SELECT co.idC, co.numV, c.titreChanson, c.nomGrp, v.dureeV FROM Contenir co NATURAL JOIN Version v LEFT JOIN Chanson c on co.idC = c.idC WHERE idPlay = '". $id ."'";
	$res = mysqli_query($connexion, $requete);
	$instances = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $instances;
}

// retourne les instances d'une table $nomTable
function getInstances($connexion, $nomTable) {
	$requete = "SELECT * FROM $nomTable";
	$res = mysqli_query($connexion, $requete);
	$instances = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $instances;
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

function getGenreByName($connexion, $nomGenre){
	$nomG = mysqli_real_escape_string($connexion, $nomGenre);
	$requete = "SELECT * FROM Genre WHERE nomGenre = '". $nomG . "'";
	$res = mysqli_query($connexion, $requete);
	$Genre = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $Genre;
}

//cherche playlist par titre
function getPlaylistByName($connexion, $titrePlaylist){
	$titrePlay = mysqli_real_escape_string($connexion, $titrePlaylist);
	$requete = "SELECT * FROM Playlist WHERE titrePlay = '". $titrePlay . "'";
	$res = mysqli_query($connexion, $requete);
	$Playlist = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $Playlist;
}

function insertVersion($connexion, $titreC, $nomGroupe, $nomGenre, $dureeV, $dateV, $nomFichierV){
	$titreChanson = mysqli_real_escape_string($connexion, $titreC);
	$nomGrp = mysqli_real_escape_string($connexion, $nomGroupe);
	$nomG = mysqli_real_escape_string($connexion, $nomGenre);
	$dureeVersion = mysqli_real_escape_string($connexion, $dureeV);
	$dateVersion = mysqli_real_escape_string($connexion, $dateV);
	$nomFichierVersion = mysqli_real_escape_string($connexion, $nomFichierV);
	//insertion chanson d'abord pour avoir idC
	$req_insertC = "INSERT INTO Chanson (idC, titreChanson, nomGrp) VALUES (NULL, '". $titreChanson ."', '". $nomGrp ."')";
	$res_insertC = mysqli_query($connexion, $req_insertC);
	//récupérer idC
	$req_idC = "SELECT idC FROM Chanson WHERE titreChanson LIKE '". $titreChanson ."' ";
	$res_idC = mysqli_query($connexion, $req_idC);
	$idC = mysqli_fetch_row($res_insertC);
	
	//insertion dans table categoriser pour genre de chanson
	$req_idG = "SELECT idG FROM Genre WHERE nomGenre LIKE '". $nomGenre ."'";
	$req_insertCat = "INSERT INTO Categoriser (idC, idG) SELECT idC, idG FROM jointure à ajouter";
	//insertion dans table version 
	$req_numV = "SELECT COUNT(idC) FROM Version WHERE idC = '". $idC ."'";
	$req_insertV = "INSERT INTO Version (idC, numV, dureeV, dateV, nomFichierV) VALUES ()";
	$res_insertV = mysqli_query($req_insertV);
	
	
	return res_insertV;
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
    //$prefPlay = mysqli_real_escape_string($connexion, $prefPlay); //peut être NULL (heureusement purée)

	$req_play = "INSERT INTO Playlist (idPlay, titrePlay, datePlay) VALUES (NULL, '". $titrePlay ."', NOW())";	
	//echo($req_play);
	$res_play = mysqli_query($connexion, $req_play); //création de la playlist
	if($res_play== false){echo "l'insertion marche pas avant boucle";}else{echo("insertion est passée");};
	
	$req_idPlay = "SELECT idPlay FROM Playlist WHERE titrePlay LIKE '". $titrePlay ."' ";
	
	$res_idPlay = mysqli_query($connexion, $req_idPlay); //préparation requête récup idP
	//echo($req_idPlay."<br/>"); //bonne req récupérée
	$idPlay = mysqli_fetch_all($res_idPlay, MYSQLI_ASSOC); //on stocke l'idP qu'on a créé
	$sum_duree = 0;
	foreach($idPlay as $idP){
		//echo($idP['idPlay']."<br/>");
		while($sum_duree < ($dureePlay)){//minute près
			$idC = rand()%2000 + 1; //intervalle 1 à 2000  
			//echo("idc vaut".$idC."<br/>");
			$req_count = "SELECT COUNT(numV) FROM Version WHERE idC = '". $idC ."' "; //nombre de versions pour une certaine chanson
			$res_count = mysqli_query($connexion, $req_count);

			$counts = mysqli_fetch_all($res_count, MYSQLI_ASSOC);

			foreach($counts as $count){
				//echo($count['COUNT(numV)']."<br/>");
				if ($count['COUNT(numV)'] != 0) {
					$numV = rand() % ($count['COUNT(numV)']) + 1; //intervalle 1 à $count;
				}
				$req_insertP = "INSERT INTO Contenir (idC, numV, idPlay) VALUES('". $idC ."', '". $numV ."', '". $idP['idPlay'] ."')";
				$res_insertP = mysqli_query($connexion, $req_insertP); //insertion des chansons dans une playlist (relation Contenir)
				
				$req_duree = "SELECT dureeV FROM Version WHERE idC = '". $idC ."' AND numV = '". $numV ."' ";
				$res_duree = mysqli_query($connexion, $req_duree);
				$dureeVersion = mysqli_fetch_all($res_duree, MYSQLI_ASSOC);
				foreach($dureeVersion as $dureeV){
					$sum_duree = $sum_duree + $dureeV['dureeV']; //incrémentation de la somme des durées des versions insérées
				}
				
			}
		} 
	}

	return $res_play;
}

function deletePlaylist($connexion, $nomPlay){
	$nomPlaylist = mysqli_real_escape_string($connexion, $nomPlay);
	$req_idPlay = "SELECT idPlay FROM Playlist WHERE titrePlay LIKE '". $nomPlaylist ."'";
	$res_idPlay= mysqli_query($connexion, $req_idPlay); //recup id Playlist à supprimer
	$idPlaylist = mysqli_fetch_all($res_idPlay, MYSQLI_ASSOC);

	$req_play="DELETE FROM Playlist WHERE titrePlay LIKE '". $nomPlaylist ."'";
	$res_play= mysqli_query($connexion, $req_play); //suppression playlist
	
	foreach($idPlaylist as $idPlay){
		$req_contenir = "DELETE FROM Contenir WHERE idPlay = '" . $idPlay['idPlay'] . "'";
		$res_contenir = mysqli_query($connexion, $req_contenir);
	}

	return $res_contenir;
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
/*function insertVersion($connexion, $titreChanson, $dureeV, $dateV, $nomFichierV){
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
*/

	
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


$req_idC1 = "SELECT title, length, filename, playcount, lastplayed, skipcount FROM songs2000 WHERE title LIKE 'Brahms Lullaby' ";
$res_idC1 = mysqli_query($connexion, $req_idC1);

$idC1Donnees = mysqli_fetch_all($res_idC1, MYSQLI_ASSOC);
foreach($idC1Donnees as $idC1Donnee){
	$req_insertidC1 = "INSERT INTO Version (idC, numV, dureeV, dateV, nomFichierV, playcount, lastplayed, skipcount)
						VALUES (1, 1, '". $idC1Donnee['length'] ."', NULL, '". $idC1Donnee['filename'] ."', '". $idC1Donnee['playcount'] ."', '". $idC1Donnee['lastplayed'] ."', '". $idC1Donnee['skipcount'] ."')";
	$res_insertidC1 = mysqli_query($connexion, $req_insertidC1);

}*/
?>
