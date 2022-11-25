<h2>Ajout d'une version de chanson </h2>
<!-- test-->
<form method="post" action="#">
	<label for="titreChanson">Nom de la Chanson : </label>
	<input type="text" name="titreChanson" id="titreChanson" placeholder="Black Summer" value="valeurpardef" />
	<br/>
	<label for="dateVersion"> Date de sortie </label>
	<input type="date" name="dateVersion" id="dateVersion" />
	<br/>
	<label for="dureeVersion"> durée de Chanson : </label>
	<!--<input type="number" min="0" name="minutes" id="minutes" /> min <input type="number" min="0" max="59" name="secondes" id="secondes" /> sec
	<br/>-->
	<input type = "time" name = "dureeVersion" id = "dureeVersion" min = 0 max = 1 >
	<br/>
	<label for="nomGroupe"> nom du groupe : </label>
	<!--<input type="text" name="nomGroupe" id="nomGroupe" /> -->	
	<select name = "nomGroupe" id = "nomGroupe" > 
		<option value="Air">Air</option>
		<option value="AC/DC">AC/DC</option>
		<option value="Genesis">Genesis</option>
		<option value="existe pas">Existe pas</option>
	</select>
	<br/>
	<label for="genreChanson"> genre chanson : </label>
	<!--<input type="text" name="genreChanson" id="genreChanson" />	-->
	<select name = "genreChanson" id = "genreChanson" > 
		<option value="Electro">Electro</option>
		<option value="Rock">rock</option>
	</select>
	<br/>
	<label for="nomFichierV"> nom fichier : </label>
	<input type="text" name="nomFichierV" id="nomFichierV" /> <!--pas de required ça me soaule on verra après -->
	<br/><br/>
	<input type="submit" name="boutonValider" value="Ajouter"/>
</form>

<?php if(isset($message)) { ?>
	<p style="background-color: yellow;"><?= $message ?></p>
<?php } ?>