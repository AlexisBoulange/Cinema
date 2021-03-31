<?php

ob_start();

$detailActeur = $acteur->fetch(PDO::FETCH_ASSOC);



?>


<h2>Détails de <?=$detailActeur['acteur']?></h2>


<table>
    <thead>
        <tr>
            <th>SEXE</th>
            <th>DATE DE NAISSANCE</th>
            <th>FILMOGRAPHIE</th>
        </tr>
    </thead>
    <tbody>
        <?php
                echo "<tr><td>". $detailActeur["sexe"]."</td>";
                echo "<td>". $detailActeur["date_naissance"]."</td>";
                echo"<td>";
                while($filmo = $filmoActeur->fetch()){
                    echo "<a href='index.php?action=detailFilm&id= ". $filmo["film_id"]."'</a>".$filmo["titre"]."</br>";
                }
                "</td></tr>";
        ?>
    </tbody>
</table>





<?php

$acteur->closeCursor();
$titre = "Détail de l'acteur ".$detailActeur['acteur'];
$contenu = ob_get_clean();
require "views/template.php";