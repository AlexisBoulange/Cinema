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
                echo "<tr><td><a href='index.php?action=detailActeur&id=".$acteur["acteur_id"]."'>" .$acteur["acteur"]."</td>";
                echo "<td>". $acteur["sexe"]."</td>";
                echo "<td>". $acteur["date_naissance"]."</td>";
                
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