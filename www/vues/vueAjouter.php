<h2>Ajout d'une chanson </h2>
<!-- test-->
<form method="post" action="#">
	<label for="titreChanson">Nom de la Chanson : </label>
	<input type="text" name="titreChanson" id="titreChanson" placeholder="Black Summer" required />
	<br/>
	<label for="dateChanson"> Date de sortie </label>
	<input type="date" name="dateChanson" id="dateChanson" required/>
	<br/>
	<label for="minutes"> durée de Chanson : </label>
	<input type="number" min="0" name="minutes" id="minutes" required/> min <input type="number" min="0" max="60" name="secondes" id="secondes" required/> sec
	<br/><br/>
	<input type="submit" name="boutonValider" value="Ajouter"/>
</form>

<?php if(isset($message)) { ?>
	<p style="background-color: yellow;"><?= $message ?></p>
<?php } ?>