<?php

ob_start();

?>

<h2>Il y a : <?=$films->rowCount(); ?> films</h2>


<table>
    <thead>
        <tr>
            <th>TITRE</th>
            <th>SORTIE</th>
            <th>DURÉE</th>
            <th>GENRE</th>
            <th>REALISATEUR</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($film = $films->fetch()){
                echo "<tr><td><a href='index.php?action=detailFilm&id=".$film["film_id"]."'>" .$film["titre"]."</td>";
                echo "<td>". $film["date"]."</td>";
                echo "<td>". $film["duree"]."</td>";
                echo "<td>". $film['genres']."</td>";
                echo "<td><a href='index.php?action=detailReal&id=". $film["realisateur_id"]."'>".$film['realisateur']."</td>";
                echo "<td><a href='index.php?action=editFilmForm&id=".$film['film_id']."'>Modifier</a></td>";
                echo "<td><a href='index.php?action=deleteFilm&id=".$film['film_id']."'>Supprimer</a></tr>";
            }
        ?>
    </tbody>
</table>


<a href="./index.php?action=ajouterFilmForm">Ajouter film</a>


<?php

$films->closeCursor();
$titre = "Liste des films";
$contenu = ob_get_clean();
require "views/template.php";