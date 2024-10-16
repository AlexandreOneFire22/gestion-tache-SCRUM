<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User</title>
</head>
<body>

<div>
    <h1>Ajouter un utilisateur :</h1>

        <form action="" method="post" novalidate>

            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo* :</label>
                <input type="text"
                       class="form-control"
                       id="pseudo"
                       name="pseudo"
                       value=""
                       placeholder="Saisissez votre pseudo">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email* :</label>
                <input type="email"
                       class="form-control"
                       id="email"
                       name="email"
                       value=""
                       placeholder="Saisissez votre adresse email">

            </div>



            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe* :</label>
                <input type="password"
                       class="form-control"
                       id="password"
                       name="password"
                       value=""
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