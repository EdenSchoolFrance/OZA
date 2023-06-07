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
                <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}
                    , {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
            </div>

            <div class="body body--rules">
                <h1 class="head-title" id="evalRiskChemical">8. ÉVALUATION DU RISQUE CHIMIQUE</h1>

                <p>
                    <span class="bold">1ère étape : </span> Le Niveau de Danger "ND" de chaque agent chimique utilisé ou généré par l'activité est défini en fonction des phrases de danger de l'agent chimique sur la base de sa FDS ou de sa Fiche Toxicologique INRS.
                </p>

                <p>
                    <span class="bold">2e étape : </span> L'indice de Risque "IR" de chaque agent chimique est défini en fonction des caractéristiques de l’exposition ; ventilation, concentration, durée d’utilisation, protection individuelle utilisée. Cet IR définit le "Risque Résiduel" de chaque agent chimique.
                </p>

                <table class="table table--inv-v2">
                    <tr>
                        <td colspan="3" style="padding-bottom: 20px">La valeur de l'IR obtenue permet de définir les conditions d'utilisation suivantes : </td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-danger btn-hidden">Inacceptable</button><span> de IR 2 à IR 5</span></td>
                        <td><button class="btn btn-warning btn-hidden">A améliorer</button><span> de IR 1 à IR 0</span></td>
                        <td><button class="btn btn-success btn-hidden">Acceptable</button><span> de IR -1 à IR -5</span></td>
                    </tr>
                </table>

            </div>

            <div class="footer">
                <p> Copyright © OZA DUERP Online</p>
                <p class="page-num">ÉVALUATION DU RISQUE CHIMIQUE</p>
            </div>
        </section>


        <section class="page">
            <div class="header">
                <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}
                    , {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
            </div>

            <div class="body body--notif">
                <h1 class="head-title">8. ÉVALUATION DU RISQUE CHIMIQUE</h1>

                <table class="table table--chemical-data">
                    <thead>
                    <tr>
                        <th colspan="20" class="green text-color-white">ÉVALUATION DU RISQUE CHIMIQUE</th>
                    </tr>
                    <tr>
                        <th class="th_work_unit center theader" rowspan="2" style="width: 7%">Unité de Travail</th>
                        <th class="th_cat center theader" colspan="2">Produit concerné</th>
                        <th class="th_cat center theader" colspan="11">Catégories et phrases de danger</th>
                        <th class="th_cat center theader" colspan="4">Caractéristiques de l'exposition</th>
                        <th class="th_IR theader" rowspan="2">IR</th>
                        <th class="th_RR theader" rowspan="2" style="width: 7%">Risque résiduel</th>
                    </tr>
                    <tr>
                        <th class="th_name theader" style="width: 7%">Nom commercial ou dénomination</th>
                        <th class="th_activity theader">Utilisation Activité</th>
                        <th class="th_p1 cat_danger theader">p1</th>
                        <th class="th_p2 cat_danger theader">p2</th>
                        <th class="th_p3 cat_danger theader">p3</th>
                        <th class="th_p4 cat_danger theader">p4</th>
                        <th class="th_p5 cat_danger theader">p5</th>
                        <th class="th_p6 cat_danger theader">p6</th>
                        <th class="th_p7 cat_danger theader">p7</th>
                        <th class="th_p8 cat_danger theader">p8</th>
                        <th class="th_p9 cat_danger theader">p9</th>
                        <th class="th_p10 cat_danger theader">p10</th>
                        <th class="th_ND cat_danger theader">ND</th>
                        <th class="th_ventilation theader" style="width: 7%">Ventilation Confinement</th>
                        <th class="th_concentration theader" style="width: 7%">Concentration</th>
                        <th class="th_time theader">Durée utilisation jour</th>
                        <th class="th_protection theader" style="width: 7%">Protection</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($sd_risks_chemicals) > 0)
                        @foreach($sd_risks_chemicals as $sd_risk)
                            @if($sd_risk->validated)
                                <tr>
                                    <td class="td_work_unit">{{ $sd_risk->sd_work_unit->name }}</td>
                                    <td class="td_name">{{ $sd_risk->name }}</td>
                                    <td class="td_activity">{{ $sd_risk->activity }}</td>
                                    <td class="td_p1 cat_danger">{{$sd_risk->n1}}</td>
                                    <td class="td_p2 cat_danger">{{$sd_risk->n2}}</td>
                                    <td class="td_p3 cat_danger">{{$sd_risk->n3}}</td>
                                    <td class="td_p4 cat_danger">{{$sd_risk->n4}}</td>
                                    <td class="td_p5 cat_danger">{{$sd_risk->n5}}</td>
                                    <td class="td_p6 cat_danger">{{$sd_risk->n6}}</td>
                                    <td class="td_p7 cat_danger">{{$sd_risk->n7}}</td>
                                    <td class="td_p8 cat_danger">{{$sd_risk->n8}}</td>
                                    <td class="td_p9 cat_danger">{{$sd_risk->n9}}</td>
                                    <td class="td_p10 cat_danger">{{$sd_risk->n10}}</td>
                                    <td class="td_ND cat_danger">{{ $sd_risk->ND()['value'] }}</td>
                                    <td class="td_ventilation">{{ $sd_risk->T_ventilation() }}</td>
                                    <td class="td_concentration">{{ $sd_risk->T_concentration() }}</td>
                                    <td class="td_time">{{ $sd_risk->T_time() }}</td>
                                    <td class="td_protection">{{ $sd_risk->T_protection() }}</td>
                                    <td class="td_IR">{{ $sd_risk->IR() }}</td>
                                    <td class="td_RR {{ $sd_risk->criticality_PDF()['class'] }}">{{ $sd_risk->criticality_PDF()['text'] }}</td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td colspan="20">Aucune données</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <p></p>

                <p></p>
            </div>


            <div class="footer">
                <p> Copyright © OZA DUERP Online</p>
                <p class="page-num">ÉVALUATION DU RISQUE CHIMIQUE</p>
            </div>
        </section>


        <section class="page">
            <div class="header">
                <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}
                    , {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
            </div>

            <div class="body body--notif">
                <h1 class="head-title">8. ÉVALUATION DU RISQUE CHIMIQUE</h1>

                <table class="table table--chemical-data">
                    <thead>
                    <tr>
                        <th colspan="8" class="green text-color-white">PLAN D'ACTION DE RÉDUCTION DU RISQUE CHIMIQUE</th>
                    </tr>
                    <tr>
                        <th class="th_work_unit center theader" rowspan="2">Unité de Travail</th>
                        <th class="th_cat center theader" colspan="2">Produit concerné</th>
                        <th class="th_IR theader" rowspan="2">IR</th>
                        <th class="th_RR theader" rowspan="2">Risque résiduel</th>
                        <th class="th_restraint theader" rowspan="2" style="width: 35%">Mesure de prévention et de protection proposées</th>
                        <th class="th_date center theader" rowspan="2" >Date de réalisation</th>
                        <th class="th_actions center theader" rowspan="2">Commentaire, complément, autres actions</th>

                    </tr>
                    <tr>
                        <th class="th_name theader">Nom commercial ou dénomination</th>
                        <th class="th_activity theader">Utilisation Activité</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($sd_risks_chemicals) > 0)
                        @foreach($sd_risks_chemicals as $sd_risk)
                            @if($sd_risk->validated)
                                @if(isset($sd_risk->sd_restraints_exist[0]))
                                    @foreach($sd_risk->sd_restraints_exist as $sd_restraint)
                                        <tr>
                                            <td class="td_work_unit">{{ $sd_risk->sd_work_unit->name }}</td>
                                            <td class="td_name" style="width: 15% ">{{ $sd_risk->name }}</td>
                                            <td class="td_activity" style="width: 15%">{{ $sd_risk->activity }}</td>
                                            <td class="td_IR" style="width: 4%">{{ $sd_risk->IR() }}</td>
                                            <td class="td_RR {{ $sd_risk->criticality_PDF()['class'] }}">{{ $sd_risk->criticality_PDF()['text'] }}</td>
                                            <td class="td_restraint" style="text-align: left">{{ $sd_restraint->name }}</td>
                                            <td class="td_date">{{ $sd_restraint->date ? date("d/m/Y", strtotime($sd_restraint->date)) : "" }}</td>
                                            <td class="td_comment">{{ $sd_restraint->comment }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">Aucune données</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <p></p>

                <p></p>
            </div>


            <div class="footer">
                <p> Copyright © OZA DUERP Online</p>
                <p class="page-num">ÉVALUATION DU RISQUE CHIMIQUE</p>
            </div>
        </section>

    </body>
</html>
