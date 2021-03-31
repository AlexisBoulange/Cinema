<?php

ob_start();


?>


<a href="./index.php">Retour</a>


<h2>Ajouter un acteur</h2>

<div class="content">
    <form action="./index.php?action=ajouterActeur" method="post">
        <div>
            <label for="nom acteur">Nom :</label>
            <input type="text" id="nom" name="nom_acteur" placeholder="" required>
        </div>
        <div>
            <label for="prenom acteur">Prénom :</label>
            <input type="text" id="prenom" name="prenom_acteur" placeholder="" required>
        </div>
        <div>
            <label for="sexe acteur">Sexe :</label>
            <input type="text" id="sexe" name="sexe" placeholder="M ou F" required>
        </div>
        <div>
        <div>
            <label for="date naissance acteur">Date de naissance :</label>
            <input type="date" id="date" name="date_de_naissance" placeholder="" required>
        </div>
            <button type="submit">Ajouter l'acteur</button>
        </div>
    </form>
</div>

<?php
$titre = "Ajouter un acteur";
$contenu = ob_get_clean();
require "views/template.php";