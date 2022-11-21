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
	<input type="number" name="minutes" id="minutes" required/> : <input type="number" name="secondes" id="secondes" required/>
	<br/>
	<label for="nomGroupe"> nom du groupe : </label>
	<input type="text" name="nomGroupe" id="nomGroupe" required/> 
	<br/><br/> 
	<input type="submit" name="boutonValider" value="Ajouter"/> 
</form>

<?php if(isset($message)) { ?>
	<p style="background-color: yellow;"><?= $message ?></p>
<?php } ?>