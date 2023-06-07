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

            <div class="body body--notif">
                <h1 class="head-title" id="historie">11. HISTORIQUE DES MISES A JOUR ET DES ACTIONS REALISEES</h1>
                <table class="table table--document_versions">
                    <thead>
                    <tr>
                        <th class="green" colspan="8">
                            PLAN D'ACTION
                        </th>
                    </tr>
                    <tr>
                        <td class="theader th_work_unit">Unité de travail</td>
                        <td class="theader th_danger">Danger</td>
                        <td class="theader th_risk">Risque</td>
                        <td class="theader risk_residuel">Risque résiduel</td>
                        <td class="theader criticity">Criticité</td>
                        <td class="theader th_restraint">Mesure(s) réalisée(s)</td>
                        <td class="theader th_date">Date de réalisation</td>
                        <td class="theader comment">Commentaire</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($sd_restraints_archived as $sd_restraint_archived)
                        <tr>
                            <td class="td_work_unit">{{ $sd_restraint_archived->sd_work_unit_name }}</td>
                            <td class="td_danger">{{ $sd_restraint_archived->danger_name }}</td>
                            <td class="td_risk">{{ $sd_restraint_archived->sd_risk_name }}</td>
                            <td class="risk_residuel center">{{ $sd_restraint_archived->rr }}</td>
                            <td class="criticity center {{ $sd_restraint_archived->colorPDF() }}">{{ $sd_restraint_archived->colorTotal() }}</td>
                            <td class="td_restraint">{{ $sd_restraint_archived->name }}</td>
                            <td class="td_date">{{ date("d/m/Y", strtotime($sd_restraint_archived->date)) }}</td>
                            <td class="comment"></td>
                        </tr>
                    @endforeach

                    @if (count($sd_risks_v2) == 0)
                        <tr class="no-data no-data--centered">
                            <td colspan="8" class="center">Aucune mesure archivée</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>

            <div class="footer">
                <p> Copyright © OZA DUERP Online</p>
                <p class="page-num">EVALUATION DE L'EXPOSITION</p>
            </div>
        </section>
    </body>
</html>
