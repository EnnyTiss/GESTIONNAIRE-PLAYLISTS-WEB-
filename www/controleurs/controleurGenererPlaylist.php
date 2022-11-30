<?php 

if(isset($_POST['boutonValider'])) { // formulaire soumis
    $titrePlay = $_POST['titrePlay']; // recuperation de la valeur saisie
	$dureePlay = $_POST['dureePlay'];
    if(getPlaylistByName($connexion, $titrePlay) == FALSE){
        $genererP = genererPlaylist($connexion, $titrePlay, $dureePlay);
        if($genererP == TRUE){
            echo("La playlist '". $titrePlay ."' a bien été générée ");
        }
    }else{
        echo("La playlist '". $titrePlay ."' existe déjà !");
    }
}