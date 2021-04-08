<?php

ob_start();

$modifReal = $realisateur->fetch(PDO::FETCH_ASSOC);

?>

<h2>Modifier un realisateur</h2>

<div class="content">
    <form action="./index.php?action=editRealOK&id=<?=$modifReal["realisateur_id"]?>" method="post">
        <div>
            <label for="nom realisateur">Nom :</label>
            <input type="text" id="nom" name="nom_du_realisateur" value=<?=$modifReal["nom"]?>>
        </div>
        <div>
            <label for="prenom realisateur">Prénom :</label>
            <input type="text" id="prenom" name="prenom_du_realisateur" value=<?=$modifReal["prenom"]?>>
        </div>
        <div>
            <label for="sexe realisateur">Sexe :</label>
            <input type="text" id="sexe" name="sexe" value=<?=$modifReal["sexe"]?>>
        </div>
        <div>
        <div>
            <label for="date naissance realisateur">Date de naissance :</label>
            <input type="date" id="date" name="date_de_naissance" value=<?=$modifReal["date_naissance"]?>>
        </div>
            <button type="submit">Modifier le réalisateur</button>
        </div>
    </form>
</div>

<?php
$titre = "Modifier un realisateur";
$contenu = ob_get_clean();
require "views/template.php";
