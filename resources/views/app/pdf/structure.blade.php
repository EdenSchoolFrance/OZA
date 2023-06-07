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
        <section class="page page--first">
            <div class="header">
                <img src="{{ public_path('img/logo.png') }}">
            </div>

            <div class="body">
                <div class="header">
                    <p class="subtitle">Document Unique</p>
                    <h1 class="title">{{ $single_document->name_enterprise }}</h1>
                    <p class="info">Code de Travail article L.4121-3</p>
                    <p class="info">Transcription des résultats de l'évaluation des risques pour la santé et la sécurité du
                        personnel</p>
                </div>

                <img src="{{ public_path('storage/' . $single_document->client->id . '/' . $single_document->client->image) }}"
                     alt="">

                <div class="info-single_document">
                    <p> @if(count($single_document->histories) === 1)
                            Document Unique élaboré le
                        @else
                            Mise à jour du DUERP le
                        @endif: <span class="bold">{{ $date }}</span></p>
                    <p>Version : <span class="bold">{{ count($single_document->histories) }}</span></p>
                </div>
            </div>

            <div class="footer">
                <p class="center"> Copyright © OZA DUERP Online</p>
                <p class="page-num"></p>
            </div>
        </section>

        <section class="page page--second">
            <div class="header">
                <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
                    , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
            </div>

            <div class="body">
                <div class="header">
                    <h1 class="title">Document Unique</h1>
                    <p class="info">Article L4121-3-1 du Code du travail</p>
                    <p class="info">Le document unique d'évaluation des risques professionnels est transmis par l'employeur à
                        chaque mise à jour au service de prévention et de santé au travail auquel il adhère.</p>
                </div>
                <ul>
                    <li class="bold"><p>Article R4121-4 du Code du Travail <br>Ce document unique d'évaluation des risques
                            professionnels et ses versions antérieures sont tenus, pendant une durée de 40 ans à compter de leur
                            élaboration, à la disposition de :</p></li>
                    <li>
                        <p>
                            1° Des travailleurs et des anciens travailleurs pour les versions en vigueur durant leur période
                            d'activité dans l'entreprise.
                            La communication des versions du document unique antérieures à celle en vigueur à la date de la
                            demande peut être limitée aux seuls éléments afférents à l'activité du demandeur.
                            Les travailleurs et anciens travailleurs peuvent communiquer les éléments mis à leur disposition aux
                            professionnels de santé en charge de leur suivi médical ;
                        </p>
                    </li>
                    <li><p>2° Des membres de la délégation du personnel du comité social et économique ;</p></li>
                    <li><p>3° Du service de prévention et de santé au travail ;</p></li>
                    <li><p>4° Des agents du système d'inspection du travail ;</p></li>
                    <li><p>5° Des agents des services de prévention des organismes de sécurité sociale ;</p></li>
                    <li><p>6° Des agents des organismes professionnels de santé, de sécurité et des conditions de travail des
                            branches d'activités présentant des risques particuliers ;</p></li>
                    <li><p>7° Des inspecteurs de la radioprotection et de la santé publique, en ce qui concerne les résultats
                            des évaluations liées à l'exposition des travailleurs aux rayonnements ionisants, pour les
                            installations et activités dont ils ont respectivement la charge.</p></li>
                    <li>
                        <p>
                            Jusqu'à l'entrée en vigueur de l'obligation de dépôt du document unique d'évaluation des risques
                            professionnels sur un portail numérique, l'employeur conserve les versions successives du document
                            unique au sein de l'entreprise sous la forme d'un document papier ou dématérialisé.
                        </p>
                    </li>
                    <li>
                        <p>
                            Un avis indiquant les modalités d'accès des travailleurs au document unique est affiché à une place
                            convenable et aisément accessible dans les lieux de travail. Dans les entreprises ou établissements
                            dotés d'un règlement intérieur, cet avis est affiché au même emplacement que celui réservé au
                            règlement intérieur.
                        </p>
                    </li>
                </ul>
            </div>

            <div class="footer">
                <p class="center"> Copyright © OZA DUERP Online</p>
                <p class="page-num"></p>
            </div>
        </section>

        <section class="page">
            <div class="header">
                <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
                    , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
            </div>

            <div class="body">
                <h1 class="head-title">SOMMAIRE</h1>
                <ul class="list-item">
                    <li>
                        <p><span class="line"><a href="#actu" class="link">ACTUALISATION DU DOCUMENT UNIQUE</a></span></p>
                    </li>
                    <li>
                        <p><span class="line"><a href="#structure" class="link">PRÉSENTATION DÉTAILLÉE DE LA STRUCTURE ET DES UNITÉS DE TAVAIL</a></span>
                        </p>
                    </li>
                    <li>
                        <span class="number">1</span>
                        <p><span class="line"><a href="#tabBord" class="link">TABLEAU DE BORD DE L’EVALUATION DES RISQUES</a></span></p>
                    </li>
                    <li>
                        <span class="number">2</span>
                        <p><span class="line"><a href="#proAnnuel" class="link">PROGRAMME ANNUEL DE PREVENTION ET D'AMELIORATION DES CONDITIONS DE TRAVAIL</a></span>
                        </p>
                    </li>
                    <li>
                        <span class="number">3</span>
                        <p><span class="line"><a href="#rules" class="link">RAPPEL REGLEMENTAIRE DOCUMENT UNIQUE</a></span></p>
                    </li>
                    <li>
                        <span class="number">4</span>
                        <p><span class="line"><a href="#evalRisk" class="link">NOTICE DE L’EVALUATION DES RISQUES</a></span></p>
                    </li>
                    <li>
                        <span class="number">5</span>
                        <p><span class="line"><a href="#evalRiskPro"
                                                 class="link">EVALUATION DES RISQUES PROFESSIONNELS PAR <span class="bold">UNITÉ DE TRAVAIL</span>, classement alphabétique</a></span>
                        </p>
                    </li>
                    <li>
                        <span class="number">6</span>
                        <p><span class="line"><a href="#listPost"
                                                 class="link">LISTE DES POSTES DE TRAVAIL A RISQUE PARTICULIER</a></span></p>
                    </li>
                    <li>
                        <span class="number">7</span>
                        <p><span class="line"><a href="#evalRiskPsycho" class="link">EVALUATION DETAILLEE DU RISQUE PSYCHOSOCIAL ET <span>PLAN D’ACTION</span> @if($single_document->risk_psycho === 0) (partie non présente dans ce DUERP) @endif</a></span>
                        </p>
                    </li>
                    <li>
                        <span class="number">8</span>
                        <p><span class="line"><a href="#evalRiskChemical" class="link">EVALUATION DETAILLEE DU RISQUE CHIMIQUE ET <span>PLAN D’ACTION</span> @if($single_document->risk_chemical === 0) (partie non présente dans ce DUERP) @endif</a></span>
                        </p>
                    </li>
                    <li>
                        <span class="number">9</span>
                        <p><span class="line"><a href="#evalRiskExplosion" class="link">DOCUMENT RELATIF A LA PREVENTION CONTRE L’EXPLOSION ET <span>PLAN D’ACTION</span> @if($single_document->risk_explosion === 0) (partie non présente dans ce DUERP) @endif</a></span>
                        </p>
                    </li>
                    <li>
                        <span class="number">10</span>
                        <p><span class="line"><a href="#expoRiskPro" class="link">EXPOSITION AUX FACTEURS DE RISQUES PROFESSIONNELS ET <span>PLAN D’ACTION</span></a></span>
                        </p>
                    </li>
                    <li>
                        <span class="number">11</span>
                        <p><span class="line"><a href="#historie" class="link">HISTORIQUE DES ACTIONS REALISÉES</a></span></p>
                    </li>
                    <li class="no-border">
                        <p><span class="line">Les annexes peuvent être consultées et imprimées depuis votre application DU OZA Online</span>
                        </p>
                    </li>
                </ul>
            </div>

            <div class="footer">
                <p class="center"> Copyright © OZA DUERP Online</p>
                <p class="page-num"></p>
            </div>
        </section>


        <section class="page">
            <div class="header">
                <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
                    , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
            </div>

            <div class="body">
                <h1 class="head-title" id="actu">ACTUALISATION DU DOCUMENT UNIQUE</h1>
                <table class="table table--document_versions">
                    <thead>
                    <tr>
                        <th colspan="5" class="green">VERSIONS DU DOCUMENT UNIQUE</th>
                    </tr>
                    <tr>
                        <td colspan="3" class="theader">Intervenants</td>
                        <td rowspan="2" class="theader"> Travail réalisé sur le DU <br><span class="description">(Mise à jour annuelle, mise à jour des actions, mise à jour des évaluations, ajout ou retrait de risques ou de préventions, …)</span>
                        </td>
                        <td rowspan="2" class="theader">Date de dernière mise à jour</td>
                    </tr>
                    <tr>
                        <td class="theader">Prénom NOM</td>
                        <td class="theader">Fonction</td>
                        <td class="theader">Visa</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($single_document->histories as $historie)
                        <tr>
                            <td class="name center">{{ $single_document->firstname }} {{ $single_document->lastname }}</td>
                            <td class="function center">{{ $single_document->function }}</td>
                            <td class="visa center"></td>
                            <td class="work">{{ $historie->work }}</td>
                            <td class="date center">{{ date("d/m/Y", strtotime($historie->date)) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="footer">
                <p> Copyright © OZA DUERP Online</p>
                <p class="page-num">ACTUALISATION DU DOCUMENT UNIQUE</p>
            </div>
        </section>

        <section class="page">
            <div class="header">
                <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
                    , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
            </div>

            <div class="body">
                <h1 class="head-title" id="structure">PRÉSENTATION DE LA STRUCTURE</h1>
                <table class="table table--info-gen">
                    <thead>
                    <tr>
                        <th colspan="2" class="yellow">INFORMATIONS GÉNÉRALES</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="2">
                            Ce Document Unique et ses différentes versions a été rédigé sous la responsabilité de l’employeur
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="bold">Pour : </span><br>
                            {{ $single_document->name_enterprise }}
                        </td>
                        <td>
                            <span class="bold">Téléphone : </span><br>
                            {{ $single_document->phone }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="bold">Adresse postale : </span><br>
                            {{ $single_document->adress }}, {{ $single_document->city_zipcode }} {{ $single_document->city }}
                        </td>
                        <td>
                            <span class="bold">Email : </span><br>
                            {{ $single_document->email }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <span class="bold">Nombre de salarié(s) inscrit(s) sur le registre du personnel au moment de la rédaction du Document Unique : </span><br>
                            {{ $single_document->work_unit->pluck('number_employee')->sum() }} salarié(s) <br>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <p class="text-color-red"><span class="bold">À noter :</span> le genre masculin, utilisé dans la rédaction de ce
                    document, l’a été uniquement dans le but d’alléger sa rédaction et sa lecture.</p>
            </div>

            <div class="footer">
                <p> Copyright © OZA DUERP Online</p>
                <p class="page-num">PRÉSENTATION DÉTAILLÉE DE LA STRUCTURE ET DES UNITÉS DE TAVAIL</p>
            </div>
        </section>

        <section class="page">
            <div class="header">
                <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
                    , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
            </div>

            <div class="body">
                <table class="table table--activity">
                    <thead>
                    <tr>
                        <th class="yellow">ACTIVITÉS ET LOCAUX</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            Activité détaillée de la structure : <br>
                            {{ $single_document->activity_description }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Locaux de la structure :<br>
                            {{ $single_document->premise_description }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <p></p>
                <p class="info text-color-red" style="position: absolute; bottom: 10px">
                    <span class="bold">Rappel :</span> Pour chaque unité de travail, l’évaluation des risques porte sur
                    les activités principales.<br>
                    Lorsqu’une personne affectée à une unité de travail met en œuvre de la polyvalence sur d’autres
                    unités de travail, l’exposition globale de la personne considérée doit être appréciée en fonction du
                    temps travaillé dans chaque unité de travail en moyenne sur l’année.
                </p>
            </div>

            <div class="footer">

                <p> Copyright © OZA DUERP Online</p>
                <p class="page-num">PRÉSENTATION DÉTAILLÉE DE LA STRUCTURE ET DES UNITÉS DE TAVAIL</p>
            </div>
        </section>

        @foreach($works_units as $key => $sd_work_unit)
            <section class="page">
                <div class="header">
                    <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
                </div>
                <div class="body">
                    <table class="table table--work_unit">
                        <thead>
                        <tr>
                            <th class="yellow" colspan="1">UNITÉ DE TRAVAIL</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $all_activitie = "";
                            foreach ($sd_work_unit->activities as $ac){
                                $all_activitie = $all_activitie.$ac->text;
                            }

                        @endphp
                        <tr>
                            <td><span class="bold">{{ $sd_work_unit->name }} - {{$sd_work_unit->number_employee}} salarié(s)</span></td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    <span class="bold">Principale(s) activité(s) : </span><br>
                                    @foreach($sd_work_unit->activities as $activitie)
                                        - {{ $activitie->text }} <br>
                                    @endforeach
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    <span class="bold">Machine(s) : </span><br>
                                    @foreach($item_mat->sub_items as $sub_item)
                                        @if(count($sd_work_unit->items->where('sub_item_id', $sub_item->id)) !== 0)
                                            {{ $sub_item->name }}
                                            : {{ $sd_work_unit->items->where('sub_item_id', $sub_item->id)->pluck('name')->implode(', ') }}
                                            ,
                                        @else
                                            {{ $sub_item->name }} : Néant
                                        @endif
                                        <br>
                                    @endforeach
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    <span class="bold">Véhicule(s) : </span><br>
                                    @foreach($item_veh->sub_items as $sub_item)
                                        @if(count($sd_work_unit->items->where('sub_item_id', $sub_item->id)) !== 0)
                                            {{ $sub_item->name }}
                                            : {{ $sd_work_unit->items->where('sub_item_id', $sub_item->id)->pluck('name')->implode(', ') }}
                                            ,
                                        @else
                                            {{ $sub_item->name }} : Néant
                                        @endif
                                        <br>
                                    @endforeach
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    <span class="bold">Engin(s) et appareil(s) de manutention mécanique : </span><br>
                                    @foreach($item_eng->sub_items as $sub_item)
                                        @if(count($sd_work_unit->items->where('sub_item_id', $sub_item->id)) !== 0)
                                            {{ $sub_item->name }}
                                            : {{ $sd_work_unit->items->where('sub_item_id', $sub_item->id)->pluck('name')->implode(', ') }}
                                            ,
                                        @else
                                            {{ $sub_item->name }} : Néant
                                        @endif
                                        <br>
                                    @endforeach
                                </p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="footer">
                    <p> Copyright © OZA DUERP Online</p>
                    <p class="page-num">PRÉSENTATION DÉTAILLÉE DE LA STRUCTURE ET DES UNITÉS DE TAVAIL</p>
                </div>
            </section>
        @endforeach
    </body>
</html>
