<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>PDF OZA</title>
        <link rel="stylesheet" href="{{ public_path('css/pdf/pdf.min.css') }}">
    </head>
    <?php setlocale(LC_TIME, 'French'); ?>
    <body class="pdf">
        <section class="page">
            <div class="header">
                <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
                    , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
            </div>

            <div class="body" style="min-height: 500px;">
                <h1 class="head-title" id="tabBord">1. TABLEAU DE BORD DE L'ÉVALUATION DES RISQUES</h1>
                <table class="table table--no-border table--dashboard vertical-center">
                    <tr>
                        <td>
                            <div>
                                <p class="bold">Risque brut moyen</p>
                                <p>
                                    Permet de situer le niveau de risque total de la structure, évalué sans prendre en compte
                                    les mesures de prévention ; sur une échelle de zéro (risque nul) à 50 (risque maximal).
                                </p>
                                <p class="{{ $single_document->color($single_document->moyenneRB(),true) }} number">{{ $single_document->moyenneRB() }}</p>
                            </div>
                        </td>
                        <td>
                            <div>
                                <p class="bold">Réduction du risque</p>
                                <p>
                                    Réduction du risque BRUT grâce aux mesures de prévention existantes : met en évidence les
                                    efforts de prévention de la structure.
                                </p>
                                <p class="text-color-green number">{{ $single_document->discountRisk() }} %</p>
                            </div>
                        </td>
                        <td>
                            <div>
                                <p class="bold">Risque résiduel moyen</p>
                                <p>
                                    Permet de situer le niveau de risque actuel de la structure, en prenant en compte les
                                    mesures de prévention existantes ;
                                    sur une échelle de zéro (risque nul) à 50 (risque maximal).
                                </p>
                                <p class="{{ $single_document->color($single_document->moyenneRR(),false) }} number">{{ $single_document->moyenneRR() }}</p>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="footer">
                <p> Copyright © OZA DUERP Online</p>
                <p class="page-num">TABLEAU DE BORD DE L’EVALUATION DES RISQUES </p>
            </div>
        </section>
        <section class="page">
            <div class="header">
                <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
                    , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
            </div>
            <div class="body">
                <h1 class="head-title" id="tabBord">1. TABLEAU DE BORD DE L'ÉVALUATION DES RISQUES</h1>
                <p class="center bold">Risque résiduel</p>
                <img src="{{ $chartUrl }}" alt="" class="chart-risk center">
            </div>
            <div class="footer">
                <p> Copyright © OZA DUERP Online</p>
                <p class="page-num">TABLEAU DE BORD DE L’EVALUATION DES RISQUES </p>
            </div>
        </section>
    </body>
</html>
