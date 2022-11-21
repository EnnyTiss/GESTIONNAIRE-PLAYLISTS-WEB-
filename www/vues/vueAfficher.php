<?php if(isset($message)) { ?>
	<p style="background-color: yellow;"><?= $message ?></p>
<?php } ?>
			
<h2>Liste des versions de chanson :</h2>
<ul>
<?php foreach($Version as $version) { ?>
	<li><?= $version['idC'] ?><?= $version['numV'] ?><?= $version['nomFichierV'] ?></li>
<?php } ?>
</ul>