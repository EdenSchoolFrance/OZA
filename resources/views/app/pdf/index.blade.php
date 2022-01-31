<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PDF OZA</title>
        <style>

            * {
                box-sizing: border-box;
                font-family: Arial, sans-serif;
            }

            html {
                height: 100%;
            }

            body {
                padding: 0;
                margin: 0;
                background-color:#FFFFFF;
                overflow-y: auto;
            }

            h1 {
                font-size: 30px;
                font-family: Arial, sans-serif;
            }

            h2 {
                font-size: 26px;
            }

            h3 {
                font-size: 18px;
            }

            h4 {
                font-size: 16px;
            }
            p {
                font-family: Arial, sans-serif;
                margin: 0;
                font-size: 12px;
            }

            li {
                list-style: none;
            }

            ul {
                padding: 0;
                margin: 0;
            }

            a{
                text-decoration: none;
            }

            @page {
                margin: 0;
                padding: 0;
                /*background-color: #FFFFFF;*/
                height: 100vh;
            }

            .text-color-green{
                color: #43A389;
            }
            .bold{
                font-weight: 700;
            }
            .card {
                padding: 10% 0;
                text-align: center;
            }
            .card p:first-child{
                font-size: 20px;
            }
            .card h1{
                margin-bottom: 20px;
            }
            .card img{
                margin: 30px 0 20px 0;
                width: 200px;
            }

            .page{
                height: 793px;
                position: relative;
                page-break-after: always;
            }
            .page:last-child{
                page-break-after: inherit;
            }

            .page .header{
                height: 3%;
                background-color: lightpink;
            }
            .page .body{
                height: 94%;
                background-color: lightgreen;
            }
            .page .footer{
                height: 3%;
                position: relative;
                background-color: lightblue;
            }
            .page .footer .mid{
                text-align: center;
                font-size: 10px;
            }
            .page .footer .page-num{
                position: absolute;
                bottom: 10px;
                right: 10px;
                font-size: 12px;
            }
            .page .footer .page-num span:before{
                content: counter(page);
            }

            .center{
                text-align: center;
            }

            .page-first .header{
                height: 9%;
            }
            .page-first .header img{
                margin: 10px 20px;
            }
            .page-first .body{
                height: 88%;
            }
        </style>

    </head>
    <body class="pdf-oza">
        <section class="page page-first">
            <div class="header">
                <img src="{{ public_path('img/logo.png') }}">
            </div>
            <div class="body">
                <div class="card">
                    <p class="bold">Document Unique</p>
                    <h1 class="text-color-yellow">{ TITRE DU DOCUMENT UNIQUE }</h1>
                    <p>Document Unique élaboré le : <span class="bold">16 Décembre 2021</span></p>
                    <p>Version : <span class="bold">2</span></p>
                    <img src="{{ public_path('storage/logo/logo.png') }}" alt="">
                    <p>Code de Travail article.L.4121-3</p>
                    <p>Transcription des résultats de l'évaluation des risques pour la santé et la sécurité du personnel</p>
                </div>
            </div>
            <div class="footer">
                <p class="mid text-color-green">Copyright © OZA S.A.S. - Objectif Zéro Accident - 15 place des Arènes - 40400 MEILHAN - Tél. : 05 58 76 39 36 - contact@oza-france.fr - www.objectif-zero-accident.fr</p>
            </div>
        </section>

        <section class="page">
            <div class="header">

            </div>
            <div class="body">
                <div class="center">
                    <h1 class="text-color-green">DOCUMENT UNIQUE</h1>
                    <p>Code de Travail article L.4121-3</p>
                    <p>Transcription des résultats de l'évaluation des risques pour la santé et la sécurité du personnel</p>
                </div>

            </div>
            <div class="footer">
                <p class="mid">Copyright © OZA S.A.S. - Objectif Zéro Accident</p>
                <p class="page-num">Page <span></span></p>
            </div>
        </section>
    </body>
</html>
