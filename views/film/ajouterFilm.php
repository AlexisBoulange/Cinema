<?php
ob_start();

?>


<a href="./index.php">Retour</a>


<h2><?= $_POST[('titre')]?> a été rajouté à la liste de film avec succès</h2>



<?php

$titre = "Film ajouté";
$contenu = ob_get_clean();
require "views/template.php";