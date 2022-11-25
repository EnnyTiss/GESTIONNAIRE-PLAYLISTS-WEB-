
			
<h2>Liste des versions de chanson :</h2>

<?php if(isset($message)) { ?>
	<p style="background-color: yellow;"><?= $message ?></p>
<?php } ?>


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
			<tr>
				<td> <?= $version['idC'] ?> </td> <td> <?= $version['numV'] ?> </td> <td> <?= $version['nomFichierV'] ?> </td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<!--<td> < ?= $version['genreChanson'] ?> </td>-->