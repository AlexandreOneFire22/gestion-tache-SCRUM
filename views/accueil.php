<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
</head>
<body>

<h1> Bienvenue :)</h1>

<a href="index.php?route=CreateAccount"> Créer un compte</a>
<a href="index.php?route=Connexion"> se Connecter</a>

<?php if (isset($_SESSION["pseudo"])): ?>
<p> Bonjour <?= $_SESSION["pseudo"] ?></p>
<?php endif; ?>


</body>
</html>