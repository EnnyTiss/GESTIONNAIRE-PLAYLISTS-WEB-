<?php if(isset($message)) { ?>
	<p style="background-color: yellow;"><?= $message ?></p>
<?php } ?>
			
<h2>Liste des versions de chanson :</h2>
<!--
<ul>
< ?php foreach($Version as $version) { ?>
	<li>< ?= $version['idC'] ?>;< ?= $version['numV'] ?>;< ?= $version['nomFichierV'] ?></li>
< ?php } ?>
</ul> 
-->
<table>
    <thead>
    	<tr>
        	<th>Titre de chanson </th>
        	<th>Numéro de version</th>
			<th>Nom de fichier</th>
		  	<th>
        </tr>
    </thead>
    <tbody>
	  	<?php foreach($Version as $version) { ?>
			<tr><td> <?= $version['titreChanson'] ?> </td> <td> <?= $version['numV'] ?> </td> <td> <?= $version['nomFichierV'] ?> </td> <td> <?= $version['genreChanson'] ?> </td></tr>
		<?php } ?>
	</tbody>
</table>

