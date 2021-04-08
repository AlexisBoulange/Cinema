<?php

ob_start();


?>

<a href="./index.php">Retour</a>


<h2>Film supprimé avec succès</h2>


<?php

$titre = "Film supprimé";
$contenu =ob_get_clean();
require "views/template.php";