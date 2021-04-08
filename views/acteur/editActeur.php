<?php

ob_start();

$modifActeur = $acteur->fetch(PDO::FETCH_ASSOC);
?>

<h2>Modifier un acteur</h2>

<div class="content">
    <form action="./index.php?action=editActeurOK&id=<?=$modifActeur["acteur_id"]?>" method="post">
        <div>
            <label for="nom acteur">Nom :</label>
            <input type="text" id="nom" name="nom_acteur" value=<?=$modifActeur["nom"]?>>
        </div>
        <div>
            <label for="prenom acteur">Prénom :</label>
            <input type="text" id="prenom" name="prenom_acteur" value=<?=$modifActeur["prenom"]?>>
        </div>
        <div>
            <label for="sexe acteur">Sexe :</label>
            <input type="text" id="sexe" name="sexe" value=<?=$modifActeur["sexe"]?>>
        </div>
        <div>
        <div>
            <label for="date naissance acteur">Date de naissance :</label>
            <input type="date" id="date" name="date_de_naissance" value=<?=$modifActeur["date_naissance"]?>>
        </div>
            <button type="submit">Modifier l'acteur</button>
        </div>
    </form>
</div>

<?php
$titre = "Modifier un acteur";
$contenu = ob_get_clean();
require "views/template.php";