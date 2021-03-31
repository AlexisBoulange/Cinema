<?php

ob_start();
?>


<h2>Accueil</h2>


<a href="index.php?action=ajouterRealForm">Ajouter Réalisateur</a><br>
<a href="index.php?action=ajouterActeurForm">Ajouter Acteur</a><br>
<a href="index.php?action=ajouterGenreForm">Ajouter Genre</a>




<?php

$titre = "Page d'accueil de notre site";
$contenu = ob_get_clean();
require "views/template.php";