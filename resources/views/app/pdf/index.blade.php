<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PDF OZA</title>
        <link rel="stylesheet" href="{{ public_path('css/pdf/pdf.min.css') }}">

        <style>
            @page {
                margin: 0;
                padding: 0;
                /*background-color: #FFFFFF;*/
            }
        </style>
    </head>
    <body class="pdf">
        <section class="page page-first">
            <div class="header">
                <img src="{{ public_path('img/logo.png') }}">
            </div>

            <div class="body">
                <div class="header">
                    <p class="subtitle">Document Unique</p>
                    <h1 class="title">{ Titre du Document unique }</h1>
                    <p class="info">Code de Travail article L.4121-3</p>
                    <p class="info">Transcription des résultats de l'évaluation des risques pour la santé et la sécurité du personnel</p>
                </div>

                <img src="{{ public_path('storage/logo/logo.png') }}" alt="">

                <div class="info-single_document">
                    <p>Document Unique élaboré le : <span class="bold">16 Décembre 2021</span></p>
                    <p>Version : <span class="bold">2</span></p>
                </div>
            </div>

            <div class="footer">
                <p class="center text-color-green">Copyright © OZA S.A.S. - Objectif Zéro Accident - 15 place des Arènes - 40400 MEILHAN - Tél. : 05 58 76 39 36 - contact@oza-france.fr - www.objectif-zero-accident.fr</p>
                <p class="page-num">Page <span></span></p>
            </div>
        </section>

        <section class="page page-second">
            <div class="header">
            </div>
            <div class="body">
                <div class="header">
                    <h1 class="title">Document Unique</h1>
                    <p class="info">Code de Travail article L.4121-3</p>
                    <p class="info">Transcription des résultats de l'évaluation des risques pour la santé et la sécurité du personnel</p>
                </div>
            </div>
            <div class="footer">
                <p class="center">Copyright © OZA S.A.S. - dsqdsqdObjectif Zéro Accident</p>
                <p class="page-num">Page <span></span></p>
            </div>
        </section>

        <section class="page">
            <div class="header">
                <p class="center">Numéro du client - Adresse postale</p>
            </div>
            <div class="body">
                <p>Content</p>
            </div>
            <div class="footer">
                <p class="center">Copyright © OZA S.A.S. - Objectif Zéro Accident</p>
                <p class="page-num">Page <span></span></p>
            </div>
        </section>
    </body>
</html>
