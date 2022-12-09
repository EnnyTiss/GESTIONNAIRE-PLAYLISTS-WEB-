<h2>Suppression d'une playlist</h2>

<form method="post" action="#">
	<label for="nomPlaylist">Nom de la variété à supprimer : </label>
	<input type="text" name="nomPlaylist" id="nomPlaylist" placeholder="Abba..." value="testplayboom" required /><br/>
	
	<br/><br/>
	<input type="submit" name="boutonValider" value="Supprimer"/>
</form>

<?php if(isset($message)) { ?>
	<p style="background-color: yellow;"><?= $message ?></p>
<?php } ?>