<?php
ob_start();

?>


<a href="./index.php">Retour</a>


<h2>Réalisateur <?= $_POST[('prenom_du_realisateur')]." ".$_POST[('nom_du_realisateur')]?> rajouté avec succès</h2>



<?php

$titre = "Realisateur ajouté";
$contenu = ob_get_clean();
require "views/template.php";