<?php

ob_start();


?>


<a href="./index.php">Retour</a>


<h2>Ajouter un realisateur</h2>

<div class="content">
    <form action="./index.php?action=ajouterRealisateur" method="post">
        <div>
            <label for="nom realisateur">Nom :</label>
            <input type="text" id="nom" name="nom_du_realisateur" placeholder="" required>
        </div>
        <div>
            <label for="prenom realisateur">Prénom :</label>
            <input type="text" id="prenom" name="prenom_du_realisateur" placeholder="" required>
        </div>
        <div>
            <label for="sexe realisateur">Sexe :</label>
            <input type="text" id="sexe" name="sexe" placeholder="M ou F" required>
        </div>
        <div>
        <div>
            <label for="date naissance realisateur">Date de naissance :</label>
            <input type="date" id="date" name="date_de_naissance" placeholder="" required>
        </div>
            <button type="submit">Ajouter le réalisateur</button>
        </div>
    </form>
</div>

<?php
$titre = "Ajouter un realisateur";
$contenu = ob_get_clean();
require "views/template.php";
