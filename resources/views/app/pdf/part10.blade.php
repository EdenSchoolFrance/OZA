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
                <h1 class="head-title" id="expoRiskPro">10. EVALUATION DE L'EXPOSITION AUX "FACTEURS DE RISQUES
                    PROFESSIONNELS"</h1>
                <p>
                    Cette annexe du Document Unique consigne réglementairement (Article R.4121-1-1) : <br><br>
                    1° Les données de l’évaluation de l’exposition aux facteurs de risques professionnels de nature à faciliter
                    la déclaration annuelle des salariés exposés au delà des seuils réglementaires ; <br> <br>
                    2° La proportion de salariés exposés aux facteurs de risques professionnels, au-delà des seuils
                    réglementaires. <br>
                </p>
                <table class="table table--frp">
                    <thead>
                    <tr>
                        <td class="theader yellow" colspan="3">
                            Déclaration des expositions de l’année écoulée du 1er janvier au 31 décembre.
                        </td>
                    </tr>
                    <tr>
                        <td class="theader">
                            Effectif salarié total
                        </td>
                        <td class="theader">
                            Effectif exposé au-delà des seuils réglementaires
                        </td>
                        <td class="theader">
                            Proportion de salariés exposés aux facteurs de risques professionnels au-delà des seuils prévus
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @if($numberEmUt !== 0)
                        <tr>
                            <td class="center">
                                {{ $numberEmUt }}
                            </td>
                            <td class="{{ $numberEmExpo === 0 ? "green" : "red" }} center">
                                {{ $numberEmExpo }}
                            </td>
                            <td class="{{$numberEmExpo/$numberEmUt === 0 ? "green" : "red" }} center">
                                {{ 100 * ($numberEmExpo/$numberEmUt) >= 100 ? "100%" : round(100 * ($numberEmExpo/$numberEmUt),2)."%"}}
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td class="center">
                                0
                            </td>
                            <td class="green center">
                                0
                            </td>
                            <td class="green center">
                                0%
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                <table class="table table--frp">
                    <thead>
                    <tr>
                        <td class="theader yellow">
                            Facteurs de risques professionnels
                        </td>
                        <td class="theader yellow">
                            Unité exposée au-delà des seuils
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($expos as $expo)
                        <tr>
                            <td>
                                {{ $expo->danger->name }}
                            </td>
                            <td class="center">
                                {{ count($expo->pivot($single_document->id)) === 0 ? "Non" : "Oui"  }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <p></p>
            </div>

            <div class="footer">
                <p> Copyright © OZA DUERP Online</p>
                <p class="page-num">EVALUATION DE L'EXPOSITION</p>
            </div>
        </section>

        <section class="page">
            <div class="header">
                <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
                    , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
            </div>

            <div class="body body--notif">
                <h1 class="head-title" id="expoRiskPro">10. EVALUATION DE L'EXPOSITION AUX "FACTEURS DE RISQUES
                    PROFESSIONNELS"</h1>
                <p class="text-color-red">
                    A noter : La durée annuelle d’exposition considérée est de 220 jours.
                    Seules les unités de travail concernées par une exposition sont présentées. Ce qui implique que les unités
                    non présentes dans le tableau ne sont pas concernées.
                </p>
                <table class="table table--risk-post">
                    <thead>
                    <tr>
                        <td class="theader yellow" colspan="8">
                            ANNEXE D’EVALUATION DE L’EXPOSITION AUX FACTEURS DE RISQUES PROFESSIONNELS
                        </td>
                    </tr>
                    <tr>
                        <td class="theader">
                            Danger
                        </td>
                        <td class="theader">
                            Unité de Travail
                        </td>
                        <td class="theader">
                            Action ou situation
                        </td>
                        <td class="theader">
                            Exposition appréciée après application des mesures de protection collective et individuelle
                        </td>
                        <td class="theader">
                            Nombre de personnes concernées
                        </td>
                        <td class="theader">
                            Détail de l’exposition
                        </td>
                        <td class="theader">
                            Total
                        </td>
                        <td class="theader">
                            Situation
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($single_document->dangers()->whereHas('danger.exposition')->get() as $danger)
                        @php
                            $pivot = $danger->danger->exposition->pivot($single_document->id);
                        @endphp
                        @if (count($pivot) > 0)
                            @foreach($danger->sd_works_units()->whereHas('sd_expositions_questions')->get() as $sd_work_unit)
                                @foreach ($danger->danger->exposition->exposition_groups as $key => $exposition_group)
                                    @foreach ($exposition_group->exposition_questions as $key => $exposition_question)
                                        @php
                                            $sd_expo_question = $exposition_question->sd_work_unit_exposition_question($sd_work_unit->id);
                                            $sd_expos_questions = $exposition_question->sd_work_unit_expositions_questions($sd_work_unit->id);
                                        @endphp
                                        @if (count($sd_expos_questions))
                                            <tr>
                                                <td class="center">{{ $danger->danger->name }}</td>
                                                <td class="center">{{ $sd_work_unit->name }}</td>
                                                <td>{{ $exposition_group->intervention_type_label }}</td>
                                                <td>{{ $sd_expo_question->intervention_type }}</td>
                                                <td class="center">{{ $sd_expo_question->number_employee }}</td>
                                                <td>
                                                    @if ($exposition_group->type === "default")
                                                        {{ $exposition_group->value_label." : "}} <span class="text-color-{{$exposition_group->calculation($sd_expo_question->value)}}">{{ $sd_expo_question->value }}</span>
                                                    @else
                                                        Durée en mm / j <span class="text-color-{{$exposition_group->calculation($sd_expo_question->minutes)}}">{{$sd_expo_question->minutes}} </span>
                                                        <br>
                                                        Durée en h / an <span class="text-color-{{$exposition_group->calculation($sd_expo_question->value)}}">{{$sd_expo_question->value}}</span>
                                                    @endif
                                                </td>
                                                @if ($exposition_group->type === "default")
                                                    <td class="center"></td>
                                                @else
                                                    <td class="center">Total h / an : <span class="text-color-{{$exposition_group->calculation($sd_expo_question->value)}}">{{$sd_expo_question->value}}</span></td>
                                                @endif
                                                <td class="center {{$exposition_group->calculation($sd_expo_question->value)}}"> {{$exposition_group->translate($sd_expo_question->value)}} </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endif
                    @endforeach
                    </tbody>
                </table>
                <p class="text-color-red">
                    Lorsque la situation est critique (Exposé), veuillez vous assurer que les mesures proposées lors de
                    l’évaluation des risques de l’UT vous permettent d’agir sur ce facteur.
                </p>
            </div>

            <div class="footer">
                <p> Copyright © OZA DUERP Online</p>
                <p class="page-num">EVALUATION DE L'EXPOSITION</p>
            </div>
        </section>
    </body>
</html>
