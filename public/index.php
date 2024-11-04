<?php

use App\Entity\User;

/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */

$entityManager = require_once __DIR__.'/../config/bootstrap.php';

$route = $_GET['route'] ?? 'accueil' ;

switch ($route){

    case "accueil" :
        $accueilController = new \App\UserStory_Controler\AccueilController();
        $accueilController->Accueil();

        break;

    case "CreateAccount" :

        if ($_SERVER["REQUEST_METHOD"] === "POST"){

            $userControleur = new \App\UserStory_Controler\CreateAccount($entityManager);

            $userControleur->execute($_POST["pseudo"],$_POST["email"],$_POST["password"]);

            header("index.php");
        }else{
            require __DIR__."/../views/creerCompte.php";
        }

        break;

    case "Connexion" :

        if ($_SERVER["REQUEST_METHOD"] === "POST"){

            $userControleur = new \App\UserStory_Controler\Connexion($entityManager);

            $userControleur->execute($_POST["email"],$_POST["password"]);

            header("index.php");
        }else{
            require __DIR__."/../views/seConnecter.php";
        }

        break;

    default :

        echo "Page non trouvée";

        break;

}