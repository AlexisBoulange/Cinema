-- a. Informations d’un film (id_film) : titre, année, durée (au format HH:MM) et réalisateur

SELECT f.titre, YEAR(f.sortie) AS annee, CONCAT(FLOOR(f.duree/60),':',MOD(f.duree,60),'') AS duree, CONCAT(r.nom, ' ', r.prenom) AS realisateur
FROM film f, realisateur r
WHERE f.film_id = 1
AND f.realisateur_id = r.realisateur_id


SELECT f.titre,
YEAR(sortie) AS anneeSortie,
DATE_FORMAT(SEC_TO_TIME(duree*60), '%H:%i') AS dureeFilm,
CONCAT(r.prenom,' ', r.nom) AS realisateur
FROM film f
INNER JOIN realisateur r
ON f.realisateur_id = r.realisateur_id
WHERE f.id = 3

-- b. Liste des films dont la durée excède 2h15 classés par durée (du plus long au plus court)

SELECT f.titre, CONCAT(FLOOR(f.duree/60),':',MOD(f.duree,60),'') AS duree
FROM film f
WHERE f.duree > 135
ORDER BY f.duree DESC


SELECT f.titre, date_format(sec_to_time(f.duree*60), '%H:%i') AS dureeHeure
FROM film f
WHERE f.duree > 135
ORDER BY f.duree DESC

-- c. Liste des films d’un réalisateur (en précisant l’année de sortie)

SELECT CONCAT(r.nom, ' ', r.prenom) AS realisateur, f.titre, YEAR(f.sortie) AS anneeSortie
FROM realisateur r, film f
WHERE r.realisateur_id = f.realisateur_id

-- d. Nombre de films par genre (classés dans l’ordre décroissant)

SELECT COUNT(f.film_id) AS nbGenre, g.libelle
FROM film f, genre g, possede p
WHERE f.film_id = p.film_id
AND p.genre_id = g.genre_id
GROUP BY g.libelle
ORDER BY nbGenre DESC

-- e. Nombre de films par réalisateur (classés dans l’ordre décroissant)

SELECT COUNT(f.film_id) AS nbFilm, CONCAT(r.nom, ' ', r.prenom) AS realisateur
FROM film f, realisateur r
WHERE f.realisateur_id = r.realisateur_id
GROUP BY realisateur
ORDER BY nbFilm DESC

-- f. Casting d’un film en particulier (id_film) : nom, prénom des acteurs + sexe

SELECT f.film_id, f.titre, CONCAT(a.nom, ' ', a.prenom) AS acteur, a.sexe
FROM film f, acteur a, casting c
WHERE f.film_id = c.film_id
AND c.acteur_id = a.acteur_id
AND f.film_id = 1

-- g. Films tournés par un acteur en particulier (id_acteur) avec leur rôle et l’année de sortie (du film le plus récent au plus ancien)

SELECT CONCAT(a.nom, ' ', a.prenom) AS acteur, r.personnage, YEAR(f.sortie) AS anneeSortie
FROM film f, acteur a, casting c, role r
WHERE f.film_id = c.film_id
AND c.acteur_id = a.acteur_id
AND c.role_id = r.role_id
AND a.acteur_id = 1
ORDER BY anneeSortie DESC

-- h. Listes des personnes qui sont à la fois acteurs et réalisateurs

SELECT CONCAT(r.prenom, ' ',r.nom ) AS realisateur
FROM film f, acteur a, casting c, realisateur r
WHERE f.film_id = c.film_id
AND c.acteur_id = a.acteur_id
AND r.realisateur_id = f.realisateur_id
AND r.nom = a.nom

-- i. Liste des films qui ont moins de 15 ans (classés du plus récent au plus ancien)

SELECT f.titre, YEAR(f.sortie)
FROM film f
WHERE YEAR(CURRENT_DATE())- YEAR(f.sortie) <= 15
ORDER BY f.sortie DESC


-- j. Nombre d’hommes et de femmes parmi les acteurs

SELECT a.sexe, COUNT(a.acteur_id) AS nbActeurs
FROM acteur a
GROUP BY a.sexe


-- k. Liste des acteurs ayant plus de 50 ans (âge révolu et non révolu)

-- Pour 50 ans révolu
SELECT CONCAT(a.nom, ' ', a.prenom) AS acteur, TIMESTAMPDIFF(YEAR, a.date_naissance, CURDATE()) AS age
FROM acteur a
WHERE YEAR(CURDATE()) - YEAR(a.date_naissance) >= 50


SELECT CONCAT(a.nom, ' ', a.prenom) AS acteur
FROM acteur a
WHERE YEAR(NOW()) - YEAR(a.date_naissance)
    -(DATE_FORMAT (NOW(), '%m%d') < DATE_FORMAT(a.date_naissance,, '%m%d')) > 50

-- l. Acteurs ayant joué dans 3 films ou plus

SELECT CONCAT(a.nom, ' ', a.prenom) AS acteur, COUNT(c.acteur_id) nbApparitions
FROM acteur a, casting c
WHERE a.acteur_id = c.acteur_id
GROUP BY acteur
HAVING nbApparitions > 2
