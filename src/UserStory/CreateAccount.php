<?php

namespace App\UserStory;


use App\Entity\User;
use Doctrine\ORM\EntityManager;

/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */

$entityManager = require_once __DIR__.'/../../config/bootstrap.php';

class CreateAccount{

    private EntityManager $entiteManager;

    /**
     * @param EntityManager $entiteManager
     */
    public function __construct(EntityManager $entiteManager)
    {
        //EntiteManager est injecter par dépendance.
        $this->entiteManager = $entiteManager;
    }

    //cette méthode permettera d'excecuté la UserStorie.
    public function execute(string $pseudo,string $email, string $password) : User{


        //Verifier que les données sont présente.
        //Si tel n'est pas le cas, lancer une Exception.

        //Verifier si l'email est valide
        //Si tel n'est pas le cas, lancer une Exception.

        //Verifier si le pseudo est comprise entre 2 et 50 caractère.
        //Si tel n'est pas le cas, lancer une Exception.

        //Verifier si le mot de passe est valide (sécurisé).
        //Si tel n'est pas le cas, lancer une Exception.

        //Verifier l'unicité de l'email (SELECT avec doctrine).
        //Si tel n'est pas le cas, lancer une Exception.



        //Insérer les données dans la base de donnée

        //hacher(Hash) le mot de passe.

        //Je crée une instance de la classe User avec le mail, le pseudo et le mot de passe hacher
        $user = new User(); //Setters

        //Je persist l'instance en utilisant l'entiteManager.
        $this->entiteManager->persist($user);
        $this->entiteManager->flush();


        $this->entiteManager;


        //Envoie du mail de confirmation.
        echo "Un email de confirmation à été envoyé à l'utilisateur";
        return $user;
    }


}