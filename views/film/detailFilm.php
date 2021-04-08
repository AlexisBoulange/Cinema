<?php

ob_start();

$detailFilm = $details->fetch(PDO::FETCH_ASSOC);
$detailRea = $rea->fetch(PDO::FETCH_ASSOC);

?>

<h2>Détails de <?=$detailFilm['titre']?></h2>
<img src="<?=$detailFilm['affiche']?>"></img>

<table>
    <thead>
        <tr>
            <th>TITRE</th>
            <th>DURÉE</th>
            <th>DATE</th>
            <th>GENRES</th>
        </tr>
    </thead>
    <tbody>
        <?php
                echo "<tr><td>". $detailFilm["titre"]."</td>";
                echo "<td>". $detailFilm["duree"]."</td>";
                echo "<td>". $detailFilm["date"]."</td>";
                echo "<td>";
                while($genre = $genres->fetch()){
                    echo "<a href='index.php?action=detailGenre&id=".$genre["genre_id"]."'>" .$genre["genres"]." ";
                }"</td></tr>"
                
        ?>
    </tbody>
</table>


<h3>Réalisé par : <?php echo "<a href='index.php?action=detailReal&id=". $detailRea["realisateur_id"]."'>".$detailRea['realisateur']."</a>";?></h3>


<table>
    <thead>
        <tr>
            <th>ACTEUR</th>
            <th>SEXE</th>
            <th>RÔLE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($acteur = $acteurs->fetch()){
                echo "<tr><td><a href='index.php?action=detailActeur&id=".$acteur["acteur_id"]."'>" .$acteur["acteur"]."</td>";
                echo "<td>". $acteur["sexe"]."</td>";
                echo "<td>". $acteur["personnage"]."</td></tr>";
                $filmName = $acteur["titre"];     
            }echo "<h3>Liste des acteurs jouant dans " . $filmName . " : </h3>";
        ?>
    </tbody>
</table>

<?php

echo "<a href='index.php?action=ajouterCasting&id=". $detailFilm['film_id']. "'> Ajouter un acteur au casting </a><br/>";


?>
<?php
$acteurs->closeCursor();
$titre = "Détails du film " . $detailFilm["titre"];
$contenu = ob_get_clean();
require "views/template.php";