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

<section class="page">
    <div class="header">
        <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
            , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
    </div>

    <div class="body body--notif">
        <h1 class="head-title" id="rules">3. RAPPEL RÉGLEMENTAIRE "DOCUMENT UNIQUE"</h1>
        <p class="bold">L’EVALUATION DES RISQUES, LE DOCUMENT UNIQUE ET SON ANNEXE « FACTEURS DE RISQUES PROFESSIONNELS
            »</p>
        <p>
            <span class="bold">1. Pourquoi évaluer les risques professionnels ?</span><br>
            L’évaluation des risques professionnels est imposée par le Code du Travail à tout employeur, dès lors qu’il
            emploie au moins un salarié. Code du travail, article R4121-1 :<br>
            - « L’employeur transcrit et met à jour dans un document unique les résultats de l’évaluation des risques
            pour la santé et la sécurité des travailleurs à laquelle il procède en application de l’article L.
            4121-3.<br>
            - Cette évaluation comporte un inventaire des risques identifiés dans chaque unité de travail de
            l’entreprise ou de l’établissement, y compris ceux liés aux ambiances thermiques. »
        </p>
        <p>
            Au-delà de cette obligation réglementaire, l’évaluation des risques s’inscrit logiquement dans toute
            démarche de prévention dont elle constitue la première et incontournable étape.<br>
            Le point de départ de l’évaluation des risques réside dans la volonté du législateur de réduire le nombre
            des accidents du travail et des maladies professionnelles.
        </p>
        <p>
            <span class="bold">2. De quoi parle-t-on ?</span><br>
            <span class="bold">2.1. Définitions</span><br>
            Le dictionnaire LAROUSSE définit l’<span class="bold">ACCIDENT</span> comme : « un événement fortuit qui a
            des effets plus ou moins dommageables pour les personnes ou pour les choses ».<br>
            De fait l’accident est la concrétisation d’un <span class="bold">RISQUE.</span><br>
            <span class="bold">- Sans danger, pas de risque,</span><br>
            <span class="bold">- Sans exposition au danger, pas de risque,</span><br>
            <span class="bold">- Sans risque pas d’accident.</span>
        </p>
        <p>
            <span class="bold">EXEMPLE</span><br>
            <span class="bold">L’accident : </span>Un salarié se coupe à l’index avec une tronçonneuse électroportative
            en tronçonnant un fer à béton.<br>
            Dans cet exemple, <br>
            <span class="bold">- Le danger</span> est constitué par la rotation du disque de la tronçonneuse. <br>
            <span class="bold">- Le risque</span> est constitué par la probabilité que le disque en rotation entre en
            contact avec une partie non protégée d’un être humain, en l’occurrence le salarié.<br>
        </p>
    </div>

    <div class="footer">
        <p> Copyright © OZA DUERP Online</p>
        <p class="page-num">RAPPEL RÉGLEMENTAIRE "DOCUMENT UNIQUE"</p>
    </div>
</section>

<section class="page">
    <div class="header">
        <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
            , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
    </div>

    <div class="body body--notif">
        <p>
            On parlera ici de risque de coupure. <br>
            Ce risque de coupure peut être plus ou moins important. Il variera en fonction de ses deux paramètres
            constitutifs :<br>
            <span class="bold">- Le Danger et,</span> <br>
            <span class="bold">- Le Danger</span> <br>
            <span class="bold">Le danger</span> ne variera qu’en fonction de peu de paramètres, notamment la vitesse de
            rotation et l’état du disque.<br>
            <span class="bold">L’exposition</span> variera en fonction de paramètres plus nombreux, notamment la
            protection du disque, la protection des doigts de la main, la
            connaissance du danger par l’utilisateur, la bonne utilisation de la tronçonneuse, la vitesse d’exécution du
            geste, la vigilance de l’utilisateur, etc. ... <br>
        </p>
        <p>
            <span class="bold">L’EVALUATION</span> est définie dans le dictionnaire LAROUSSE comme « l’action de
            déterminer la valeur de quelque chose ».<br>
            L’évaluation des risques consistera donc à déterminer la valeur des risques. Pour cela il faudra identifier
            et caractériser les dangers, et identifier et
            caractériser les expositions aux dangers au cours de toutes les activités professionnelles. <br>
            <span class="bold">L’évaluation des risques consiste à :</span><br>
            <span class="bold">- Identifier et caractériser les dangers, et</span><br>
            <span class="bold">- Identifier et caractériser les expositions aux dangers au cours de toutes les activités professionnelles.</span><br>
            La retranscription de l’évaluation des risques dans le Document Unique doit permettre : <br>
            - De hiérarchiser les risques, et <br>
            - L’élaboration d’un plan d’action de réduction des risques. <br>
        </p>
        <p>
            <span class="bold">2.2. La place de l’évaluation des risques dans la démarche de prévention</span> <br>
            L'article L. 4121-2 du code du travail énonce les 9 principes qui doivent guider la démarche de prévention
            de tout employeur :<br>
            1° Eviter les risques ; <br>
            2° <span class="bold">Evaluer les risques</span> qui ne peuvent pas être évités ; <br>
            3° Combattre les risques à la source ; <br>
            4° Adapter le travail à l'homme, en particulier en ce qui concerne la conception des postes de travail ainsi
            que le choix des équipements de travail et
            des méthodes de travail et de production, en vue notamment de limiter le travail monotone et le travail
            cadencé et de réduire les effets de ceux-ci sur
            la santé ;<br>
            5° Tenir compte de l'état d'évolution de la technique ; <br>
            6° Remplacer ce qui est dangereux par ce qui n'est pas dangereux ou par ce qui est moins dangereux ;<br>
            7° Planifier la prévention en y intégrant, dans un ensemble cohérent, la technique, l'organisation du
            travail, les conditions de travail, les relations
            sociales et l'influence des facteurs ambiants, notamment les risques liés au harcèlement moral et au
            harcèlement sexuel, tels qu'ils sont définis aux
            articles L. 1152-1 et L. 1153-1 ; ainsi que ceux liés aux agissements sexistes définis à l'article L.
            1142-2-1<br>
            8° Prendre des mesures de protection collective en leur donnant la priorité sur les mesures de protection
            individuelle ;<br>
            9° Donner les instructions appropriées aux travailleurs. <br>
        </p>
    </div>

    <div class="footer">
        <p> Copyright © OZA DUERP Online</p>
        <p class="page-num">RAPPEL RÉGLEMENTAIRE "DOCUMENT UNIQUE"</p>
    </div>
</section>

<section class="page">
    <div class="header">
        <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
            , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
    </div>
    <div class="body body--notif">
        <p>
                <span class="bold">
                    L’évaluation des risques est donc bien placée en tête des principes de prévention par le législateur. C’est elle qui apporte la cohésion
                    nécessaire à la 4ème partie (santé et sécurité au travail) du Code du travail, par sa retranscription dans le « DOCUMENT UNIQUE ».
                </span> <br>
            Le DU centralise en effet toutes les activités professionnelles, leurs dangers, leurs risques et leurs
            réglementations spécifiques, notamment (non
            exhaustif) : <br>
            - les facteurs de risque professionnels, <br>
            - les risques d’interférences encadrés par les réglementation « Plan de Prévention » et « PPSPS », <br>
            - les risques liés aux opérations de chargement et de déchargement encadrés par le « Protocole de sécurité
            transport »,<br>
            - les risques liés aux installations, matériels et outils encadrés par la réglementation des « vérifications
            périodiques »,<br>
            Le DU intègre également toutes les mesures de prévention en place dans l’entreprise. <br>
            Le DU intègre finalement le Plan d’action de réduction des risques ou « programme de prévention ». <br>
        </p>
        <p>
            <span class="bold">2.3. L’annexe d'évaluation de l'exposition aux FACTEURS DE RISQUES PROFESSIONNELS du Document Unique</span><br>
            L'employeur doit consigner en annexe du document unique (R. 4121-1-1) : <br>
            - L'évaluation des expositions individuelles aux facteurs de risques professionnels définis
            réglementairement. Il peut pour cela utiliser le cas échéant
            un accord collectif étendu ou un référentiel professionnel de branche homologué. <br>
            - La proportion de salariés exposés au-delà des seuils fixés pour les facteurs de risques professionnels.
            Cette proportion est actualisée en tant que
            de besoin lors de la mise à jour du Document Unique. <br>
        </p>
        <p>
            <span class="bold">2.3.1. Que sont les FACTEURS DE RISQUES PROFESSIONNELS</span> <br>
            Le Code du travail (articles L4161-1 et D4161-1-1) et le Décret n° 2017-1769 du 27/12/2017 définissent les
            facteurs de risques professionnels comme
            les facteurs liés à : <br>
            - Manutentions manuelles de charges, <br>
            - Postures pénibles définies comme positions forcées des articulations, <br>
            - Vibrations mécaniques, <br>
            - Agents chimiques dangereux, <br>
            - Activités exercées en milieu hyperbare, <br>
            - Températures extrêmes, <br>
            - Bruit, <br>
            - Travail de nuit, <br>
            - Travail en équipes successives alternantes, <br>
            - Travail répétitif caractérisé par la réalisation de travaux impliquant l’exécution de mouvements répétés,
            sollicitant tout ou partie
            du membre supérieur, à une fréquence élevée et sous cadence contrainte. <br>
            Depuis le 01/10/2017, seuls les 6 derniers facteurs de risques ci-dessus sont associés à des seuils définis
            réglementairement (art. D4161-2).<br>
            L'exposition aux 10 facteurs de risques professionnels est donc évaluée dans votre Document Unique, mais
            seule l'exposition aux 6 facteurs de
            risques associés à un seuil est évaluée précisément par rapport aux seuils réglementaires dans l'annexe
            d'évaluation de l'exposition aux FACTEURS
            DE RISQUES PROFESSIONNELS. <br>
        </p>
    </div>
    <div class="footer">
        <p> Copyright © OZA DUERP Online</p>
        <p class="page-num">RAPPEL RÉGLEMENTAIRE "DOCUMENT UNIQUE"</p>
    </div>
</section>

