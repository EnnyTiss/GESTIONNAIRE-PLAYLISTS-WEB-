<?php 
$message = "";

if(isset($_POST['boutonValider'])) { // formulaire soumis
    $nomPlaylist = mysqli_real_escape_string($connexion, $_POST['nomPlaylist']);
	$verification = getPlaylistByName($connexion, $nomPlaylist);

	if($verification == TRUE || count($verification) != 0){
		$suppression = deletePlaylist($connexion, $nomPlaylist);
		if($suppression == TRUE) {
			$message = "La playlist $nomPlaylist a bien été supprimée !";
		}
		else {
			$message = "Erreur lors de la suppression de la variété $nomPlaylist.";
		}
	}
	else {
		$message = "Pas de playlist avec ce nom.";
	}
}


?>