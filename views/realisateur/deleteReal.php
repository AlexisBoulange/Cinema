<?php

ob_start();

?>

<h2>Le réalisateur a bien été supprimé</h2>

<a href="index.php?action=listReal">Retour</a>

<?php
$titre = "Supprimé";
$contenu = ob_get_clean();
require "views/template.php";