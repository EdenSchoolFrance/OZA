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
                <h1 class="head-title" id="proAnnuel">2. PROGRAMME ANNUEL DE PREVENTION ET D'AMELIORATION DES CONDITIONS DE
                    TRAVAIL</h1>
                <p class="bold">Le PROGRAMME ANNUEL DE PREVENTION ET D'AMELIORATION DES CONDITIONS DE TRAVAIL reprend et
                    présente tous les risques identifiés et évalués dans le chapitre 5 "Evaluation des risques" classés ici
                    selon leur criticité (priorité) dans la colonne "Criticité".</p>
                <p class="bold">Le PROGRAMME ANNUEL DE PREVENTION ET D'AMELIORATION DES CONDITIONS DE TRAVAIL reprend et
                    présente également toutes les situations de "non-conformité réglementaire" dans la colonne "Mesures de
                    prévention et de protection à mettre en place", sous le libellé "Obligation réglementaire".</p>
                <p>
                    <span class="bold">Colonne "Mesures de prévention et de protection à mettre en place" :</span><br>
                    Les mesures de prévention et de protection proposées se déclinent en 3 catégories énoncées dans les 9
                    principes de prévention de l'article L.4121-2 du Code du Travail (Loi n° 91-1414 du 31 décembre 1991 art. 1
                    Journal Officiel du 7 janvier 1992 en vigueur le 31 décembre 1992) :<br>
                    - Mesure Technique, <br>
                    - Mesure Organisationnelle, <br>
                    - Mesure Humaine (Information et formation, protection collective et individuelle).
                </p>
                <p>
                    <span class="">L'employeur décidera quelle(s) mesure(s) proposée(s) il mettra en place.</span><br>
                </p>
                <p>
                    <span class="bold">Colonne "Date de réalisation prévue, Conditions d’exécution, Estimation du coût, Ressources nécessaires" :</span><br>
                    Inscrire ici la date planifiée par l'employeur pour la réalisation des actions de prévention ou de
                    protection qu'il a validé,<br>
                    Inscrire ici la date de réalisation prévue, les conditions d’exécution, l'estimation du coût, et les
                    ressources nécessaires pour la mise en œuvre des actions validées qui seront mises en place.<br>
                    Préciser également les actions que l'employeur ne valide pas et qui ne seront pas mises en place. <br>
                </p>
                <p>
                    <span class="bold">Colonne « Date de réalisation » :</span>
                    Inscrire la date à laquelle l'action de prévention ou de protection a réellement été mise en place et a été
                    opérationnelle.<br>
                </p>
            </div>

            <div class="footer">
                <p> Copyright © OZA DUERP Online</p>
                <p class="page-num">PROGRAMME ANNUEL DE PREVENTION ET D'AMELIORATION DES CONDITIONS DE TRAVAIL</p>
            </div>
        </section>

        <section class="page">
            <div class="header">
                <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
                    , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
            </div>

            <div class="body">
                <table class="table table--action">
                    <thead>
                    <tr>
                        <th colspan="8" class="green">2. PROGRAMME ANNUEL DE PREVENTION ET D'AMELIORATION DES CONDITIONS DE
                            TRAVAIL
                        </th>
                    </tr>
                    <tr>
                        <td class="theader">
                            Unité de Travail
                        </td>
                        <td class="theader">
                            DANGER <br> et dommages potentiels à la personne
                        </td>
                        <td class="theader">
                            RISQUE <br> Phase de travail modes et caractéristiques de l'exposition
                        </td>
                        <td class="theader" style="width: 5%">
                            Risque résiduel
                        </td>
                        <td class="theader" style="width: 10%">
                            Criticité = situation actuelle
                        </td>
                        <td class="theader">
                            Mesures de prévention et de protection proposées
                        </td>
                        <td class="theader">
                            Date de réalisation prévue <br> Conditions d’exécution <br> Estimation du coût <br> Ressources
                            nécessaires
                        </td>
                        <td class="theader">
                            Date de réalisation
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sd_risks as $sd_risk)
                        @if (count($sd_risk->sd_restraints_porposed) >= 1)
                            <tr>
                                <td class="workunit">{{ $sd_risk->sd_work_unit ? $sd_risk->sd_work_unit->name : "Tous" }}</td>
                                <td class="danger">{{ $sd_risk->sd_danger->danger->name }}</td>
                                <td class="risk">@stripTags($sd_risk->name)</td>
                                <td class="risk_residuel center">{{ isset($sd_risk->sd_restraints_exist[0]) ? $sd_risk->totalRR($sd_risk->sd_restraints_exist) : $sd_risk->total() }}</td>
                                <td class="criticity center {{ isset($sd_risk->sd_restraints_exist[0]) ? $sd_risk->colorPDF($sd_risk->totalRR($sd_risk->sd_restraints_exist),false) :  $sd_risk->colorPDF($sd_risk->total(),true) }}">{{ $sd_risk->colorTotal(isset($sd_risk->sd_restraints_exist[0]) ? $sd_risk->totalRR($sd_risk->sd_restraints_exist) : $sd_risk->total(),false) }}</td>
                                <td class="restraint">
                                    @foreach($sd_risk->sd_restraints_porposed as $sd_restraint)
                                        * @stripTags($sd_restraint->name)<br>
                                    @endforeach
                                </td>
                                <td class="comment"></td>
                                <td class="date"></td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="footer">
                <p> Copyright © OZA DUERP Online</p>
                <p class="page-num">PROGRAMME ANNUEL DE PREVENTION ET D'AMELIORATION DES CONDITIONS DE TRAVAIL</p>
            </div>
        </section>
    </body>
</html>
