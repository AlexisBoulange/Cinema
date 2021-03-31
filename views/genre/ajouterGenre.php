<?php
ob_start();

?>


<a href="./index.php">Retour</a>


<h2>Le genre "<?= $_POST[('nom_du_genre')]?>" a été rajouté avec succès</h2>



<?php

$titre = "Genre ajouté";
$contenu = ob_get_clean();
require "views/template.php";