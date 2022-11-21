<?php 
if(isset($_POST['boutonValider'])) { // formulaire soumis

	$titreChanson = $_POST['titreChanson']; // recuperation de la valeur saisie
	$verification = getChansonByName($connexion, $titreChanson);

	if($verification == FALSE || count($verification) == 0) { // pas de série avec ce nom, insertion
		$insertionC = insertChanson($connexion, $titreChanson, $genreChanson);
		$insertionV = insertVerison($connexion, $)
		if($insertion == TRUE) {
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