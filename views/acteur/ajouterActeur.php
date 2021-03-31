<?php
ob_start();

?>


<a href="./index.php">Retour</a>


<h2>Réalisateur <?= $_POST[('prenom_acteur')]." ".$_POST[('nom_acteur')]?> rajouté avec succès</h2>



<?php

$titre = "Acteur ajouté";
$contenu = ob_get_clean();
require "views/template.php";