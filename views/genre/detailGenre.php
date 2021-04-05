<?php

ob_start();

$detailGenre = $filmGenre->fetch(PDO::FETCH_ASSOC);



?>


<h2>Liste de films du genre <?=$detailGenre['libelle']?></h2>



        <?php
                echo"<ul>";
                while($filmo = $filmGenre->fetch()){
                        echo "<li><a href='index.php?action=detailFilm&id= ". $filmo["film_id"]."'</a>".$filmo["titre"]."</br>";
                }
                "</li></ul>";
        ?>






<?php

$filmGenre->closeCursor();
$titre = "Détail du genre ".$detailGenre['libelle'];
$contenu = ob_get_clean();
require "views/template.php";