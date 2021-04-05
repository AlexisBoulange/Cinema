<?php

ob_start();


?>


<a href="./index.php">Retour</a>


<h2>Ajouter un film</h2>

<div class="content">
    <form action="./index.php?action=ajouterFilm" method="post">
        <div>
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" placeholder="" required>
        </div>
        <div>
            <label for="date de sortie">Date de sortie :</label>
            <input type="date" id="sortie" name="sortie" placeholder="" required>
        </div>
        <div>
            <label for="duree">Durée en minutes :</label>
            <input type="text" id="duree" name="duree" placeholder="Ex : 120" required>
        </div>
        <div>
            <div>
                <label for="realisateur">Réalisateur :</label>
                <select name="realisateur_id" id="realisateur_id">
                
                <?php 
                while($real = $reals->fetch()){
                    echo "<option value='".$real['realisateur']."'>".$real['realisateur']."</option>";
                } 
                ?>
                </select>
            </div>
            <button type="submit">Ajouter le film</button>
        </div>
    </form>
</div>

<?php
$titre = "Ajouter un film";
$contenu = ob_get_clean();
require "views/template.php";
