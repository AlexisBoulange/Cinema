<?php

require_once 'classes/Individu.php';
require_once 'classes/Acteur.php';
require_once 'classes/Realisateur.php';
require_once 'classes/Film.php';
require_once 'classes/Genre.php';
require_once 'classes/Casting.php';
require_once 'classes/Role.php';

$a1 = new Acteur(1, "Viggo", "Mortensen", "Masculin", "20-10-1958", "Aragorn");

// $hf = new Genre(1, "Heroic Fantasy");


// $lotr = new Film(1, "Le Seigneur des Anneaux", "19-12-2001", 178, "Peter Jackson", "Un jeune et timide `Hobbit`, Frodon Sacquet, hérite d`un anneau magique. Bien loin d`être une simple babiole, il s`agit d`un instrument de pouvoir absolu qui permettrait à Sauron, le `Seigneur des ténèbres`, de régner sur la `Terre du Milieu` et de réduire en esclavage ses peuples. Frodon doit parvenir jusqu`à la `Crevasse du Destin` pour détruire l`anneau.", 5, "img/lotr.jpg", $c1, $hf);

// Attribution d'acteurs à un film => casting

echo $c1;