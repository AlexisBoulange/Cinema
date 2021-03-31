<?php

ob_start();

?>

<h2>Il y a : <?=$genres->rowCount(); ?> genres</h2>



<table>
    <thead>
        <tr>
            <th>GENRE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($genre = $genres->fetch()){
                echo "<tr><td><a href='index.php?action=detailGenre&id=".$genre["genre_id"]."'>" .$genre["libelle"]."</td>";
            }
        ?>
    </tbody>
</table>
<a href="index.php?action=ajouterGenreForm">Ajouter Genre</a>



<?php

$genres->closeCursor();
$titre = "Liste des genres";
$contenu = ob_get_clean();
require "views/template.php";