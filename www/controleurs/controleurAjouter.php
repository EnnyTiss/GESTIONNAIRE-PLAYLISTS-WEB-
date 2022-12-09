<?php 
if(isset($_POST['boutonValider'])) { // formulaire soumis

	$titreChanson = $_POST['titreChanson']; // recuperation de la valeur saisie
	//$dureeV = $_POST['dureeVersion'];
	//$dateV = $_POST['dateVersion'];
	//$nomFichierV = $_POST['nomFichierV'];
	$nomGrp = $_POST['nomGroupe'];
	$nomGenre = $_POST['genreChanson'];
	echo($nomGrp);
	$verificationC = getChansonByName($connexion, $titreChanson);
	if ($verificationC == FALSE){
		echo('chanson c passé');
	}
	$verificationGrp = getGroupeByName($connexion, $nomGrp);
	if($verificationGrp == FALSE){
		echo('il vérifie bien que le grp existe (pas?)');
	}
	$verificationG = getGenreByName($connexion, $nomGenre);
	if($verificationG == FALSE){
		echo('il vérifie bien que le grp existe (pas?)');
	}
	if(($verificationC == FALSE || count($verificationC) == 0) && $verificationGrp == TRUE && $verificationG == TRUE) { // pas de série avec ce nom, insertion
		//$insertionG = insertGroupe($connexion, $nomGrp);
		$insertionC = insertChanson($connexion, $titreChanson, $nomGrp);
		
		//$insertionV = insertVersion($connexion, $titreChanson, $dureeV, $dateV, $nomFichierV);
		
		if($insertionC == TRUE /*&& $insertionV == TRUE*/) {
			$message = "La Chanson $titreChanson a bien été ajoutée !";
		}
		else {
			$message = "Erreur lors de l'insertion de la Chanson $titreChanson.";
		}
	}
	else {
		$message = "Une Chanson existe déjà avec ce nom ($titreChanson).";
	}
}

?>