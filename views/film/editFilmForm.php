<?php

ob_start();

$editInfo = $edit1->fetch();

?>


<a href="./index.php">Retour</a>


<h2>Modifier un film</h2>

<div class="content">
    <form action="./index.php?action=editFilm&id=<?= $editInfo['film_id'] ?>" method="post">
        <div>
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" value="<?= $editInfo['titre'] ?>" required>
        </div>
        <div>
            <label for="date de sortie">Date de sortie :</label>
            <input type="date" id="sortie" name="sortie" value="<?= $editInfo['sortie'] ?>" required>
        </div>
        <div>
            <label for="duree">Durée en minutes :</label>
            <input type="text" id="duree" name="duree" value="<?= $editInfo['duree'] ?>" required>
        </div>

        <?php

        $tableauGenres = array();

        while ($findIdGenre = $edit2->fetch()) {
            array_push($tableauGenres, $findIdGenre["genre_id"]);
        }
        var_dump($tableauGenres)
        ?>
        <div>
            <select name="genre_id[]" multiple required>
                <?php
                while ($genre = $edit3->fetch()) {
                    echo "<option value=" . $genre['genre_id'];
                    if (in_array($genre['genre_id'], $tableauGenres)) {
                        echo " selected";
                    }
                    echo ">" . $genre['libelle'] . "</option>";
                }

                ?>
            </select>
        </div>

        <div>
            <select name="realisateur" size="1">
                <?php
                while ($nomReal = $edit4->fetch()) {
                    echo "<option value=" . $nomReal['realisateur_id'];
                    if ($nomReal['realisateur_id'] == $editInfo['realisateur_id']) {
                        echo " selected";
                    }
                    echo ">" . $nomReal['realNom'] . "</option>";
                }

                ?>
            </select>
        </div>
        <div>
            <button type="submit">Modifier le film</button>
        </div>
    </form>
</div>

<?php
$titre = "Modifier un film";
$contenu = ob_get_clean();
require "views/template.php";
