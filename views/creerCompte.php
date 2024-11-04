<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>créer un compte</title>
</head>
<body class="bg-light">
<div class="container">
    <h3 class="ms-5">Créer un compte :</h3>

    <div class="w-75 mx-auto">
        <form action="" method="post" novalidate>

            <div class="mb-3">
                <label for="pseudo" class="form-label">pseudo* :</label>
                <input type="text"
                       id="pseudo"
                       name="pseudo"
                       placeholder="Saisissez votre pseudo">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email* :</label>
                <input type="email"
                       id="email"
                       name="email"
                       placeholder="Saisissez votre email"
                       aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="mdp" class="form-label">mot de passe* :</label>
                <input type="password"
                       id="mdp"
                       name="password"
                       placeholder="Saisissez votre mot de passe">

            </div>

            <span class="d-flex justify-content-evenly">
                <button type="submit" class="btn btn-primary mt-3">Valider</button>
            </span>

        </form>
    </div>
</div>
</body>
</html>