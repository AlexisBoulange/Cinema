<?php


ob_start();

$detailReal = $realisateur->fetch(PDO::FETCH_ASSOC);

?>

<h2>Détails de <?=$detailReal['realisateur']?></h2>


<table>
    <thead>
        <tr>
            <th>SEXE</th>
            <th>DATE DE NAISSANCE</th>
            <th>FILMOGRAPHIE</th>
        </tr>
    </thead>
    <tbody>
        <?php
                echo "<tr><td>". $detailReal["sexe"]."</td>";
                echo "<td>". $detailReal["date_naissance"]."</td>";
                echo "<td>";
                while($filmoR = $filmoRea->fetch()){
                    echo "<a href='index.php?action=detailFilm&id= ". $filmoR["film_id"]."'</a>".$filmoR["titre"]."</br>";
                }"</td></tr>";
        ?>
    </tbody>
</table>




<?php

$realisateur->closeCursor();
$titre = "Détail du réalisateur ".$detailReal['realisateur'];
$contenu = ob_get_clean();
require "views/template.php";