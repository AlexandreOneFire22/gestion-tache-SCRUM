<?php

namespace App\Controllers;

use App\UserStory\CreateAccount;
use Doctrine\ORM\EntityManager;

class UserController
{

    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function addUser()
    {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $user = new CreateAccount($this->entityManager);
            $user->execute($_POST["pseudo"],$_POST["email"],$_POST["password"]);

            require __DIR__ . "/../views/accueil/accueil.php";
        } else {
            require __DIR__ . "/../views/user/addUser.php";
        }

    }


}