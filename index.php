<?php

require_once "controllers/FilmController.php";
require_once "controllers/AccueilController.php";
require_once "controllers/RealController.php";
require_once "controllers/ActeurController.php";
require_once "controllers/GenreController.php";


$ctrlAccueil = new AccueilController;
$ctrlFilm = new FilmController;
$ctrlReal = new RealController;
$ctrlActeur = new ActeurController;
$ctrlGenre = new GenreController;

if (isset($_GET['action'])){

    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);

    switch ($_GET['action']) {
        case "listFilms":
            $ctrlFilm->findAll();
            break;
        case "accueil":
            $ctrlAccueil->pageAccueil();
            break;
        case  "listReal":
            $ctrlReal->findReals();
            break;
        case "detailReal":
            $ctrlReal->findOneById($id);
            break;
        case "listActeurs":
            $ctrlActeur->findActors();
            break; 
        case "detailActeur":
            $ctrlActeur->findDetailActor($id);
            break; 
        case "detailFilm":
            $ctrlFilm->findDetailFilm($id);
            break;
        case "ajouterFilmForm":
            $ctrlFilm->addFilmForm();
            break;
        case "ajouterFilm":
            $ctrlFilm->addFilm($_POST);
            break;
        case "ajouterRealForm" : 
            $ctrlReal->addRealForm();
            break;
        case "ajouterRealisateur" : 
            $ctrlReal->addReal($_POST); 
            break;
        case "ajouterActeurForm" : 
            $ctrlActeur->addActorForm();
            break;
        case "ajouterActeur" : 
            $ctrlActeur->addActor($_POST); 
            break;
        case "editActeur" :
            $ctrlActeur->editActeurForm($id);
            break;
        case "editActeurOK" :
            $ctrlActeur->editActeur($id, $_POST);
            break;
        case "listGenres" : 
            $ctrlGenre->findGenres(); 
            break;
        case "detailGenre" : 
            $ctrlGenre->findGenreFilm($id); 
            break;
        case "ajouterGenreForm" : 
            $ctrlGenre->addGenreForm(); 
            break;
        case "ajouterGenre" : 
            $ctrlGenre->addGenre($_POST); 
            break;
        case "editReal" :
            $ctrlReal->editRealForm($id);
            break;
        case "editRealOK" :
            $ctrlReal->editReal($id, $_POST);
            break;
        case "deleteGenre" :
            $ctrlGenre->deleteGenre($id);
            break;
        case "deleteReal" :
            $ctrlReal->deleteReal($id);
            break;
        case "deleteActeur" :
            $ctrlActeur->deleteActeur($id);
            break;
        case "deleteFilm" :
            $ctrlFilm->deleteFilm($id);
            break;
        case "editFilmForm" :
            $ctrlFilm->editFilmForm($id);
            break;
        case "editFilm" :
            $ctrlFilm->editFilm($id, $_POST);
            break;
    }
}else {
    $ctrlAccueil->pageAccueil();
}
