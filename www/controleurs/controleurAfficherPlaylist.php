<?php 
$message = "";

// recupération des données chanson, groupe, genre
/*$Chanson = getInstances($connexion, "Chanson");
if($series == null || count($Chanson) == 0) {
	$message .= "Aucune chanson n'a été trouvée dans la base de données !";
}*/

$InstancePL=NULL;
$thisPL=NULL;

$Playlist = GetVersionsDansPlaylist($connexion, "Playlist"); 

$nbPlaylist = countInstances($connexion, "Playlist");

if (isset($_GET["pl"])){ 
    $pl = $_GET["pl"];
    $thisPL = GetTitrePlayByID($connexion, $pl);
    $InstancePL = GetInfoById($connexion, $pl);
}

if($Playlist == null || count($Playlist) == 0) {
	$message .= "Aucune playlist n'a été trouvée dans la base de données !";
}

?>

