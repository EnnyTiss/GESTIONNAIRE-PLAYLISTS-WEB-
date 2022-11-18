<main>
	
	<div class "accueil"><p>Site en construction, attention ou vous mettez vos pieds</p>
	<img src="img/NOGODPLEASENO.png" alt="meme the office, micheal scott crie no, god! no, god no, please no ! no ! no ! nooooo! " class="image_accueil" />
	</div>
	
	<?php
		$nb = countInstances($connexion, "Series");
		if($nb <= 0)
			$message = "Aucune série n'a été trouvée dans la base de données !";
		else
			$message = "Actuellement $nb séries dans la base.";

	?>
	<div><p><?= $message ?></p></div>
	
</main>






