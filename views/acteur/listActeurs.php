<?php

ob_start();

?>

<h2>Il y a : <?=$acteurs->rowCount(); ?> acteurs</h2>



<table>
    <thead>
        <tr>
            <th>ACTEUR</th>
            <th>SEXE</th>
            <th>DATE DE NAISSANCE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($acteur = $acteurs->fetch()){
                echo "<tr><td><a href='index.php?action=detailActeur&id=".$acteur["acteur_id"]."'>" .$acteur["acteur"]."</a></td>";
                echo "<td>". $acteur["sexe"]."</td>";
                echo "<td>". $acteur["date_naissance"]."</td>";
                echo "<td><a href='index.php?action=editActeur&id=".$acteur["acteur_id"]."'>Modifier</a></td>";
                echo "<td><a href='index.php?action=deleteActeur&id=".$acteur["acteur_id"]."'>Supprimer</a></td></tr>";
            }
        ?>
    </tbody>
</table>

<a href="index.php?action=ajouterActeurForm">Ajouter Acteur</a>



<?php

$acteurs->closeCursor();
$titre = "Liste des acteurs";
$contenu = ob_get_clean();
require "views/template.php";