<section class="page">
    <div class="header">
        <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
            , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
    </div>
    <div class="body body--notif">
        <p>
            <span
                class="bold">2.3.2. De la Prévention à la Compensation, le Compte Professionnel de Prévention (C2P)</span><br>
            Quand les mesures de prévention s’avèrent insuffisantes, certains risques peuvent occasionner ; lorsque
            l’exposition se situe au-delà de certains
            seuils, eux aussi définis réglementairement ; des dommages durables, identifiables et irréversibles sur sa
            santé des salariés.<br>
            Le législateur a donc instauré au bénéfice des salariés concernés un mécanisme de compensation : le Compte
            Professionnel de Prévention en
            vigueur depuis le 01/10/2017, qui est géré par la Caisse Nationale d’Assurance Maladie. <br>
            C’est elle qui informe les salariés de l’ouverture de leur compte et des points qu’ils ont acquis. <br>
        </p>
        <p>
            <span class="bold">2.3.2.1. Acquisition de points par les salariés exposés</span> <br>
            Les points accumulés sur le compte pourront être utilisés par les salariés pour financer : <br>
            - Une formation permettant de s’orienter vers un emploi non exposé ou moins exposé à des facteurs de risque
            professionnels,<br>
            - Un complément de rémunération lors d’un passage à temps partiel, <br>
            - Un départ anticipé à la retraite. <br>
        </p>
        <p>
            <span
                class="bold">2.3.2.2. Déclaration annuelle des expositions aux facteurs de risques professionnels</span><br>
            - Pour les travailleurs titulaires d'un contrat de travail qui demeure en cours à la fin de l'année civile,
            l'employeur déclare au terme de chaque année
            civile et au plus tard au titre de la paie du mois de décembre, le ou les facteurs de risques professionnels
            auxquels ils ont été exposés au-delà des
            seuils fixés réglementairement au cours de l'année civile considérée. <br>
            - Pour les travailleurs titulaires d'un contrat de travail d'une durée supérieure ou égale à un mois qui
            s'achève au cours de l'année civile, l'employeur
            déclare au plus tard lors de la paie effectuée au titre de la fin de ce contrat de travail le ou les
            facteurs de risques professionnels auxquels ils ont été
            exposés au cours de la période considérée. <br>
            Dans les deux cas, l’employeur effectue sa déclaration auprès des caisses de Sécurité Sociale dans le cadre
            de la DSN.<br>
            L'employeur peut rectifier sa déclaration des facteurs de risques professionnels : <br>
            - Jusqu'au 5 ou au 15 avril de l'année qui suit celle au titre de laquelle elle a été effectuée, selon
            l'échéance du paiement des cotisations qui lui est
            applicable ; <br>
            - Dans les cas où la rectification est faite en faveur du salarié, pendant une période de trois ans.<br>
        </p>
        <p>
            <span class="bold"> 3. Comment évaluer les risques et comment rédiger le Document Unique et son annexe des risques professionnels dans une logique de prévention ?</span><br>
            <span class="bold">3.1. Qui fait quoi</span><br>
            S’il n’impose aucune forme pour rédiger le Document Unique, le législateur impose à l’employeur d’utiliser
            une (des) personne(s) compétente(s) afin
            d’effectuer l’évaluation des risques et sa retranscription dans le Document Unique. <br>
            En effet, depuis le 1er juillet 2012 le Code du travail fait obligation à tout employeur de « désigner un ou
            plusieurs salariés compétents pour s'occuper
            des activités de protection et de prévention des risques professionnels de l'entreprise ». <br>
            Ce ou ces salarié(s) dispose(nt) donc des compétences nécessaires à la définition d’une méthode et d’un
            outil d’évaluation des risques adaptés à
            l’entreprise. <br>
            Cependant, « si les compétences dans l'entreprise ne permettent pas d'organiser ces activités, l'employeur
            peut faire appel, aux intervenants en
            prévention des risques professionnels (IPRP) appartenant au service de santé au travail auquel il adhère ou
            enregistrés auprès de la DIRECCTE.
            L’employeur peut en outre faire appel à d’autres ressources extérieures (CARSAT, INRS, OPPBTP, ANACT, à des
            consultants...) ».<br>
        </p>

    </div>
    <div class="footer">
        <p> Copyright © OZA DUERP Online</p>
        <p class="page-num">RAPPEL RÉGLEMENTAIRE "DOCUMENT UNIQUE"</p>
    </div>
</section>

<section class="page">
    <div class="header">
        <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
            , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
    </div>
    <div class="body body--notif">
        <p>
            <span class="bold">3.2. Quelles méthodes et quels outils ?</span>
            Le législateur n’impose aucune méthode ni aucune forme pour l’évaluation des risques et la rédaction du
            Document Unique. Le second alinéa de
            l’article R4121-1 du code du travail précise néanmoins : « Cette évaluation comporte un inventaire des
            risques identifiés dans chaque unité de travail
            de l'entreprise ou de l'établissement, y compris ceux liés aux ambiances thermiques ». <br>
            Les composants incontournables du Document Unique sont : <br>
            - Un inventaire des risques identifiés dans chaque unité de travail de l'entreprise ou de l'établissement,
            notamment :<br>
            - - L'évaluation des risques liés aux ambiances thermiques. <br>
            - - L'évaluation des risques psychosociaux. <br>
            - - L'évaluation des risques d'exposition aux agents chimiques à réaliser selon les prescriptions de
            l'article R.4412-6 du Code du travail. <br>
            - - L’évaluation des risques d’exposition aux champs électromagnétiques selon les critères précisés (art R.
            4453-8). <br>
        </p>
        <p>
            - Une hiérarchisation des risques identifiés et évalués dans l'inventaire. <br>
            - Un plan d'action de réduction des risques identifiés, évalués et hiérarchisés. <br>
            - L'annexe d'évaluation de l'exposition aux risques professionnels. <br>
            - Le Document Relatif à la Prévention Contre l'Explosion. <br>
        </p>
        <p>
            <span class="bold">3.2.1. Comment rédiger son Document Unique ?</span> <br>
            Le mode opératoire d'évaluation des risques est présenté dans la "Notice explicative de l'évaluation des
            risques" ci-contre.<br>
        </p>
        <p>
            <span class="bold">3.2.2. Comment rédiger son annexe d'évaluation de l'exposition aux facteurs de risques professionnels</span><br>
            Sur ce sujet le législateur a posé un cadre précis puisque pour 6 des 10 facteurs de risques, il existe un
            seuil d’exposition qui déclenche le mécanisme
            de réparation. <br>
        </p>
        <p>
            <span
                class="bold">3.2.3. Réalisation du diagnostic « d'exposition aux facteurs de risques professionnels »</span><br>
            On évaluera pour chaque poste de travail, l'exposition à chacun des 6 facteurs de risque de l'article
            D.4161-2 du Code du travail ; au regard des
            conditions habituelles de travail caractérisant le poste ; appréciées après application des mesures de
            protection collective et individuelle existantes.<br>
            Si pour tous les postes de l'entreprise, dans le cas le plus défavorable, l'exposition ne dépasse pas le
            seuil d'un des 6 facteurs de risque, on
            considèrera qu'aucun salarié n'est exposé au delà d'un seuil de pénibilité. <br>
            Si un au moins des seuils est dépassé à un poste de travail, on évaluera l’exposition de tous les salariés
            titulaires d'un contrat de travail d'une durée
            d'au moins un mois, quelle que soit la nature du contrat (CDI, CDD, intérim, apprentissage, etc.) qui ont
            travaillé à ce poste au cours de l'année, au
            prorata de leur temps de travail annuel à ce poste. <br>
            L'exposition de chaque salarié sera apprécié au regard des conditions habituelles de travail caractérisant
            le poste ou l'ensemble des postes occupé(s)
            en moyenne sur l'année entière ; que le contrat de travail porte sur l'année entière ou non. Dans ce dernier
            cas, l'exposition sera extrapolée en
            moyenne sur l'année complète. <br>
            L'exposition d’un salarié à temps partiel sera exactement équivalente à celle d’un salarié à temps plein (en
            pratique, un salarié à temps partiel
            n’atteindra probablement pas les seuils annuels). <br>
            Les périodes d'absence seront prises en compte dès lors qu'elles remettent manifestement en cause
            l'exposition au-delà des seuils caractérisant le ou
            les postes occupés. <br>
        </p>
    </div>
    <div class="footer">
        <p> Copyright © OZA DUERP Online</p>
        <p class="page-num">RAPPEL RÉGLEMENTAIRE "DOCUMENT UNIQUE"</p>
    </div>
</section>

<section class="page">
    <div class="header">
        <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
            , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
    </div>
    <div class="body body--notif">
        <h1 class="head-title" id="evalRisk">4. NOTICE EXPLICATIVE DE L'EVALUATION DES RISQUES</h1>
        <p>
            <span class="bold">EVALUATION DES RISQUES PROFESSIONNELS :</span> De gauche à droite du tableau d'évaluation
            des risques
        </p>
        <p>
            <span class="bold">Unité de travail</span> <br>
            L'article R.4121-1 du Code du travail "DOCUMENT UNIQUE D'EVALUATION DES RISQUES" précise : <br>
            "Cette évaluation comporte un inventaire des risques identifiés dans chaque unité de travail de l'entreprise
            ou de l'établissement".<br>
            Le législateur n'a pas défini "l'unité de travail". Nous l'entendons ici comme un poste de travail, un
            métier ou une activité.<br>
            <span class="bold">Les unités de travail sont détaillées dans la partie "Présentation de la structure" de ce Document Unique.</span>
        </p>
        <p>
            <span class="bold">DANGER et dommages potentiels à la personne</span> <br>
            Le danger est la propriété intrinsèque d'un agent (physique, chimique, biologique) susceptible d'avoir un
            effet nuisible sur l'Homme. Plus le potentiel de
            nuisance est élevé, plus les conséquences sur l'Homme sont importantes. On parlera des conséquences sur la
            santé de l'Homme (santé physique et
            santé mentale). La liste des dangers considérés dans ce Document Unique est présente à la fin de ce
            chapitre.<br>
            Nous listons ici tous les dangers potentiellement présents sur les lieux de travail et leurs conséquences
            potentielles.<br>
        </p>
        <p>
            <span class="bold">RISQUE, phase de travail modes et caractéristiques de l'exposition (outil, matériel, produit, situation, opération, fréquence, durée)</span><br>
            Nous décrirons ici l'activité professionnelle réelle, en fonctionnement normal et en marche dégradée, en
            détaillant chaque phase de travail, et pour
            chacune d'elles, les modes et les caractéristiques de l'exposition.
        </p>
        <p>
            <span class="bold">Fréquence d'exposition</span><br>
            La fréquence d'exposition est évaluée selon une échelle à 5 niveaux : <br>
            - <span class="bold">"Moins de 1 fois par an"</span> correspond à une exposition extrêmement rare de moins
            de une fois par an, soit "1" dans la formule de calcul.<br>
            - <span class="bold">"An"</span> correspond à une exposition rare de une à plusieurs fois par an, soit "2"
            dans la formule de calcul.<br>
            - <span class="bold">"Mois"</span> correspond à une exposition peu fréquente de une à plusieurs fois par
            mois, soit "3" dans la formule de calcul.<br>
            - <span class="bold">"Semaine"</span> correspond à une exposition fréquente de une à plusieurs fois par
            semaine, soit "4" dans la formule de calcul.<br>
            - <span class="bold">"Jour"</span> correspond à une exposition très fréquente, de une à plusieurs fois par
            jour, soit "5" dans la formule de calcul.<br>
        </p>
        <p>
            <span class="bold">Probabilité</span> <br>
            La probabilité de survenue d'un accident ou d'une atteinte à la santé doit être également évaluée, car la
            fréquence d'exposition à un danger n'est pas
            le seul paramètre qui influence la survenue d'un accident ou d'une atteinte à la santé.
        </p>
    </div>
    <div class="footer">
        <p> Copyright © OZA DUERP Online</p>
        <p class="page-num">NOTICE EXPLICATIVE DE L'EVALUATION DES RISQUES</p>
    </div>
</section>

