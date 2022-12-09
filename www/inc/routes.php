<?php

/*
** Il est possible d'automatiser le routing, notamment en cherchant directement le fichier controleur et le fichier vue.
** ex, pour page=afficher : verification de l'existence des fichiers controleurs/controleurAfficher.php et vues/vueAfficher.php
** Cela impose un nommage strict des fichiers.
*/

$routes = array(
	'afficher' => array('controleur' => 'controleurAfficher', 'vue' => 'vueAfficher'),
	'ajouter' => array('controleur' => 'controleurAjouter', 'vue' => 'vueAjouter'),
	'PHP' => array('controleur' => 'controleurPHP', 'vue' => 'vuePHP'),
	'GenererPlaylist' => array('controleur' => 'controleurGenererPlaylist', 'vue' => 'vueGenererPlaylist'),
	'afficherPlaylist' => array('controleur' => 'controleurAfficherPlaylist', 'vue' => 'vueAfficherPlaylist'),
	'supprimerPlaylist' => array('controleur' => 'controleurSupprimerPlaylist', 'vue' => 'vueSupprimerPlaylist')
);

?>
