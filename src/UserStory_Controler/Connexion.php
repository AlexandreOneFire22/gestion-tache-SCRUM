<?php

namespace App\UserStory_Controler;


use App\Entity\User;
use Doctrine\ORM\EntityManager;
use MongoDB\Driver\Exception\Exception;

/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */

class Connexion {
    private EntityManager $entityManager;

    /**
     * @param EntityManager $
     */
    public function __construct(EntityManager $entityManager)
    {
        //entityManager est injecter par dépendance.
        $this->entityManager = $entityManager;
    }

    //cette méthode permettera d'excecuté la UserStorie.
    public function execute($email,$password){

        session_start();

        if (!empty($_SESSION["pseudo"])){
        $_SESSION["message_erreur"]= "Vous êtes déjà connecter, déconnecter vous pour accèder à la page de connection.";
        header("Location: index.php");
        exit();
        }

        $emailUser = $this->entityManager->getRepository(User::class)->findOneBy(['email' => "$email"]);

        if (is_null($emailUser)){
            throw new \Exception("cette email ne possède pas de compte");
        }

        if (password_verify($password,$emailUser->getPassword())){
            $_SESSION["pseudo"] = $emailUser->getPseudo();
            $_SESSION["id_user"] = $emailUser->getId();

            header("Location: index.php");
            exit();
        }else{
            throw new \Exception("le mot de passe est érroné.");
        }

    }


}

?>

<a href="index.php">retour accueil</a>