<section class="page">
    <div class="header">
        <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
            , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
    </div>
    <div class="body body--notif">
        <p>
            <span class="bold">Par exemple,</span> une personne emprunte plusieurs fois par jour un escalier en se
            tenant à la rampe. La fréquence d'exposition est maximale, mais cela
            ne signifie pas que cette personne aura un accident chaque jour dans cet escalier. La probabilité qu'elle
            chute dans cet escalier est "faible" ou "très
            faible". <br>
            La probabilité d'occurrence est évaluée selon une échelle à 5 niveaux : <br>
            - <span class="bold">"très faible"</span> = 0,5 # <span class="bold">"faible"</span> = 2 # <span
                class="bold">"non faible"</span> = 3 # <span class="bold">"élevée"</span> = 4 # <span class="bold">"très élevée"</span>
            = 5.<br>
            Les indices de fréquence et de probabilité permettent de définir une <span class="bold">"classe d'exposition"</span>
            comme suit : fréquence + probabilité = classe d'exposition
            La "classe d'exposition" varie de 1,5 à 10. <br>
        </p>
        <p>
            <span class="bold">Gravité potentielle</span> <br>
            La gravité potentielle des conséquences de l'exposition à un danger est évaluée selon une échelle à 5
            niveaux :<br>
            - <span class="bold">"Impact faible"</span> correspond à une exposition sans conséquence sur la santé
            physique et mentale de la personne exposée.<br>
            - <span class="bold">"ASA"</span> correspond à un <span class="bold">A</span>ccident ou à une maladie
            professionnelle <span class="bold">S</span>ans <span class="bold">A</span>rrêt de travail. <br>
            - <span class="bold">"AAA"</span> correspond à un <span class="bold">A</span>ccident ou à une maladie
            professionnelle <span class="bold">A</span>vec <span class="bold">A</span>rrêt de travail, sans IPP
            (Incapacité Permanente Partielle*).<br>
            - <span class="bold">"IPP"</span> correspond à un accident ou à une maladie professionnelle avec arrêt de
            travail et avec IPP (<span class="bold">I</span>ncapacité <span class="bold">P</span>ermanente <span
                class="bold">P</span>artielle*).<br>
            - <span class="bold">"Décès"</span> correspond à au moins une maladie professionnelle avec Incapacité
            Permanente Totale ou au moins un décès.<br>
            * L'IPP est constatée lorsqu'il persiste des séquelles de l'accident du travail, alors que le salarié est
            déclaré apte.<br>
            Dans la formule de calcul, ces 5 niveaux sont côtés de la façon suivante : <br>
            "Impact faible" = 1 # "ASA" = 2 # "AAA" = 3 # "IPP" = 4 # "Décès" = 5 <br>
        </p>
        <p>
            <span class="bold">Impact différencié F / H</span> <br>
            Les lettres "F" pour Femme, ou "H" pour Homme sont utilisées pour identifier le cas échéant le sexe pour
            lequel la gravité est potentiellement la plus
            importante ; lorsqu'elle n'est pas égale pour les deux sexes (non concerné = "non"). <br>
            L'évaluation de l'impact différencié de l'exposition aux risques en fonction du sexe est en effet une
            exigence réglementaire. <br>
        </p>
        <p>
            <span class="bold">Risque brut</span> <br>
            Le risque brut correspond au niveau de risque évalué sans prendre en considération les mesures de prévention
            et de protection existantes.<br>
            Le risque brut correspond au produit de la classe d'exposition par la gravité (classe d'exposition x
            gravité).<br>
            Le risque brut varie de 1,5 à 50. <br>
        </p>
        <p>
            <span class="bold">Postes de travail à "RISQUE PARTICULIER"</span><br>
            Tous les postes de travail comportant au moins une situation de travail dont le risque brut est >= à 24 font
            partie de la "Liste des postes de travail à
            risque particulier".<br>
            Tous les salariés embauchés pour travailler à l'un de ces postes, en contrat de travail précaire (autre que
            CDI), doivent bénéficier d'une formation
            renforcée à la sécurité, ainsi que d'un accueil et d'une formation adaptés dans l'entreprise. <br>
            Liste établie par l'employeur, après avis du médecin du travail, du CHSCT ou, à défaut, des représentants du
            personnel, s'il en existe.<br>
            Liste tenue à la disposition des agents de contrôle des agents de l'inspection du travail (amende de 10 000
            €uros en cas de non présentation art.<br>
        </p>
    </div>
    <div class="footer">
        <p> Copyright © OZA DUERP Online</p>
        <p class="page-num">NOTICE EXPLICATIVE DE L'EVALUATION DES RISQUES</p>
    </div>
</section>

<section class="page">
    <div class="header">
        <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
            , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
    </div>
    <div class="body body--notif">
        <p>
            <span class="bold">Mesures de prévention et de protection existantes</span> <br>
            Les mesures de prévention et de protection existantes se déclinent en 3 catégories énoncées dans les 9
            principes de prévention de l'article L.4121-2
            du Code du Travail (Loi n° 91-1414 du 31 décembre 1991 art. 1 Journal Officiel du 7 janvier 1992 en vigueur
            le 31 décembre 1992) :<br>
            Mesure <span class="bold">Technique, Organisationnelle, Humaine (Information et formation, protection collective et individuelle).</span><br>
            Dans chaque catégorie, l'efficacité des différentes mesures de prévention existantes est présentée de la
            façon suivante :<br>
            - <span class="bold">"très bon"</span> = mesure existante très efficace : Technique = 6 ; Organisationnelle
            et Humaine = 3.<br>
            - <span class="bold">"bon"</span> = mesure existante de bonne efficacité : Technique = 4 ; Organisationnelle
            et Humaine = 2.<br>
            - <span class="bold">"moy"</span> = mesure existante d'efficacité moyenne : Technique = 2 ;
            Organisationnelle et Humaine = 1.<br>
            - <span class="bold">"0"</span> = mesure non existante.<br>
            Une pondération est appliquée à la somme des mesures de prévention selon les équivalences suivantes :<br>
            T+H+O = 12, pondération = 0,1 ; 11 0,15 ; 10 = 0,2 ; 9 = 0,25 ; 8 = 0,3 ; 7 = 0,35 ; 6 = 0,4 ; 5 = 0,5 ; 4 =
            0,6 ; 3 = 0,7 ; 2 = 0,8 ; 1 = 0,9.<br>
            <span class="bold">Le risque résiduel correspond donc à : ((F + P) x G) x pondération de (T + O + H)</span>
        </p>
        <p>
            <span class="bold">Criticité = situation actuelle</span><br>
            Le Document Unique doit réglementairement permettre d’identifier les risques les plus critiques afin de
            planifier leur suppression ou leur réduction.<br>
            La « criticité » traduit donc les risques résiduels en « état de la situation actuelle » de la façon
            suivante :<br>
            <span class="text-color-green">« Acceptable »</span> associé à la couleur verte, elle correspond à une
            criticité &lt; 12,5.<br>
            La diminution de ce risque n’est pas une priorité. <br>
            <span class="text-color-orange">« A améliorer »</span> associé à la couleur jaune, elle correspond à une
            criticité >= 12,5.<br>
            La diminution de ces risque peut être planifiée à moyen / long terme. <br>
            <span class="text-color-pink">« Agir vite »</span> est associé à la couleur rose, elle correspond à une
            criticité >= 20.<br>
            La diminution de ces risques est à planifier en priorité. <br>
            <span class="text-color-red">« STOP »</span> est associé à la couleur rouge, elle correspond à une criticité
            >=30 <= 50.<br>
            Ces activités doivent être stoppées immédiatement afin d’identifier et de mettre en place une activité plus
            sûre.
        </p>
    </div>
    <div class="footer">
        <p> Copyright © OZA DUERP Online</p>
        <p class="page-num">NOTICE EXPLICATIVE DE L'EVALUATION DES RISQUES</p>
    </div>
</section>

<section class="page">
    <div class="header">
        <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
            , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
    </div>
    <div class="body body--rules">
        <h1 class="head-title" id="evalRiskPro">5. EVALUATION DES RISQUES PROFESSIONNELS PAR UNITÉ DE TRAVAIL</h1>
        <p class="bold">
            Liste des dangers considérés. <br>
            <span class="text-color-red">En gras, dangers présents uniquement dans la version « Conformité » du Document Unique OZA.</span>
        </p>
        <p>
            1. Absence d’une personne « compétente » pour s’occuper des activités de protection et de prévention des
            risques professionnels de la structure.
        </p>
        <p>
            2. Accident, presqu’accident et maladie du travail non ou mal analysés et prévenus pouvant générer la
            répétition de ces faits.
        </p>
        <p class="bold">
            3. Agents biologiques (bactéries, virus) pouvant générer infections, intoxications, allergies, cancers,
            zoonoses.
        </p>
        <p class="bold">
            4. Agents chimiques pouvant générer des intoxications aigües ou chroniques, cancers, brûlures.
        </p>
        <p class="bold">
            5. Agression et violence internes et externes, à caractère sexuel ou non, pouvant mettre en péril la santé
            et la sécurité des salariés, notamment : vols, rackets, agression physique, agression verbale.
        </p>
        <p>
            Le harcèlement sexuel se caractérise par le fait d’imposer à une personne, de façon répétée, des propos ou
            comportements à connotation sexuelle qui :<br>
            - portent atteinte à sa dignité en raison de leur caractère dégradant ou humiliant, ou<br>
            - créent à son encontre une situation intimidante, hostile ou offensante.<br>
            Est assimilée au harcèlement sexuel toute forme de pression grave (même non répétée) dans le but réel ou
            apparent d’obtenir un acte sexuel, au profit de l’auteur des faits ou d’un tiers.<br>
            Dans le milieu professionnel, il y a harcèlement sexuel même s’il n’y a aucune relation hiérarchique entre
            l’agressé(e) et l’auteur des faits (entre collègues de même niveau, de services différents…)<br>
            Si l’auteur des faits a eu un contact physique avec l’agressé(e) il peut s’agir d’une agression sexuelle,
            plus gravement punie.<br>
            La victime peut se retourner contre l’auteur des faits en portant plainte dans un délai de 6 ans après le
            dernier fait (geste, propos…) lié à ce type de harcèlement. La victime peut également saisir le conseil des
            prud’hommes (secteur privé) ou le tribunal administratif (agents publics).<br>
            Le harcèlement sexuel est un délit pouvant être puni jusqu’à 2 ans de prison et 30 000 € d’amende. En cas
            d’abus d’autorité (de la part d’un supérieur hiérarchique par exemple), les peines peuvent être plus
            lourdes.<br>
            L’auteur du harcèlement peut par ailleurs devoir verser des dommages-intérêts à sa victime.<br>
            Enfin, l’auteur de ces agissements peut être soumis à des sanctions disciplinaires à son travail.
        </p>
        <p class="bold">
            6. Ambiances thermiques liées aux températures extérieures (hors températures liées aux postes de travail)
            pouvant générer fatigue, sueurs, nausées, maux de tête, vertiges, crampes, déshydratation, coup de chaleur,
            engourdissement, gelures, hypothermie.
        </p>
        <p>
            7. Amiante pouvant entrainer de graves maladies respiratoires : plaques pleurales, asbestose, cancer de la
            plèvre ou du poumon.
        </p>
        <p>
            8. Aptitude au travail, non respectée elle peut générer ou provoquer la rechute d’atteintes à la santé un
            accident du travail.
        </p>
    </div>
    <div class="footer">
        <p> Copyright © OZA DUERP Online</p>
        <p class="page-num">EVALUATION DES RISQUES PROFESSIONNELS PAR UNITÉ DE TRAVAIL</p>
    </div>
