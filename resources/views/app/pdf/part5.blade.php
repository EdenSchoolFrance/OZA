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

            <div class="body">
                <p class="center legend info"> F = Fréquence | P = Probabilité | GP = Gravité potentiel | ID = Impact
                    différencié | RB = Risque brut{{--| T = Technique | O = Oragnisationnelle | H = Humain--}} | RR = Risque
                    résiduel</p>
                <table class="table table--action">
                    <thead>
                    <tr>
                        <th colspan="12" class="green">5. EVALUATION DES RISQUES PROFESSIONNELS</th>
                    </tr>
                    <tr>
                        <td class="theader">
                            Unité de Travail
                        </td>
                        <td class="theader">
                            DANGER et dommages potentiels à la personne
                        </td>
                        <td class="theader">
                            RISQUE Phase de travail modes et caractéristiques de l'exposition
                        </td>
                        <td class="theader min-width">
                            F
                        </td>
                        <td class="theader min-width" style="width: 6%;">
                            P
                        </td>
                        <td class="theader min-width">
                            GP
                        </td>
                        <td class="theader" style="width: 6%;">
                            ID
                        </td>
                        <td class="theader min-width">
                            RB
                        </td>
                        <td class="theader max-width">
                            Mesures de prévention et de protection existantes : Technique, Organisationnelle, Protection,
                            Humaine (information)
                        </td>
                        {{--                <td class="theader">--}}
                        {{--                    T--}}
                        {{--                </td>--}}
                        {{--                <td class="theader">--}}
                        {{--                    O--}}
                        {{--                </td>--}}
                        {{--                <td class="theader">--}}
                        {{--                    H--}}
                        {{--                </td>--}}
                        <td class="theader">
                            RR
                        </td>
                        <td class="theader" style="width: 6%">
                            Criticité = situation actuelle
                        </td>
                        <td class="theader max-width">
                            Mesures de prévention et de protection proposées
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sd_risks_final as $final)
                        @if(!empty($final["sd_risks"]))
                            @foreach($final["sd_risks"] as $sd_risk)
                                <tr>
                                    <td class="workunit">{{ $final["sd_work_unit"] === "Tous" ? "Tous" : $final["sd_work_unit"]->name }}</td>
                                    <td class="danger">{{ $final["sd_danger"]->danger->name }}</td>
                                    <td class="risk">{{$sd_risk->name}}</td>
                                    <td class="center min-width min-width-left">{{ $sd_risk->translate($sd_risk->frequency,'frequency') }}</td>
                                    <td class="center min-width min-width-left">{{ $sd_risk->translate($sd_risk->probability,'probability') }}</td>
                                    <td class="center min-width min-width-left">{{ $sd_risk->translate($sd_risk->gravity,'gravity') }}</td>
                                    <td class="center min-width min-width-left">{{ $sd_risk->translate($sd_risk->impact,'impact') }}</td>
                                    <td class="center min-width min-width-left {{ $sd_risk->total() >= 24 ? "pink" : "" }}">{{ $sd_risk->total() }}</td>
                                    <td class="restraint">
                                        @foreach($sd_risk->sd_restraints_exist as $sd_restraint)
                                            * {{$sd_restraint->name}} <br>
                                        @endforeach
                                    </td>
                                    {{--                            <td class="center min-width min-width-right">{{ $sd_risk->translateRR(round($sd_risk->moyenneTech(), 1), "tech") }}</td>--}}
                                    {{--                            <td class="center min-width min-width-right">{{ $sd_risk->translateRR(round($sd_risk->moyenneOrga(), 1), "orga") }}</td>--}}
                                    {{--                            <td class="center min-width min-width-right">{{ $sd_risk->translateRR(round($sd_risk->moyenneHum(), 1), "hum") }}</td>--}}
                                    <td class="center min-width min-width-right"> {{ isset($sd_risk->sd_restraints_exist[0]) ? $sd_risk->totalRR($sd_risk->sd_restraints_exist) : $sd_risk->total() }}</td>
                                    <td class="center criticity {{ isset($sd_risk->sd_restraints_exist[0]) ? $sd_risk->colorPDF($sd_risk->totalRR($sd_risk->sd_restraints_exist),false) :  $sd_risk->colorPDF($sd_risk->total(),true) }}">{{ isset($sd_risk->sd_restraints_exist[0]) ? $sd_risk->colorTotal($sd_risk->totalRR($sd_risk->sd_restraints_exist),false) : $sd_risk->colorTotal($sd_risk->total(),true) }}</td>
                                    <td class="restraint_proposed">
                                        @foreach($sd_risk->sd_restraints_porposed as $sd_restraint)
                                            * {{$sd_restraint->name}} <br>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="workunit">{{ $final["sd_work_unit"] === "Tous" ? "Tous" : $final["sd_work_unit"]->name }}</td>
                                <td class="danger">{{ $final["sd_danger"]->danger->name }}</td>
                                <td class="risk">Non concerné actuellement</td>
                                <td class="center min-width min-width-left">NC</td>
                                <td class="center min-width min-width-left">NC</td>
                                <td class="center min-width min-width-left">NC</td>
                                <td class="center min-width min-width-left">NON</td>
                                <td class="center min-width min-width-left">0</td>
                                <td class="restraint"></td>
                                {{--                        <td class="center min-width min-width-right">0</td>--}}
                                {{--                        <td class="center min-width min-width-right">0</td>--}}
                                {{--                        <td class="center min-width min-width-right">0</td>--}}
                                <td class="center min-width min-width-right">0</td>
                                <td class="center green criticity">0</td>
                                <td class="restraint_proposed"></td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                <p></p>
            </div>

            <div class="footer">
                <p>Copyright © OZA DUERP Online</p>
                <p class="page-num">EVALUATION DES RISQUES PROFESSIONNELS</p>
            </div>
        </section>

        <section class="page">
            <div class="header">
                <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
                    , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
            </div>

            <div class="body body--notif">
                <h1 class="head-title" id="listPost">6. LISTE DES POSTES DE TRAVAIL "A RISQUE PARTICULIER" (CODE DU TRAVAIL ART.
                    I.4154-2)</h1>
                <p class="text-color-red info">
                    <span class="bold">Rappel :</span> Tous les salariés embauchés pour travailler à l’un de ces postes, en
                    contrat de travail précaire (autre que CDI), doivent bénéficier d’une formation renforcée à la sécurité,
                    ainsi que d’un accueil et d’une formation adaptés dans l’entreprise.
                    Obtenir l’avis du médecin du travail, du CSE ou, à défaut, des représentants du personnel, s’il en
                    existe.<br>
                    Liste tenue à la disposition des agents de contrôle de l’inspection du travail (amende de 10 000 €uros en
                    cas de non présentation : art. L.4741-1).
                </p>
                <table class="table table--risk-post">
                    <thead>
                    <tr>
                        <td class="theader grey">
                            Unité de Travail = poste de travail
                        </td>
                        <td class="theader green">
                            Danger et dommages potentiels à la personne
                        </td>
                        <td class="theader green">
                            Phase de travail
                            modes et caractéristiques de l'exposition
                            (outil, matériel, produit, situation, opération, fréquence, durée)
                        </td>
                        <td class="theader green">
                            Fréquence
                        </td>
                        <td class="theader green">
                            Probabilité
                        </td>
                        <td class="theader green">
                            Gravité
                            potentielle
                        </td>
                        <td class="theader grey">
                            Risque brut
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sd_risks_posts as $sd_risk)
                        <tr>
                            <td class="grey">{{ $sd_risk->sd_work_unit ? $sd_risk->sd_work_unit->name : "Tous" }}</td>
                            <td>{{ $sd_risk->sd_danger->danger->name }}</td>
                            <td>{{$sd_risk->name}}</td>
                            <td class="center">{{ $sd_risk->translate($sd_risk->frequency,'frequency') }}</td>
                            <td class="center">{{ $sd_risk->translate($sd_risk->probability,'probability') }}</td>
                            <td class="center">{{ $sd_risk->translate($sd_risk->gravity,'gravity') }}</td>
                            <td class="grey center">{{ $sd_risk->total() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <p></p>
            </div>

            <div class="footer">
                <p> Copyright © OZA DUERP Online</p>
                <p class="page-num">LISTE DES POSTES DE TRAVAIL</p>
            </div>
        </section>
    </body>
</html>
