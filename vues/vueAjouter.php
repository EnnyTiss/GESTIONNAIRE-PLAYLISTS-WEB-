<h2>Ajout d'une chanson </h2>

<form method="post" action="#">
	<label for="nomChanson">Nom de la Chanson : </label>
	<input type="text" name="nomChanson" id="nomChanson" placeholder="Black Summer" required />
	<br/><br/>
	<input type="submit" name="boutonValider" value="Ajouter"/>
</form>

<?php if(isset($message)) { ?>
	<p style="background-color: yellow;"><?= $message ?></p>
<?php } ?>