</section>

<section class="page">
    <div class="header">
        <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
            , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
    </div>
    <div class="body body--rules">
        <p class="bold">
            9. Bruit pouvant provoquer atteinte auditive, surdité, stress, fatigue FACTEUR DE RISQUE PROFESSIONNEL.
        </p>
        <p class="bold">
            10. Champs électromagnétiques pouvant générer vertiges, nausées, troubles visuels, brûlures,
            dysfonctionnement d’implants actifs.
        </p>
        <p>
            11. Chute à l’eau ou dans un autre liquide pouvant générer une atteinte à la santé ou la noyade.
        </p>
        <p class="bold">
            12. Chute d’objets, renversements et effondrements pouvant générer traumatismes, plaies, fractures,
            écrasement.
        </p>
        <p class="bold">
            13. Chutes de hauteur y compris chute dans les escaliers, pouvant générer traumatismes, plaies, fractures,
            noyade.
        </p>
        <p class="bold">
            14. Circulation à pied pouvant provoquer des chutes de plain-pied (glissades, trébuchements, pertes
            d’équilibre sur une surface “plane” : surfaces ne présentant aucune rupture de niveau ou bien des ruptures
            de niveau réduites (trottoir, petites marches, plan incliné, etc.)) ; ou provoquer des chocs à l’origine de
            traumatismes, plaies, fractures.
        </p>
        <p>
            15. Consommation de substances psychoactives (alcool, drogues, médicaments détournés) pouvant être à
            l’origine d’accidents du travail, notamment par la diminution de la vigilance, l’altération des capacités de
            jugement, de la motricité, de la vision et des réflexes.
        </p>
        <p>
            16. Dangers des produits, matériels, installations et activités de l’atelier pouvant générer des blessures
            et des atteintes à la santé.
        </p>
        <p class="bold">
            17. Déplacements dans l’enceinte de la structure avec un véhicule motorisé ou non pouvant générer des TMS,
            dorso-lombalgies, plaies, traumatismes, fractures, écrasement.
        </p>
        <p class="bold">
            18. Eclairage inadapté pouvant générer éblouissement, fatigue et inconfort visuel, chute, traumatisme,
            atteinte visuelle, erreur d’appréciation.
        </p>
        <p>
            19. Ecrans de visualisation pouvant générer fatigue visuelle, troubles musculosquelettiques et stress.
        </p>
        <p>
            20. Electricité pouvant générer brûlures, électrisation, électrocution, chute de hauteur.
        </p>
        <p>
            21. Espaces confinés et manque d’aération pouvant générer intoxication ou asphyxie.
        </p>
        <p>
            22. Incapacité à porter secours dans des délais raisonnables, pouvant aggraver la situation initiale.
        </p>
        <p>
            23. Incapacité à stopper et prévenir une situation de danger grave et imminent pour la santé ou la sécurité.
        </p>
        <p class="bold">
            24. Incendie et explosion pouvant générer des brûlures, plaies, traumatismes, fractures.
        </p>
        <p>
            25. Intempéries telles que la pluie, le vent, la neige, le brouillard, … , hors températures extérieures ;
            pouvant générer des atteintes à la santé, des glissades et des chutes, des risques d’effondrement ou
            d’ensevelissement
        </p>
    </div>
    <div class="footer">
        <p> Copyright © OZA DUERP Online</p>
        <p class="page-num">EVALUATION DES RISQUES PROFESSIONNELS PAR UNITÉ DE TRAVAIL</p>
    </div>
</section>

<section class="page">
    <div class="header">
        <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
            , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
    </div>
    <div class="body body--rules">
        <p class="bold">
            26. Machines ; outils électroportatifs, thermiques et pneumatiques ; outils à main et équipements de travail
            ; pouvant générer des plaies, coupures, lacérations, amputations, brulures, traumatismes, fractures,
            écrasements.
        </p>
        <p class="bold">
            27. Manutentions manuelles pouvant générer TMS, dorso-lombalgie, traumatisme, plaie, coupure, brûlures.
        </p>
        <p class="bold">
            28. Manutentions mécaniques pouvant générer écrasement, traumatisme, plaie, coupure.
        </p>
        <p>
            29. Méconnaissance de l’évolution de la règlemention en santé et sécurité au travail pouvant générer des
            atteintes à la santé et des accidents du travail.
        </p>
        <p>
            30. Méconnaissance des risques et des consignes de sécurité pouvant générer des atteintes à la santé et des
            accidents du travail.
        </p>
        <p class="bold">
            31. Milieu hyperbare pouvant générer des accidents et / ou des pathologies de décompression FACTEUR DE
            RISQUE PROFESSIONNEL.
        </p>
        <p>
            32. Nanomatériaux et nanoparticules pouvant générer des intoxications principalement par inhalation ou
            ingestion.
        </p>
        <p>
            33. Opérations de chargement et de déchargement de véhicule réalisées en coactivité entre la structure
            utilisatrice et une entreprise de transport, pouvant générer des atteintes à la santé et / ou des accidents.
        </p>
        <p>
            34. Organisation du travail, pouvant générer notamment des risques psychosociaux, troubles
            musculosquelettiques, accidents.
        </p>
        <p>
            35. Plomb pouvant entrainer des atteintes graves au niveau du système nerveux, au niveau des reins, au
            niveau du sang, au niveau du système digestif, et sur le système reproducteur.
        </p>
        <p>
            36. Postures pénibles, travail statique pouvant générer fatigue et douleurs, accidents traumatiques et
            cardiovasculaires, TMS, dorso-lombalgies.
        </p>
        <p class="bold">
            37. Rayonnements ionisants pouvant générer des brûlures, des lésions cellulaires, des effets cancérogènes,
            mutagènes et reprotoxiques.
        </p>
        <p class="bold">
            38. Rayonnements optiques pouvant générer des atteintes de la peau (brulure, vieillissement, cancer) et de
            l’œil (lésions de cornée, conjonctivite, rétine et opacification du cristallin).
        </p>
        <p>
            39. Risques liés à la l’interférence entre plusieurs activités pouvant générer des atteintes à la santé et /
            ou des accidents.
        </p>
        <p class="bold">
            40. Risques psychosociaux dont harcèlement moral et sexuel, agression, harcèlement et violence internes et
            externes (morale, verbale, physique, à caractère sexuel) pouvant mettre en péril la santé et la sécurité des
            salariés, affecter la dignité et le devenir professionnel et / ou générer des maladies cardio-vasculaires,
            troubles anxiodépressifs, stress, épuisement professionnel ou burnout, suicide.
        </p>
        <p class="bold">
            41. Risques routiers durant le trajet domicile travail pouvant générer des atteintes traumatiques plus ou
            moins sévères ou le décès (1ère cause de mortalité au travail).
        </p>
        <p class="bold">
            42 Risques routiers en mission à l’extérieur des locaux de la structure pouvant générer stress, TMS,
            dorso-lombalgies, et atteintes traumatiques plus ou moins sévères.
        </p>
    </div>
    <div class="footer">
        <p> Copyright © OZA DUERP Online</p>
        <p class="page-num">EVALUATION DES RISQUES PROFESSIONNELS PAR UNITÉ DE TRAVAIL</p>
    </div>
</section>

<section class="page">
    <div class="header">
        <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->adress }}
            , {{ $single_document->city_zipcode }} {{ $single_document->city }}</p>
    </div>
    <div class="body body--rules">
        <p class="bold">
            43 Télétravail réalisé au domicile pouvant engendrer des risques physiques (musculosquelettiques, visuels,
            électriques, …), des risques liés à une mauvaise ergonomie du poste de travail ou à une installation
            défectueuse ; et des risques psychosociaux.
        </p>
        <p>
            44 Températures extrêmes liées aux postes de travail (hors températures extérieures) pouvant générer
            fatigue, sueurs, nausées, maux de tête, vertiges, crampes, déshydratation, coup de chaleur, engourdissement,
            gelures, hypothermieFACTEUR DE RISQUE PROFESSIONNEL.
        </p>
        <p>
            45 Travail de nuit entre 21h et 6 heures, ou en équipes successives alternantes pouvant générer des troubles
            du sommeil, des troubles cardiovasculaires, des cancers FACTEUR DE RISQUE PROFESSIONNEL
        </p>
        <p>
            46 Travail isolé pouvant générer des contraintes supplémentaires et augmenter les difficultés à secourir.
        </p>
        <p>
            47 Travail répétitif pouvant générer stress, TMS, dorso-lombalgies FACTEUR DE RISQUE PROFESSIONNEL
        </p>
        <p class="bold">
            48 Vibrations transmises au corps entier pouvant générer des dorso-lombalgies, hernies discales.
        </p>
        <p class="bold">
            49 Vibrations transmises aux mains et aux bras pouvant générer des pathologies des articulations du poignet
            ou du coude, un syndrome de Raynaud ou des troubles neurologiques.
        </p>
    </div>
    <div class="footer">
        <p> Copyright © OZA DUERP Online</p>
        <p class="page-num">EVALUATION DES RISQUES PROFESSIONNELS PAR UNITÉ DE TRAVAIL</p>
    </div>
</section>

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

