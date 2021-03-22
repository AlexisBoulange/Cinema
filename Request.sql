-- a. Informations d’un film (id_film) : titre, année, durée (au format HH:MM) et réalisateur

SELECT f.titre, YEAR(f.sortie) AS annee, CONCAT(FLOOR(f.duree/60),':',MOD(f.duree,60),'') AS duree, CONCAT(r.nom, ' ', r.prenom) AS realisateur
FROM film f, realisateur r
WHERE f.id_film = 1
AND f.id_realisateur = r.id_realisateur


SELECT f.titre,
YEAR(sortie) AS anneeSortie,
DATE_FORMAT(SEC_TO_TIME(duree*60), '%H:%i') AS dureeFilm,
CONCAT(r.prenom,' ', r.nom) AS realisateur
FROM film f
INNER JOIN realisateur r
ON f.id_realisateur = r.id_realisateur
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
WHERE r.id_realisateur = f.id_realisateur

-- d. Nombre de films par genre (classés dans l’ordre décroissant)

SELECT COUNT(f.id_film) AS nbGenre, g.libelle
FROM film f, genre g, possede p
WHERE f.id_film = p.id_film
AND p.id_genre = g.id_genre
GROUP BY g.libelle
ORDER BY nbGenre DESC

-- e. Nombre de films par réalisateur (classés dans l’ordre décroissant)

SELECT COUNT(f.id_film) AS nbFilm, CONCAT(r.nom, ' ', r.prenom) AS realisateur
FROM film f, realisateur r
WHERE f.id_realisateur = r.id_realisateur
GROUP BY realisateur
ORDER BY nbFilm DESC

-- f. Casting d’un film en particulier (id_film) : nom, prénom des acteurs + sexe

SELECT f.id_film, f.titre, CONCAT(a.nom, ' ', a.prenom) AS acteur, a.sexe
FROM film f, acteur a, casting c
WHERE f.id_film = c.id_film
AND c.id_acteur = a.id_acteur
AND f.id_film = 1

-- g. Films tournés par un acteur en particulier (id_acteur) avec leur rôle et l’année de sortie (du film le plus récent au plus ancien)

SELECT CONCAT(a.nom, ' ', a.prenom) AS acteur, r.personnage, YEAR(f.sortie) AS anneeSortie
FROM film f, acteur a, casting c, role r
WHERE f.id_film = c.id_film
AND c.id_acteur = a.id_acteur
AND c.id_role = r.id_role
AND a.id_acteur = 1
ORDER BY Annee DESC

-- h. Listes des personnes qui sont à la fois acteurs et réalisateurs

SELECT CONCAT(r.nom, ' ', r.prenom) AS realisateur
FROM film f, acteur a, casting c, realisateur r
WHERE f.id_film = c.id_film
AND c.id_acteur = a.id_acteur
AND r.id_realisateur = f.id_realisateur
AND r.nom = a.nom

-- i. Liste des films qui ont moins de 15 ans (classés du plus récent au plus ancien)

SELECT f.titre, f.sortie
FROM film f
WHERE f.sortie BETWEEN '2006-03-19' AND NOW()
ORDER BY f.sortie DESC


-- j. Nombre d’hommes et de femmes parmi les acteurs

SELECT a.sexe, COUNT(a.id_acteur) AS nbActeurs
FROM acteur a
GROUP BY a.sexe


-- k. Liste des acteurs ayant plus de 50 ans (âge révolu et non révolu)

SELECT CONCAT(a.nom, ' ', a.prenom) AS acteur, YEAR(CURRENT_TIMESTAMP)- YEAR(a.date_naissance) AS age
FROM acteur a
HAVING age > 50

-- l. Acteurs ayant joué dans 3 films ou plus

SELECT CONCAT(a.nom, ' ', a.prenom) AS acteur, COUNT(c.id_acteur) nbApparitions
FROM acteur a, casting c
WHERE a.id_acteur = c.id_acteur
GROUP BY acteur
HAVING nbApparitions > 2
