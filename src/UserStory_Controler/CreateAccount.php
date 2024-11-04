<?php

namespace App\UserStory_Controler;


use App\Entity\User;
use Doctrine\ORM\EntityManager;
use MongoDB\Driver\Exception\Exception;

/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */

class CreateAccount
{

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
    public function execute(string $pseudo, string $email, string $password): void
    {


        //Verifier que les données sont présente.
        //Si tel n'est pas le cas, lancer une Exception.
        switch (true) {
            case $pseudo == "":
                throw new \Exception("pseudo manquant");

            case $email == "":
                throw new \Exception("email manquant");

            case $password == "":
                throw new \Exception("mot de passe manquant");
        }

        //Verifier si l'email est valide
        //Si tel n'est pas le cas, lancer une Exception.
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("l'email est invalide");
        }

        //Verifier si le pseudo est comprise entre 2 et 50 caractère.
        //Si tel n'est pas le cas, lancer une Exception.
        if (strlen($pseudo) < 2 || strlen($pseudo) > 50) {
            throw new \Exception("le pseudo est comprise entre 2 et 50 caractère ");
        }

        //Verifier si le mot de passe est valide (sécurisé).
        //Si tel n'est pas le cas, lancer une Exception.


        //Verifier l'unicité de l'email (SELECT avec doctrine).
        //Si tel n'est pas le cas, lancer une Exception.

        if (!is_null($this->entityManager->getRepository(User::class)->findOneBy(['email' => "$email"]))) {
            throw new \Exception("cette email possède déjà un compte");
        }


        //Insérer les données dans la base de donnée

        //hacher(Hash) le mot de passe.

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        //Je crée une instance de la classe User avec le mail, le pseudo et le mot de passe hacher
        $user = new User(); //Setters

        $user->setPseudo($pseudo);
        $user->setEmail($email);
        $user->setPassword($passwordHash);

        //Je persist l'instance en utilisant l'entityManager.
        $this->entityManager->persist($user);
        $this->entityManager->flush();


        //Envoie du mail de confirmation.
        echo "Un email de confirmation à été envoyé à l'utilisateur";
    }
}

?>

<a href="index.php">retour accueil</a>
