<main>
	
	<div class "accueil"><p>Compteurs des données disponibles : </p>
	
	</div>
	
	<table> 
	<thead>
		<tr>
			<th> nombre de chansons </th>
			<th> nombre de versions </th>
			<th> nombre de groupes </th>
			<th> nombre de genres </th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td> <?= $nbChanson ?> </td>
			<td> <?= $nbVersion ?> </td>
			<td> <?= $nbGroupe ?> </td>
			<td> <?= $nbGenre ?> </td>
		</tr>
	</tbody>
</table>



<!--	< ?php
		$nb = countInstances($connexion, "Chanson");
		if($nb <= 0)
			$message = "Aucune information n'a été trouvée dans la base de données !";
		else
			$message = "Actuellement $nb séries dans la base.";

	?>
	<div><p>< ?= $message ?></p></div>-->
	
</main>






