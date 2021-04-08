<?php

ob_start();


?>

<h2>L'acteur a bien été supprimé</h2>

<a href="index.php?action=listActeurs">Retour</a>

<?php
$titre = "Supprimé";
$contenu = ob_get_clean();
require "views/template.php";