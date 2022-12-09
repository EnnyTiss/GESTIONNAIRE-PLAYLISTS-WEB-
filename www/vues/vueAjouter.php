<h2>Ajout d'une version de chanson </h2>
<!-- test-->
<form method="post" action="#">
	<label for="titreChanson">Nom de la Chanson : </label>
	<input type="text" name="titreChanson" id="titreChanson" placeholder="Black Summer" value="Meow Meow" />
	<br/>
	<label for="dateVersion"> Date de sortie </label>
	<input type="date" name="dateVersion" id="dateVersion" value="2018-07-22" />
	<br/>
	<label for="dureeVersion"> durée de Chanson : </label>
	<!--<input type="number" min="0" name="minutes" id="minutes" /> min <input type="number" min="0" max="59" name="secondes" id="secondes" /> sec
	<br/>-->
	<input type = "number" name = "dureeVersion" id = "dureeVersion" min = "0" value="180" > secondes
	<br/>
	<label for="nomGroupe"> nom du groupe : </label>
	<input type="text" name="nomGroupe" id="nomGroupe" value="AC/DC"/> 
	<!--<select name = "nomGroupe" id = "nomGroupe" > 
		<option value="Air">Air</option>
		<option value="AC/DC">AC/DC</option>
		<option value="Genesis">Genesis</option>
		<option value="existe pas">Existe pas</option>
	</select>-->
	<br/>
	<label for="genreChanson"> genre chanson : </label>
	<input type="text" name="genreChanson" id="genreChanson" value="Rock" />	
	<!--<select name = "genreChanson" id = "genreChanson" > 
		<option value="Electro">Electro</option>
		<option value="Rock">rock</option>
	</select>-->
	<br/>
	<label for="nomFichierV"> nom fichier : </label>
	<input type="text" name="nomFichierV" id="nomFichierV" value="E://meowmeow.mp3"/> <!--pas de required ça me soaule on verra après -->
	<br/><br/>
	<input type="submit" name="boutonValider" value="Ajouter"/>
</form>

<?php if(isset($message)) { ?>
	<p style="background-color: yellow;"><?= $message ?></p>
<?php } ?>