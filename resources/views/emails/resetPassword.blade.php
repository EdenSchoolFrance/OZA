<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Reset du mot de passe</h2>
        <p>Cliquez sur le lien pour modifier votre mot de passe</p>
        <a href="{{ route('resetPassword', [$data['token']]) }}">Modifier mon mot de passe</a>
    </body>
</html>
