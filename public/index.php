<?php

/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */

$entityManager = require_once __DIR__.'/../config/bootstrap.php';


$route = $_GET['route'] ?? 'accueil' ;

switch ($route){

    case "accueil" :
        $accueilController = new \App\Controllers\AccueilController();
        $accueilController->Accueil();

        break;

    case "CreateAccount" :

        $livreControleur = new \App\Controllers\UserController($entityManager);

        $livreControleur->addUser();

        break;


    default :
        // Page erreur 404
        echo "Page non trouvée";

        break;

}




