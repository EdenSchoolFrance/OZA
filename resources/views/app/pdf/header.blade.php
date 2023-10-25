<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        #header {
            font-size: 11px; /* Taille de la police en pixels */
            font-family: sans-serif;
            text-align: center; /* Centre le contenu horizontalement */
            vertical-align: middle; /* Centre le contenu verticalement (pour les éléments en ligne) */
            display: flex; /* Centre le contenu verticalement (pour les éléments en bloc) */
            align-items: center; /* Centre le contenu verticalement (pour les éléments en bloc) */
        }
    </style>
</head>
<body>
    <div id="header">   
        {{ $single_document->name_enterprise }} - {{ $single_document->adress }}, {{ $single_document->city_zipcode }} {{ $single_document->city }}
    </div>
</body>
</html>

