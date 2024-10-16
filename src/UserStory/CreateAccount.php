<?php

namespace App\UserStory;


use App\Entity\User;
use Doctrine\ORM\EntityManager;

/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */

$entityManager = require_once __DIR__.'/../../config/bootstrap.php';

class CreateAccount{

    private EntityManager $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        //EntiteManager est injecter par dépendance.
        $this->entityManager = $entityManager;
    }

    //cette méthode permettera d'excecuté la UserStorie.
    public function execute(string $pseudo,string $email, string $password) : User{


        //Verifier que les données sont présente.
        //Si tel n'est pas le cas, lancer une Exception.

switch (true){
    case (empty($pseudo)):
        throw new \ErrorException("Le pseudo doit être obligatoire.");

    case (empty($email)):
        throw new \ErrorException("L'adresse email doit être obligatoire.");

    case (empty($password)):
        throw new \ErrorException("Le mot de passe doit être obligatoire doit être obligatoire.");
}

        //Verifier si l'email est valide
        //Si tel n'est pas le cas, lancer une Exception.

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new \ErrorException("L'adresse email saisie est invalide.");
        }

        //Verifier si le pseudo est comprise entre 2 et 50 caractère.
        //Si tel n'est pas le cas, lancer une Exception.

        if ($pseudo < 2 || $pseudo > 50 ){
            throw new \ErrorException("Le pseudo doit être comprise entre 2 et 50 caractères, le votre fait ".strlen($pseudo)." caractères.");
        }

        //Verifier si le mot de passe est valide (sécurisé).
        //Si tel n'est pas le cas, lancer une Exception.

        if ($pseudo <= 8){
            throw new \ErrorException("Le mot de passe doit être supérieur ou égale à 8 caractères, le votre fait ".strlen($password)." caractères.");
        }

        //Verifier l'unicité de l'email (SELECT avec doctrine).
        //Si tel n'est pas le cas, lancer une Exception.

        $repository = $this->entityManager->getRepository(User::class)
                                          ->findOneBy(array('email' => $email));

        if (!is_null($repository)){
            throw new \ErrorException("Cette adresse email est déjà utiliser");
        }



        //Insérer les données dans la base de donnée



        //hacher(Hash) le mot de passe.

        $password = password_hash($password,PASSWORD_DEFAULT);

        //Je crée une instance de la classe User avec le mail, le pseudo et le mot de passe hacher
        $user = new User();

        $user->setPseudo($pseudo);
        $user->setEmail($email);
        $user->setPassword($password);

        //Je persist l'instance en utilisant l'entiteManager.
        $this->entityManager->persist($user);
        $this->entityManager->flush();




        //Envoie du mail de confirmation.
        echo "Un email de confirmation à été envoyé à l'utilisateur";
        return $user;
    }

}