<h2> Générer une playlist aléatoire </h2>

<form method="post" action="#">
    <label for="titrePlay"> Titre de la playlist</label>
    <input type="text" name="titrePlay" id="titrePlay"value="TopTitres2022"/><br/>
    <label for="dureePlay"> Durée de la playlist</label>
    <input type="number" name="dureePlay" id="dureePlay" min="1" value="1200"/> secondes<br/> 
    <label for="genrePlay"> Genre préféré</label>
    <input type="text" name="genrePlay" id="genrePlay"/> <br/>
    <label for="prefStats"> Préférences sur les statistiques</label>
    <select name="prefStats" id="prefStats">
    <option value="none">  </option>
        <option value="playcount">Musiques les plus jouées</option>
        <option value="skipcount">Musiques les plus sautées</option>
        <option value="lastplayed">Musiques écoutées le plus récemment</option>
    </select> <br/>
    <br/><br/>
	<input type="submit" name="boutonValider" value="Générer"/>
</form>