<?php 
$message = "";

// recupération des données chanson, groupe, genre
/*$Chanson = getInstances($connexion, "Chanson");
if($series == null || count($Chanson) == 0) {
	$message .= "Aucune chanson n'a été trouvée dans la base de données !";
}*/

// recupération des versions
$Version = getVersionChanson($connexion); // il va manque les genres


if($Version == null || count($Version) == 0) {
	$message .= "Aucune version n'a été trouvée dans la base de données !";
}




// recupération des épisodes numérotés 1 et 2 avec une requête préparée
/*$tabEpisodes = getEpisodesPrepared($connexion);
if($tabEpisodes == null) {
	$message .= "Aucun épisode n'a été trouvé dans la base de données !";
}
else {
	$episodes1 = $tabEpisodes["episodes1"];
	$episodes2 = $tabEpisodes["episodes2"];
}

?>*/
