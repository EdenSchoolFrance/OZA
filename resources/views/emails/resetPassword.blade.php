<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <p>Bonjour,</p>
        <p>Pour réinitialiser votre mot de passe, merci de cliquer sur le lien suivant : <a href="{{ route('resetPassword', [$token]) }}">Réinitialiser mon mot de passe</a> </p>
        <p>Si vous n'êtes pas à l'origine de cette demande, ne tenez pas compte de ce message.</p>
        <p>
            Cordialement. <br>
            L'équipe Objectif Zéro Accident
        </p>
    </body>
</html>
