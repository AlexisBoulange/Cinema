<?php

ob_start();

?>

<h2>Il y a : <?=$reals->rowCount(); ?> realisateurs</h2>



<table>
    <thead>
        <tr>
            <th>REALISATEUR</th>
            <th>SEXE</th>
            <th>DATE DE NAISSANCE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($real = $reals->fetch()){
                echo "<tr><td><a href='index.php?action=detailReal&id=".$real["realisateur_id"]."'>" .$real["realisateur"]."</td>";
                echo "<td>". $real["sexe"]."</td>";
                echo "<td>". $real["date_naissance"]."</td>";
            }
        ?>
    </tbody>
</table>

<a href="index.php?action=ajouterRealForm">Ajouter Réalisateur</a>



<?php

$reals->closeCursor();
$titre = "Liste des realisateurs";
$contenu = ob_get_clean();
require "views/template.php";