<?php 

if(isset($_POST['boutonValider'])) { // formulaire soumis
    $titrePlay = $_POST['titreChanson']; // recuperation de la valeur saisie
	$dureePlay = $_POST['dureeVersion'];

    $genererP = genererPlaylist($connexion, $titrePlay, $dureePlay);
    if($genererP == TRUE){
        echo("La playlist '". $titrePlay ."' a bien été générée ");
    }
}