@if($single_document->risk_psycho)
    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}
                , {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body body--rules">
            <h1 class="head-title" id="evalRiskPsycho">7. LES RISQUES PSYCHOSOCIAUX</h1>

            <p>
                <span class="bold">1. Quels dangers liés aux RPS ?</span> <br>
                Le Ministère du travail Français en donne cette définition sur son site www.travail-emploi.gouv.fr : «
                Les risques psychosociaux (RPS) sont à l’interface de l’individu et de sa situation de travail d’où le
                terme de risque psychosocial. Sous l’entité RPS, on entend stress mais aussi violences internes
                (harcèlement moral, harcèlement sexuel) et violences externes (exercées par des personnes extérieures à
                l’entreprise à l’encontre des salariés) ».<br>
                <span class="bold">L’agence Européenne</span> pour la sécurité et la santé au travail considère pour sa
                part que : « Les risques psychosociaux et le stress occasionné par le travail font partie des principaux
                défis à relever dans le domaine de la santé et la sécurité au travail. Ils ont une incidence
                considérable sur la santé des personnes, des organisations et des économies nationales. <br>
                Les dangers qui génèrent les RPS sont notamment : <br>
                - Le déséquilibre entre la perception qu’une personne a des contraintes de son environnement de travail
                et la perception qu’elle a de ses propres ressources pour y faire face ; <br>
                - Les violences internes commises au sein de l’entreprise par des salariés ; <br>
                - Les violences externes commises sur des salariés par des personnes externes à l’entreprise.
            </p>

            <p>
                <span class="bold">2. Quels risques et conséquences liés aux RPS ?</span> <br>
                L’exposition à ces situations de travail peut avoir des conséquences sur la santé des salariés,
                notamment en termes de maladies cardio-vasculaires, de troubles musculosquelettiques, de troubles
                anxio-dépressifs, d’épuisement professionnel, voire de suicide.<br>
                Les risques psychosociaux engendrent également un coût important pour les entreprises à travers une
                croissance des absences, des inaptitudes, du turnover, des reconnaissances de maladie professionnelle,
                des retards, de l’improductivité et des tensions sociales.
            </p>

            <p>
                <span class="bold">2.1. Facteurs potentiels de RPS au travail :</span> <br>
                - Mauvaise communication, niveau de soutien insuffisant pour la résolution des problèmes et le
                développement personnel, absence de définition des objectifs.<br>
                - Ambiguïté et conflits de rôles, imprécision de la définition des responsabilités des travailleurs.<br>
                - Stagnation et incertitude dans la carrière, promotion insuffisante ou excessive, salaire bas,
                insécurité professionnelle, valeur sociale du travail insuffisante. - Participation insuffisante à la
                prise de décision, manque de contrôle sur le travail.<br>
                - Isolement social ou physique, mauvais rapports avec les supérieurs, conflits interpersonnels, manque
                de soutien social.<br>
                - Exigences contradictoires entre le travail et la vie privée, soutien insuffisant à la maison,
                difficultés à concilier vie professionnelle et vie privée.<br>
                - Problèmes concernant la fiabilité, la disponibilité, l’adaptation, l’entretien ou la réparation de
                l’équipement et des moyens.<br>
                - Manque de variété ou cycles de travail court, travail fragmenté ou insignifiant, sous-utilisation des
                compétences, grande insécurité.<br>
                - Surcharge ou manque de travail, manque de contrôle sur le rythme de travail, niveau élevé de pression
                par rapport au temps imparti pour effectuer le travail.<br>
                - Travail posté, plannings inflexibles, horaires de travail imprévisibles, longues heures de travail ou
                travail effectué en dehors des heures normales,<br>
                - Harcèlement moral ou sexuel,<br>
                - Conflits exacerbés entre des personnes ou entre des équipes,<br>
                - Insultes, menaces, agressions.
            </p>
        </div>

        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">LES RISQUES PSYCHOSOCIAUX</p>
        </div>
    </section>

    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}
                , {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body body--rules">
            <h1 class="head-title">7. LES RISQUES PSYCHOSOCIAUX</h1>

            <p>
                <span class="bold">2.2. Indicateurs de RPS au travail</span> <br>
                - Les réactions physiologiques : maladies hypertensives, affections cardiaques, lésions articulaires de
                type rhumatismal. Un stress intense se traduit par une forte usure de l’organisme qui affecte la
                santé.<br>
                - Les réactions émotionnelles s’expriment par des variations de l’humeur telles que l’irritabilité,
                l’anxiété ou encore la dépression, phase ultime du stress. Elles peuvent également se manifester par une
                baisse d’estime de soi, d’un sentiment d’infériorité ou d’insatisfaction au travail.<br>
                - Les réactions comportementales comme une augmentation de la consommation de tabac, alcool,
                antidépresseurs, voire des réactions violentes ou même des tentatives de suicide ; la diminution de la
                capacité à traiter l’information est fonction du niveau de stress. A un niveau de stress élevé, l’effort
                compensatoire atteint son plafond et l’effet différentiel du stress devient clairement observable sur la
                performance.<br>
                Constituent des exemples d’agissements constitutifs de risque psychosocial, qu’ils soient commis par un
                employeur ou un autre salarié : - Ne pas informer le salarié de la tenue des réunions de son service
                ;<br>
                - Refus systématique de toutes les demandes de formation et de congés sans justification objective ;<br>
                - Retrait d’avantages tels que véhicule de fonction, téléphone ou ordinateur portable sans justification
                objective ;<br>
                - Mise au « placard », c’est-à-dire suppression progressive des tâches prévues au contrat de travail et
                isolement ; <br>
                - Dénigrements systématiques, insultes ou agressions verbales répétitives ;<br>
                - Charge de travail incompatible avec les compétences et / ou les moyens confiés au salarié ;<br>
                - Surveillance disproportionnée de l’exécution de la prestation de travail ;<br>
                - etc.
            </p>

            <p>
                <span class="bold">2.3. Evaluation des RPS</span> <br>
                L’évaluation des RPS est un processus complexe. Il nécessite d’observer à la fois l’organisation du
                travail et son environnement, les exigences de productivité, les relations sociales et le
                management.<br>
                Le challenge consiste à objectiver des risques qui paraissent tout à fait subjectifs.<br>
                L’identification des risques psychosociaux passe par la mobilisation du personnel à travers des
                échanges, questionnaires, réunions, menés avec tous les salariés ou les représentants du personnel. Le
                service de santé au travail ou des intervenants extérieurs spécialisés peuvent aider à cette évaluation
                en jouant le rôle d’intermédiaire et de garant de l’objectivité de la démarche.<br>
                La mise à jour régulière du document unique sur le sujet des risques psychosociaux est impérative. En
                effet, ces risques évoluent rapidement dans le temps et peuvent ainsi apparaître ou disparaître,
                notamment lors de restructuration, changement de méthode, de lieux de travail ou de management.<br>
                Une généralisation du processus d’analyse des risques ne peut être opérée. Mais pour faciliter
                l’évaluation de ces risques et leur intégration dans le document unique, des outils communs à toutes les
                branches d’activité existent, notamment les outils et méthodes de l’INRS.<br>
                La démarche d’analyse de OZA utilisée dans ce Document Unique (ci-après au paragraphe 5) reprend l’outil
                proposé par l’INRS pour les entreprises de plus de 50 salariés (ED 6140 Outil RPS-DU) en l’adaptant
                également aux entreprises plus petites.
            </p>

            <p>
                <span class="bold">3. Quel cadre et limites réglementaires pour les RPS ?</span> <br>
                Une obligation générale de sécurité incombe à l’employeur. Elle est énoncée de la façon suivante dans la
                Code du travail : L’employeur prend les mesures nécessaires pour assurer la sécurité et protéger la
                santé physique et mentale des travailleurs.<br>
                Le harcèlement moral, le harcèlement sexuel et les agissements sexistes sont interdits en France par le
                Code du travail et par le Code pénal.<br>
            </p>
        </div>

        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">LES RISQUES PSYCHOSOCIAUX</p>
        </div>
    </section>


    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}
                , {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body body--rules">
            <h1 class="head-title">7. LES RISQUES PSYCHOSOCIAUX</h1>

            <p>
                <span class="bold">4. Quels moyens de prévention des RPS ?</span> <br>
                Pour mettre en œuvre sa stratégie de prévention, l’employeur a notamment la possibilité de s’appuyer sur
                le service de santé au travail. La logique de prévention s’appuiera sur les données de sortie de
                l’évaluation des risques qui aura été réalisée selon les phases logiques :<br>
                - D’identification des facteurs de risques,<br>
                - De quantification des facteurs de risques, - De hiérarchisation des facteurs de risques, réalisées
                pour chaque unité de travail.<br>
                Les mesures de prévention porteront logiquement sur tous les facteurs de risque identifiés comme
                prioritaires lors de l’évaluation, notamment : - L’organisation du travail et son environnement,
                notamment pour le rendre plus stimulant,<br>
                - Les exigences de productivité, notamment en adaptant le travail demandé aux capacités et aux
                ressources des salariés,<br>
                - Les relations sociales et interpersonnelles,<br>
                - Le management,<br>
                - La définition claire des rôles et des responsabilités de chacun,<br>
                - La possibilité donnée aux salariés de participer aux changements qui affecteront leur travail,<br>
                - L’amélioration de la communication de l’entreprise sur sa stratégie afin de réduire les incertitudes,
                - La facilitation et l’amélioration des échanges et du dialogue entre tous les acteurs de
                l’entreprise,<br>
                - L’aménagement des locaux pour lutter contre le risque d’agression,<br>
                -….<br>
                Le service de santé au travail prendra pour sa part en charge les salariés identifiés en souffrance.
            </p>

            <p>
                <span class="bold">5. Démarche OZA d’évaluation et de prévention des RPS</span> <br>
                Les RPS sont évalués en suivant la démarche en 3 étapes suivantes :<br>
                1ère étape<br>
                Les salariés répondent volontairement et anonymement à un questionnaire comportant :<br>
                - 26 questions portant sur 7 familles de facteurs de RPS, et<br>
                - une échelle destinée à estimer le niveau de stress de 0 à 100.
            </p>
        </div>

        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">LES RISQUES PSYCHOSOCIAUX</p>
        </div>
    </section>


    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}
                , {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body body--rules">
            <h1 class="head-title">7. LES RISQUES PSYCHOSOCIAUX</h1>

            <p>
                <span class="bold">2ème étape</span> <br>
                Le niveau de risque moyen est calculé en effectuant la moyenne pondérée des réponses obtenues pour
                chaque question avec les pondérations suivantes : « non concerné » = 0 ; « risque faible » = 3,33 ; «
                risque modéré » = 6,66 ; « risque élevé » = 10<br>
                Le niveau de risque moyen est présenté selon la cotation du risque suivante :<br>
                < 2,5 Non concerné<br>
                2,5 à 4,9 = Faible<br>
                5 à 7,4 = Modéré<br>
                >= 7,5 = Élevé<br>
                Voir tableau « Niveau de risque Psychosocial moyen ».
            </p>

            <p>
                <span class="bold">3ème étape</span> <br>
                Une analyse du risque psychosocial individuel est également effectuée en examinant chaque questionnaire
                individuellement.<br>
                Le nombre de salariés en souffrance est reporté dans le tableau « Niveau de risque Psychosocial
                individuel ».<br>
                Les salariés en souffrance sont ceux qui ont répondu de façon extrême à plus de trois questions et qui
                ont positionné leur réponse au-delà de 66 sur l’échelle de niveau de stress ; et ceux qui ont répondu de
                façon extrême à la question 21 et qui ont positionné leur réponse au-delà de 66 sur l’échelle de niveau
                de stress. Voir tableau « Niveau de risque Psychosocial individuel ».
            </p>

            <p>
                <span class="bold">4ème étape</span> <br>
                Un plan d’action est élaboré et proposé afin de réduire le risque psychosocial moyen et individuel.
            </p>
        </div>

        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">LES RISQUES PSYCHOSOCIAUX</p>
        </div>
    </section>

    @foreach($psychosocial_groups as $psychosocial_group)
        @php
            $all = count($psychosocial_group->responses);
        @endphp
        <section class="page">
            <div class="header">
                <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}
                    , {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
            </div>

            <div class="body body--notif">
                <h1 class="head-title">QUESTIONNAIRES D'ÉVALUATION DES RISQUES PSYCHOSOCIAUX</h1>

                <h3 class="head-subtitle">Groupe d’exposition homogène : <span
                        class="text-color-yellow">{{ $psychosocial_group->name }}</span></h3>

                <table class="table table--inv">
                    <tr>
                        <td style="width: 50%">
                            <table class="table table--psycho">
                                <thead>
                                <tr>
                                    <th colspan="5">Nombre de questionnaires exploités</th>
                                    <th>{{ $psychosocial_group->number_quiz }}</th>
                                </tr>
                                <tr>
                                    <th rowspan="2" class="th_question">Questions</th>
                                    <th class="th_awe">Jamais</th>
                                    <th class="th_awe">Parfois</th>
                                    <th class="th_awe">Souvent</th>
                                    <th class="th_awe">Toujours</th>
                                    <th rowspan="2" class="th_awe">Moyenne</th>
                                </tr>
                                <tr>
                                    <th class="th_awe">Non</th>
                                    <th class="th_awe">Plutôt non</th>
                                    <th class="th_awe">Plutôt oui</th>
                                    <th class="th_awe">Oui</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($questions as $key => $question)
                                    @if($key <= 12)
                                        @php
                                            $response = $question->response($psychosocial_group->id)
                                        @endphp
                                        @if(isset($response))
                                            <tr>
                                                <td class="td_question">{{ $question->order }} : {{ $question->info }}</td>
                                                <td class="td_all">{{ $response->never }}</td>
                                                <td class="td_all">{{ $response->sometimes }}</td>
                                                <td class="td_all">{{ $response->often }}</td>
                                                <td class="td_all">{{ $response->always }}</td>
                                                <td class="td_all">{{ $response->intensity() }}</td>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                                @if($all === 0)
                                    <tr class="space">
                                        <td colspan="6" class="none center">Evaluation en cours</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <p></p>
                        </td>
                        <td style="width: 50%">
                            <table class="table table--psycho">
                                <thead>
                                <tr>
                                    <th colspan="5">D’une façon générale, comment évaluez-vous votre niveau de stress
                                        sur une échelle de zéro à 100
                                    </th>
                                    <th>{{ $psychosocial_group->stress_level }}</th>
                                </tr>
                                <tr>
                                    <th rowspan="2" class="th_question">Questions</th>
                                    <th class="th_awe">Jamais</th>
                                    <th class="th_awe">Parfois</th>
                                    <th class="th_awe">Souvent</th>
                                    <th class="th_awe">Toujours</th>
                                    <th rowspan="2" class="th_awe">Moyenne</th>
                                </tr>
                                <tr>
                                    <th class="th_awe">Non</th>
                                    <th class="th_awe">Plutôt non</th>
                                    <th class="th_awe">Plutôt oui</th>
                                    <th class="th_awe">Oui</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for($i = 13; $i < count($questions); $i++)
                                    @php
                                        $response = $questions[$i]->response($psychosocial_group->id)
                                    @endphp
                                    @if(isset($response))
                                        <tr>
                                            <td class="td_question">{{ $questions[$i]->order }}
                                                : {{ $questions[$i]->info }}</td>
                                            <td class="td_all">{{ $response->never }}</td>
                                            <td class="td_all">{{ $response->sometimes }}</td>
                                            <td class="td_all">{{ $response->often }}</td>
                                            <td class="td_all">{{ $response->always }}</td>
                                            <td class="td_all">{{ $response->intensity() }}</td>
                                        </tr>
                                    @endif
                                @endfor
                                @if($all === 0)
                                    <tr class="space">
                                        <td colspan="6" class="none center">Evaluation en cours</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <p></p>
                        </td>
                    </tr>
                </table>
                <p></p>
            </div>


            <div class="footer">
                <p> Copyright © OZA DUERP Online</p>
                <p class="page-num">LES RISQUES PSYCHOSOCIAUX</p>
            </div>
        </section>
    @endforeach


    @foreach($psychosocial_groups as $psychosocial_group)
        @php
            $all = count($psychosocial_group->responses);
            $allCal = 0;
            foreach($questions as $key => $question){
                $response = $question->response($psychosocial_group->id);
                if(isset($response)) $allCal = $allCal + $response->intensity();
            }
            if ($all !== 0) $allCal = $allCal / $all;
        @endphp
        <section class="page">
            <div class="header">
                <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}
                    , {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
            </div>

            <div class="body body--notif">
                <h1 class="head-title">NIVEAU DE RISQUE PSYCHOSOCIAL MOYEN</h1>

                <h3 class="head-subtitle">Groupe d’exposition homogène : <span
                        class="text-color-yellow">{{ $psychosocial_group->name }}</span></h3>

                <table class="table table--inv">
                    <tr>
                        <td style="width: 50%">
                            <table class="table table--psycho">
                                <thead>
                                <tr>
                                    <th colspan="3" class="green">Niveau de risque Psychosocial moyen</th>
                                </tr>
                                <tr>
                                    <th class="th_question">Facteurs de risques psychosociaux</th>
                                    <th class="th_intensity">Niveau d’intensité</th>
                                    <th class="th_action">Priorité d’action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($questions as $key => $question)
                                    @if($key <= 13)
                                        @php
                                            $response = $question->response($psychosocial_group->id)
                                        @endphp
                                        @if(isset($response))
                                            <tr class="space">
                                                <td class="td_question">{{ $question->order }} : {{ $question->name }}</td>
                                                <td class="td_all">{{ $response->intensity() }}</td>
                                                <td class="td_all {{ $response->priorityPDF()['class'] }}">{{ $response->priorityPDF()['text'] }}</td>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                                @if($all === 0)
                                    <tr class="space">
                                        <td colspan="3" class="none center">Evaluation en cours</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <p></p>
                        </td>
                        <td style="width: 50%">
                            <table class="table table--psycho">
                                <thead>
                                <tr>
                                    <th colspan="3" class="green">Niveau de risque Psychosocial moyen</th>
                                </tr>
                                <tr>
                                    <th class="th_question">Facteurs de risques psychosociaux</th>
                                    <th class="th_intensity">Niveau d’intensité</th>
                                    <th class="th_action">Priorité d’action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for($i = 14; $i < count($questions); $i++)
                                    @php
                                        $response = $questions[$i]->response($psychosocial_group->id)
                                    @endphp
                                    @if(isset($response))
                                        <tr class="space">
                                            <td class="td_question">{{ $questions[$i]->order }} : {{ $questions[$i]->name }}</td>
                                            <td class="td_all">{{ $response->intensity() }}</td>
                                            <td class="td_all {{ $response->priorityPDF()['class'] }}">{{ $response->priorityPDF()['text'] }}</td>
                                        </tr>
                                    @endif
                                @endfor
                                @if($all === 0)
                                    <tr class="space">
                                        <td colspan="3" class="none center">Evaluation en cours</td>
                                    </tr>
                                @else
                                    <tr class="space">
                                        <td class="td_question">Niveau de risque RPS moyen</td>
                                        <td class="td_all">{{ round($allCal,1) }}</td>
                                        <td class="td_all {{ $response->priorityPDFCustom($allCal)['class'] }}">{{ $response->priorityPDFCustom($allCal)['text'] }}</td>
                                    </tr>
                                    <tr class="space">
                                        <td class="td_question">D’une façon générale, comment évaluez-vous votre niveau de stress <br> sur une échelle de zéro à 100</td>
                                        <td class="td_all" colspan="2">{{ $psychosocial_group->stress_level }}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <p></p>
                        </td>
                    </tr>
                </table>
                <p></p>
            </div>


            <div class="footer">
                <p> Copyright © OZA DUERP Online</p>
                <p class="page-num">LES RISQUES PSYCHOSOCIAUX</p>
            </div>
        </section>
    @endforeach


    @foreach($psychosocial_groups as $psychosocial_group)
        @php
            $all = count($psychosocial_group->responses);
        @endphp
        <section class="page">
            <div class="header">
                <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}
                    , {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
            </div>

            <div class="body body--notif">
                <h1 class="head-title">RISQUE PSYCHOSOCIAL INDIVIDUEL</h1>

                <h3 class="head-subtitle">Groupe d’exposition homogène : <span
                        class="text-color-yellow">{{ $psychosocial_group->name }}</span></h3>

                <table class="table table--inv">
                    <tr>
                        <td style="width: 50%">
                            <table class="table table--psycho">
                                <thead>
                                <tr>
                                    <th colspan="2" class="green">Risque Psychosocial individuel</th>
                                </tr>
                                <tr>
                                    <th class="th_question">Facteurs de risques psychosociaux</th>
                                    <th class="th_intensity">Nombre de réponses extrêmes</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($questions as $key => $question)
                                    @if($key <= 12)
                                        @php
                                            $response = $question->response($psychosocial_group->id)
                                        @endphp
                                        @if(isset($response))
                                            <tr class="space">
                                                <td class="td_question">{{ $question->order }} : {{ $question->name }}</td>
                                                <td class="td_all">{{ $response->extreme() }}</td>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                                @if($all === 0)
                                    <tr class="space">
                                        <td colspan="2" class="none center">Evaluation en cours</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <p></p>
                        </td>
                        <td style="width: 50%">
                            <table class="table table--psycho">
                                <thead>
                                <tr>
                                    <th colspan="2" class="green">Risque Psychosocial individuel</th>
                                </tr>
                                <tr>
                                    <th class="th_question">Facteurs de risques psychosociaux</th>
                                    <th class="th_intensity">Nombre de réponses extrêmes</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for($i = 13; $i < count($questions); $i++)

                                    @if($i === (count($questions) - 1))
                                        <tr class="space">
                                            <td class="td_question">Nombre de salariés en souffrance :</td>
                                            <td class="td_all">{{ $psychosocial_group->employee }}</td>
                                        </tr>
                                    @else
                                        @php
                                            $response = $questions[$i]->response($psychosocial_group->id)
                                        @endphp
                                        @if(isset($response))
                                            <tr class="space">
                                                <td class="td_question">{{ $questions[$i]->order }} : {{ $questions[$i]->name }}</td>
                                                <td class="td_all">{{ $response->extreme() }}</td>
                                            </tr>
                                        @endif
                                    @endif
                                @endfor
                                @if($all === 0)
                                    <tr class="space">
                                        <td colspan="2" class="none center">Evaluation en cours</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <p></p>
                        </td>
                    </tr>
                </table>
                <p></p>
            </div>


            <div class="footer">
                <p> Copyright © OZA DUERP Online</p>
                <p class="page-num">LES RISQUES PSYCHOSOCIAUX</p>
            </div>
        </section>
    @endforeach

    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}
                , {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body">
            <h1 class="head-title" id="listPost">PLAN D'ACTION DE RÉDUCTION DES RISQUES PSYCHOSOCIAUX</h1>

            <table class="table table--action">
                <thead>
                <tr>
                    <th colspan="9" class="green">Plan d’action de réduction des Risques Psychosociaux</th>
                </tr>
                <tr>
                    <td class="theader">
                        Groupe d'exposition homogène
                    </td>
                    <td class="theader">
                        Famille de facteurs de risques psychosociaux
                    </td>
                    <td class="theader" style="width: 8%">
                        Niveau d’intensité
                    </td>
                    <td class="theader" style="width: 8%">
                        Réponses extrêmes
                    </td>
                    <td class="theader" style="width: 8%">
                        Priorité d'action
                    </td>
                    <td class="theader min-width">
                        Mesure de prévention et de protection à mettre en place
                    </td>
                    <td class="theader min-width">
                        Décision sur les actions proposées :
                        - Sera réalisé le (date)
                        - Ne sera pas réalisé
                    </td>
                    <td class="theader min-width">
                        Date de réalisation
                    </td>
                    <td class="theader max-width">
                        Commentaire, complément, autres actions
                    </td>
                </tr>
                </thead>
                <tbody>
                @php
                    $all = 0;
                    $is = 0;
                    foreach ($psychosocial_groups as $psychosocial_group){
                        $all += $psychosocial_group->employee;
                        $is = $is+count($psychosocial_group->responses);
                    }
                @endphp
                @foreach($psychosocial_groups as $psychosocial_group)
                    @foreach($psychosocial_group->responses as $response)
                        @php
                            if ($response->priority()['text'] === "Non concerné" || $response->priority()['text'] === "Faible"){
                                $response->restraints()->delete();
                            }
                        @endphp
                        @if(count($response->checked_restraints) > 0)
                            @for($i = 0; $i < count($response->checked_restraints); $i++)
                                @if($response->checked_restraints[$i]->checked)
                                    <tr class="space">
                                        <td class="psycho-group">{{ $psychosocial_group->name }}</td>
                                        <td class="question">{{ $response->question->name }}</td>
                                        <td class="intensity min-width min-width-left">{{ $response->intensity() }}</td>
                                        <td class="extreme min-width min-width-left">{{ $response->extreme() }}</td>
                                        <td class="action min-width min-width-left {{ $response->priorityPDF()['class'] }}"> {{ $response->priorityPDF()['text'] }}</td>
                                        <td class="restraint">{{ $response->checked_restraints[$i]->text }}</td>
                                        <td class="decision">{{ $response->checked_restraints[$i]->decision ?  : "" }}</td>
                                        <td class="date">{{ $response->checked_restraints[$i]->date ? date("d/m/Y", strtotime($response->checked_restraints[$i]->date)) : "" }}</td>
                                        <td class="comment"></td>
                                    </tr>
                                @endif
                            @endfor
                        @endif
                    @endforeach
                @endforeach
                @if($all > 0)
                    <tr class="space">
                        <td class="td_question" colspan="5">Présence de salariés en souffrance</td>
                        <td class="td_restraint" colspan="4">Informer le médecin du travail de cette situation afin qu'il puisse intégrer cette problématique dans ses actions de prévention.</td>
                    </tr>
                @endif
                @if($is === 0)
                    <tr class="space">
                        <td colspan="9" class="none center">Evaluation en cours</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <p></p>
        </div>

        <div class="footer">
            <p>Copyright © OZA DUERP Online</p>
            <p class="page-num">EVALUATION DES RISQUES PROFESSIONNELS</p>
        </div>
    </section>

@endif

@if($single_document->risk_chemical)

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

@endif

@if($single_document->risk_explosion)


    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}
                , {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body body--rules">
            <h1 class="head-title" id="evalRiskExplosion">9. DRPCE</h1>
            <p>Document Relatif à la Protection Contre l'Explosion</p>

            <p><span class="text-color-green">1. Rappel réglementaire</span></p>

            <p><span class="bold">Obligations de l'employeur :</span></p>

            <p>
                Code du Travail, article R4227-52, créé par le décret n°2008-244 du 7 mars 2008. <br>
                L'employeur établit et met à jour un document relatif à la protection contre les explosions, intégré au document unique d'évaluation des risques.<br>
                Ce document comporte les informations relatives au respect des obligations définies aux articles R. 4227-44 à R. 4227-48 du Code du Travail, notamment :<br>
                1° La détermination et l'évaluation des risques d'explosion<br>
                2° La nature des mesures prises pour assurer le respect des objectifs définis à la présente section<br>
                3° La classification en zones des emplacements dans lesquels des atmosphères explosives peuvent se présenter<br>
                4° Les emplacements auxquels s'appliquent les prescriptions minimales prévues par l'article R. 4227-50<br>
                5° Modalités et les règles selon lesquelles les lieux et les équipements de travail, y compris les dispositifs d'alarme, sont conçus, utilisés et entretenus pour assurer la sécurité<br>
                6° Le cas échéant, la liste des travaux devant être accomplis selon les instructions écrites de l'employeur ou dont l'exécution est subordonnée à la délivrance d'une autorisation par l'employeur ou par une personne habilitée par celui-ci à cet effet<br>
                7° La nature des dispositions prises pour que l'utilisation des équipements de travail soit sûre, conformément aux dispositions prévues au livre III<br>
            </p>

            <p class="text-color-green">2. Probabilité d'une atmosphère explosive</p>

            <p>
                1. Identifier les matières inflammables présentes ou pouvant se former sur le site (liquides inflammables, gaz combustibles, poussières combustibles)<br>
                2. Identifier les sources de dégagement (stockages, process, fuites)<br>
                3. Quantifier le dégagement en terme de degré :<br>
                Continu : dégagement qui se produit en permanence ou dont on s’attend à ce qu’il se produise pendant de longues périodes (+ de 1000 heures par an).<br>
                Premier degré : dégagement dont on s’attend à ce qu’il se produise de façon périodique ou occasionnelle en fonctionnement normal (10 à 1000 heures par an).<br>
                Deuxième degré : dégagement dont on s’attend à ce qu’il se produise de façon accidentelle (< 10 heures par an).<br>
                4. Quantifier le degré de ventilation (aptitude à diluer) :<br>
                - Ventilation forte : Elle est capable de réduire la concentration à la source de dégagement de façon pratiquement instantanée, ce qui conduit à une concentration inférieure à la limite inférieure d’explosivité. Il en résulte une zone d’étendue négligeable.<br>
                - Ventilation moyenne : Elle est capable de maîtriser la concentration, ce qui conduit à une situation stable dans la limite de la zone pendant que le dégagement est en cours, et dans laquelle l’atmosphère explosible ne persiste pas de façon indue après la fin du dégagement. <br>
                - Ventilation faible : Elle ne peut maîtriser la concentration pendant que le dégagement est en cours et/ou ne peut empêcher que l’atmosphère explosible persiste de façon indue après la fin du dégagement.<br>
            </p>

        </div>

        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">LES RISQUES D'EXPLOSIONS</p>
        </div>
    </section>


    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body body--rules">

            <p>
                5. Qualifier la disponibilité de la ventilation (fiabilité) :<br>
                - Bonne : la ventilation existe pratiquement en permanence.<br>
                - Assez bonne : on s’attend à ce que la ventilation existe pendant le fonctionnement normal. Des interruptions sont permises, pourvu qu’elles se produisent de façon peu fréquente et pour de courtes périodes.<br>
                - Faible : la ventilation ne satisfait pas aux critères d’une ventilation bonne ou assez bonne, toutefois, on ne prévoit pas qu’il y ait des interruptions prolongées.<br>
                6. Caractériser le type et l'étendue de la zone : 0, 1, 2 et 20, 21, 22, END (Emplacement Non Dangereux) selon le paragraphe ci-après.<br>
            </p>

            <p class="text-color-green">3. Identification des zones ATEX :</p>

            <p>
                Les zones ATEX sont des zones potentiellement explosibles, c'est-à-dire qu'en présence d'une source d'inflammation, une explosion peut se produire, Pour avoir une zone ATEX, toutes les conditions de l'hexagone ci-dessus doivent donc être réunies, à l'exception de la source d'inflammation,
                Il existe 6 types de zones, qui sont définies en fonction de la probabilité d'existence d'une zone potentiellement explosible :
            </p>

            <p>
                <span class="bold">Pour les atmosphères explosives gazeuses :</span><br>
                Zone 0 : emplacement où une atmosphère explosive consistant en un mélange avec l'air de substances inflammables sous forme de gaz, de vapeur ou de brouillard est présente en permanence, pendant de longues périodes ou fréquemment.<br>
                Zone 1 : emplacement où une atmosphère explosive consistant en un mélange d'air et de substances inflammables sous forme de gaz, de vapeur ou de brouillard est susceptible de se présenter occasionnellement en fonctionnement normal.<br>
                Zone 2 : emplacement où une atmosphère explosive consistant en un mélange avec l'air de substances inflammables sous forme de gaz, de vapeur ou de brouillard n'est pas susceptible de se présenter en fonctionnement normal ou, si elle se présente néanmoins, elle n'est que de courte durée.<br>
            </p>

            <p>
                <span class="bold">Pour les atmosphères explosives poussières :</span><br>
                Zone 20 : emplacement où une atmosphère explosive sous forme de nuage de poussières combustibles est présente dans l'air en permanence, pendant de longues périodes ou fréquemment.<br>
                Zone 21 : emplacement où une atmosphère explosive sous forme de nuage de poussières combustibles est susceptible de se présenter occasionnellement en fonctionnement normal.<br>
                Zone 22 : emplacement où une atmosphère explosive sous forme de nuage de poussières combustibles n'est pas susceptible de se présenter en fonctionnement normal ou, si elle se présente néanmoins, elle n'est que de courte durée.<br>
                L'analyse des zones ATEX ne se fait qu'en fonctionnement normal. Seul des dysfonctionnement raisonnablement prévisibles sont étudiés (fuite, renversement …)<br>
            </p>

            <p class="text-color-green">4. Analyse du risque d'ignition</p>

            <p>
                <span class="bold">Types de sources d'ignition</span><br>
                Dans chaque zone ATEX identifiée on considèrera le types de sources d’inflammation suivant :<br>
                risque fumeur,<br>
                risque foudre,<br>
                risques liés aux travaux par point chaud,<br>
                risque électrique,<br>
                risque non électrique (température de surface, échauffement mécanique, ...), <br>
                risque électricité statique,...
            </p>

        </div>

        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">LES RISQUES D'EXPLOSIONS</p>
        </div>
    </section>


    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body body--rules">

            <p>
                <span class="bold">Probabilité d'apparition d'une source d'ignition</span> <br>
                La probabilité d'apparition d'une source d'ignition est établie après prise en compte des moyens de prévention et de protection existant et de leur fiabilité (contrôle) selon les 4 niveaux suivants :<br>
                Probabilité 4 : source présente constamment ou fréquemment, Ex : four<br>
                Probabilité 3 : pas présente constamment ou fréquemment, Ex : électricité statique, point chaud lié à un véhicule, choc métal/métal<br>
                Probabilité 2 : présente dans des circonstances rares, Ex : foudre<br>
                Probabilité 1 : présente dans des circonstances très rares, Ex : défaillance sur un équipement<br>
            </p>

            <p class="text-color-green">5. Evaluation de la criticité du risque d'explosion</p>

            <p>
                <span class="bold">Types de sources d'ignition</span><br>
                Dans chaque zone ATEX identifiée on considèrera le types de sources d’inflammation suivant :<br>
                risque fumeur,<br>
                risque foudre,<br>
                risques liés aux travaux par point chaud,<br>
                risque électrique,<br>
                risque non électrique (température de surface, échauffement mécanique, ...), <br>
                risque électricité statique,...
            </p>

            <p>
                <span class="bold">Probabilité d'apparition d'une source d'ignition</span><br>
                La criticité "<span class="text-color-green">Acceptable</span>" correspond à une explosion improbable, elle est associé à la couleur verte et ne nécessite pas d'amélioration.<br>
                La criticité "<span class="text-color-yellow">A améliorer</span>" correspond à une explosion peu probable, elle est associée à la couleur orange et nécessite une amélioration qui peut être planifiée à moyen terme.<br>
                La criticité "<span class="text-color-pink">Agir vite</span>" correspond à une explosion probable, elle est associée à la couleur rouge et nécessite une amélioration à planifier en priorité.<br>
                La criticité "<span class="text-color-red">STOP</span>" correspond à une explosion très probable, elle est associée à un fond rouge et nécessite l'arrêt des activités afin d'identifier et de mettre en place des actions de réduction de risques immédiates.<br>
            </p>

            <table class="table table--chemical">

                <thead>
                <tr>
                    <th></th>
                    <th>END</th>
                    <th>2</th>
                    <th>22</th>
                    <th>1</th>
                    <th>21</th>
                    <th>0</th>
                    <th>20</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>4</td>
                    <td><button class="btn btn-success btn-hidden">Acceptable</button></td>
                    <td><button class="btn btn-yellow btn-hidden">A améliorer</button></td>
                    <td><button class="btn btn-yellow btn-hidden">A améliorer</button></td>
                    <td><button class="btn btn-warn btn-hidden">Agir vite</button></td>
                    <td><button class="btn btn-warn btn-hidden">Agir vite</button></td>
                    <td><button class="btn btn-danger btn-hidden">STOP</button></td>
                    <td><button class="btn btn-danger btn-hidden">STOP</button></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><button class="btn btn-success btn-hidden">Acceptable</button></td>
                    <td><button class="btn btn-success btn-hidden">Acceptable</button></td>
                    <td><button class="btn btn-success btn-hidden">Acceptable</button></td>
                    <td><button class="btn btn-yellow btn-hidden">A améliorer</button></td>
                    <td><button class="btn btn-yellow btn-hidden">A améliorer</button></td>
                    <td><button class="btn btn-warn btn-hidden">Agir vite</button></td>
                    <td><button class="btn btn-warn btn-hidden">Agir vite</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><button class="btn btn-success btn-hidden">Acceptable</button></td>
                    <td><button class="btn btn-success btn-hidden">Acceptable</button></td>
                    <td><button class="btn btn-success btn-hidden">Acceptable</button></td>
                    <td><button class="btn btn-success btn-hidden">Acceptable</button></td>
                    <td><button class="btn btn-success btn-hidden">Acceptable</button></td>
                    <td><button class="btn btn-yellow btn-hidden">A améliorer</button></td>
                    <td><button class="btn btn-yellow btn-hidden">A améliorer</button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td><button class="btn btn-success btn-hidden">Acceptable</button></td>
                    <td><button class="btn btn-success btn-hidden">Acceptable</button></td>
                    <td><button class="btn btn-success btn-hidden">Acceptable</button></td>
                    <td><button class="btn btn-success btn-hidden">Acceptable</button></td>
                    <td><button class="btn btn-success btn-hidden">Acceptable</button></td>
                    <td><button class="btn btn-success btn-hidden">Acceptable</button></td>
                    <td><button class="btn btn-success btn-hidden">Acceptable</button></td>
                </tr>
                </tbody>

            </table>
            <p>L’annotation END signifie Emplacement Non Dangereux</p>

        </div>

        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">LES RISQUES D'EXPLOSIONS</p>
        </div>
    </section>


    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body body--rules">

            <p class="text-color-green">6. Cas particuliers</p>

            <p>
                <span class="bold">Appareils à gaz</span> <br>
                Ces appareils sont exclus du champ d’application réglementaire considéré ici ; ils font en effet obligatoirement l’objet d’un marquage CE attestant de leur niveau de sécurité par rapport au risque de fuite de gaz, et échappent de fait à l’obligation de marquage ATEX.<br>
                Sont en particulier concernés ici :<br>
                -          les chalumeaux,<br>
                -          les chaudières gaz,<br>
                -          les étuves,<br>
                -          les becs bunsen,<br>
                -          les gazinières.<br>
                Toutefois, concernant l’identification et la classification des zones dangereuses, nous retenons ici les zones susceptibles d’être créées par des fuites de gaz autres qu’à l’intérieur de ces équipements (par exemple autre qu’à l’intérieur d’un four ou d’une chaudière), pour permettre de s’assurer ultérieurement de l’aptitude des appareils autres qu’appareils à gaz à fonctionner dans de telles zones.<br>
            </p>

            <p>
                <span class="bold">Emplacements en plein air</span><br>
                De manière générale, les conditions de ventilation offertes par les emplacements en plein air seront considérées comme de degré « moyen », et de disponibilité « bonne ».
            </p>

            <p>
                <span class="bold">Produits comburants et réactions chimiques</span><br>
                Les risques liés spécifiquement aux produits comburants (oxygène, bioxyde de chlore, chlorate de soude) ou aux réactions chimiques potentiellement explosives ne sont pas pris en compte dans le cadre de la présente analyse (ces phénomènes étant indépendants de la maîtrise des sources d’ignition).
            </p>

            <p class="text-color-green">7. Remarques générales</p>

            <p>
                Concernant l’utilisation de produits étiquetés inflammables, le stockage de faibles quantités de récipients contenant des liquides inflammables ne nécessite pas de classement.<br>
                Les produits chimiques doivent être stockés en respectant les règles de compatibilité et de rétention des produits chimiques.<br>
                Concernant les stockages de bidons type carburants pour véhicules, l’absence de zone en cas de déversement accidentel pourra être envisagée si des mesures particulières de prévention sont mises en œuvre, comme par exemple l’utilisation exclusive de contenant renforcés, équipés de dispositifs anti-renversements, …<br>
            </p>

        </div>

        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">LES RISQUES D'EXPLOSIONS</p>
        </div>
    </section>

    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body body--notif">
            <h1 class="head-title" >9. DRPCE</h1>

            <table class="table table--chemical-data">
                <thead>
                <tr>
                    <th colspan="14" class="green text-color-white">ÉVALUATION DES RISQUE D'EXPLOSION</th>
                </tr>
                <tr>
                    <th class="th_cat center theader" colspan="8">Zonage</th>
                    <th class="th_cat center theader" colspan="2">Type de zone</th>
                    <th class="th_cat center theader" colspan="3">Ignition</th>
                    <th class="th_criticality theader" rowspan="2" style="width: 8%">Criticité</th>
                </tr>
                <tr>
                    <th class="th_material_explosion theader">Matière explosible</th>
                    <th class="th_features theader">Caractéristiques phases H</th>
                    <th class="th_material_setup theader">Matériel Installation</th>
                    <th class="th_source_clean theader">Source de dégagement</th>
                    <th class="th_degree_clean theader">Degré de dégagement</th>
                    <th class="th_degree_ventilation theader">Degré de ventilation</th>
                    <th class="th_availability_ventilation theader">Disponibilité de la ventilation</th>
                    <th class="th_size_area theader">Volume de la zone</th>
                    <th class="th_gas theader" style="width: 5%">Gaz</th>
                    <th class="th_dust theader" style="width: 5%">Poussière</th>
                    <th class="th_spawn_probability theader" style="width: 6%">Probabilité d'apparition</th>
                    <th class="th_prevention theader">Moyens de prévention existants</th>
                    <th class="th_prevention_probability theader" style="width: 5%">Probabilité avec prévention</th>
                </tr>
                </thead>
                <tbody>
                @if(count($sd_risks_explosions) > 0)
                    @foreach($sd_risks_explosions as $sd_risk)
                        <tr>
                            <td class="td_material_explosion">{{ $sd_risk->material_explosion }}</td>
                            <td class="td_features">{{ $sd_risk->features }}</td>
                            <td class="td_material_setup">{{ $sd_risk->material_setup }}</td>
                            <td class="td_source_clean">{{$sd_risk->source_clean}}</td>
                            <td class="td_degree_clean">{{$sd_risk->degree_clean}}</td>
                            <td class="td_degree_ventilation">{{$sd_risk->degree_ventilation}}</td>
                            <td class="td_availability_ventilation">{{$sd_risk->availability_ventilation}}</td>
                            <td class="td_size_area">{{$sd_risk->size_area}}</td>
                            <td class="td_gas">{{$sd_risk->gas}}</td>
                            <td class="td_dust">{{$sd_risk->dust}}</td>
                            <td class="td_spawn_probability">{{$sd_risk->spawn_probability}}</td>
                            <td class="td_prevention">
                                @foreach($sd_risk->sd_preventions as $sd_prevention)
                                    - {{ $sd_prevention->name }} <br>
                                @endforeach
                            </td>
                            <td class="td_prevention_probability">{{$sd_risk->prevention_probability}}</td>
                            <td class="td_p10 cat_danger {{$sd_risk->criticality_PDF()['class']}} ">{{$sd_risk->criticality_PDF()['text']}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="14">Aucune données</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <p></p>

            <p></p>
        </div>


        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">LES RISQUES D'EXPLOSIONS</p>
        </div>
    </section>


    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}
                , {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body body--notif">
            <h1 class="head-title">9. DRPCE</h1>

            <table class="table table--chemical-data">
                <thead>
                <tr>
                    <th colspan="7" class="green text-color-white">PLAN D'ACTION DE RÉDUCTION DU RISQUE D'EXPLOSION</th>
                </tr>
                <tr>
                    <th class="th_material_explosion center theader" rowspan="2">Matière explosible</th>
                    <th class="th_cat center theader" colspan="2">Produit concerné</th>
                    <th class="th_criticality theader" rowspan="2">Criticité</th>
                    <th class="th_restraint theader" rowspan="2" style="width: 35%">Mesure de prévention et de protection proposées</th>
                    <th class="th_date center theader" rowspan="2" >Date de réalisation</th>
                    <th class="th_actions center theader" rowspan="2">Commentaire, complément, autres actions</th>
                </tr>
                <tr>
                    <th class="th_gas theader">Gaz</th>
                    <th class="th_dust theader">Poussière</th>
                </tr>
                </thead>
                <tbody>
                @if(count($sd_risks_explosions) > 0)
                    @foreach($sd_risks_explosions as $sd_risk)
                        @if(isset($sd_risk->sd_restraints_exist[0]))
                            @foreach($sd_risk->sd_restraints_exist as $sd_restraint)
                                <tr>
                                    <td class="td_material_explosion">{{ $sd_risk->material_explosion }}</td>
                                    <td class="td_gas">{{ $sd_risk->gas }}</td>
                                    <td class="td_dust">{{ $sd_risk->dust }}</td>
                                    <td class="td_criticality {{ $sd_risk->criticality_PDF()['class'] }}">{{ $sd_risk->criticality_PDF()['text'] }}</td>
                                    <td class="td_restraint" style="text-align: left">{{ $sd_restraint->name }}</td>
                                    <td class="td_date">{{ $sd_restraint->date ? date("d/m/Y", strtotime($sd_restraint->date)) : "" }}</td>
                                    <td class="td_actions">{{ $sd_restraint->comment }}</td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">Aucune données</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <p></p>

            <p></p>
        </div>


        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">LES RISQUES D'EXPLOSIONS</p>
        </div>
    </section>

@endif

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
