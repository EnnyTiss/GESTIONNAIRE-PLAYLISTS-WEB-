<h2>Playlists existantes</h2>

<?php if(isset($message)) { ?>
	<p style="background-color: yellow;"><?= $message ?></p>
<?php } ?>

<?php if (!isset($_GET["pl"])){ ?>
    <table>
        <thead>
            <tr>
                <th>Titre de la playlist</th>
                <th> Durée (en secondes) </th>
                <th> nombre de chansons </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($Playlist as $playlist) { ?>
                <tr>
                    <td><a href="/index.php?page=afficherPlaylist&pl=<?=$playlist['idPlay']?>" ><?= $playlist['titrePlay'] ?></a> </td> <td> <?= $playlist['dureePl'] ?> </td> <td> <?= $playlist['nbChansons'] ?> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php }
 else {?>
    
    <h3> <? $thisPL[titrePlay]?></h3>
    <table>
        <thead>
            <tr>
                <th> Titre </th>
                <th> Artiste </th>
                <th> Durée </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($InstancePL as $instancePL) { ?>
                <tr>
                    <td><?= $instancePL['titreChanson'] ?></td> <td> <?= $instancePL['nomGrp'] ?> </td> <td> <?= $instancePL['dureeV'] ?> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php }?>