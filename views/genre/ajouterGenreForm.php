<?php

ob_start();


?>


<a href="./index.php">Retour</a>


<h2>Ajouter un genre</h2>

<div class="content">
    <form action="./index.php?action=ajouterGenre" method="post">
        <div>
            <label for="nom genre">Nom du genre :</label>
            <input type="text" id="libelle" name="nom_du_genre" placeholder="" required>
        </div>
        <div>
            <button type="submit">Ajouter le genre</button>
        </div>
    </form>
</div>

<?php
$titre = "Ajouter un genre";
$contenu = ob_get_clean();
require "views/template.php";
