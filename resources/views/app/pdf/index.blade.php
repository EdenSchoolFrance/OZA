<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF OZA</title>
    <link rel="stylesheet" href="{{ public_path('css/pdf/pdf.min.css') }}">
</head>
<?php setlocale(LC_TIME, 'French');?>
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
                <p class="info">Transcription des résultats de l'évaluation des risques pour la santé et la sécurité du personnel</p>
            </div>

            <img src="{{ public_path('storage/' . $single_document->client->id . '/' . $single_document->client->image) }}" alt="">

            <div class="info-single_document">
                <p> @if(count($single_document->histories) === 1) Document Unique élaboré le @else Mise à jour du DUERP le @endif: <span class="bold">{{ $date }}</span></p>
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
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body">
            <div class="header">
                <h1 class="title">Document Unique</h1>
                <p class="info">Article L4121-3-1 du Code du travail</p>
                <p class="info">Le document unique d'évaluation des risques professionnels est transmis par l'employeur à chaque mise à jour au service de prévention et de santé au travail auquel il adhère.</p>
            </div>
            <ul>
                <li class="bold"><p>Article R4121-4 du Code du Travail <br>Ce document unique d'évaluation des risques professionnels et ses versions antérieures sont tenus, pendant une durée de 40 ans à compter de leur élaboration, à la disposition de :</p></li>
                <li>
                    <p>
                        1° Des travailleurs et des anciens travailleurs pour les versions en vigueur durant leur période d'activité dans l'entreprise.
                        La communication des versions du document unique antérieures à celle en vigueur à la date de la demande peut être limitée aux seuls éléments afférents à l'activité du demandeur.
                        Les travailleurs et anciens travailleurs peuvent communiquer les éléments mis à leur disposition aux professionnels de santé en charge de leur suivi médical ;
                    </p>
                </li>
                <li><p>2° Des membres de la délégation du personnel du comité social et économique ;</p></li>
                <li><p>3° Des agents du système d'inspection du travail ;</p></li>
                <li><p>4° Des agents des services de prévention des organismes de sécurité sociale ;</p></li>
                <li><p>5° Des agents des organismes professionnels de santé, de sécurité et des conditions de travail des branches d'activités présentant des risques particuliers ;</p></li>
                <li><p>6° Des inspecteurs de la radioprotection et de la santé publique, en ce qui concerne les résultats des évaluations liées à l'exposition des travailleurs aux rayonnements ionisants, pour les installations et activités dont ils ont respectivement la charge.</p></li>
                <li>
                    <p>
                        Jusqu'à l'entrée en vigueur de l'obligation de dépôt du document unique d'évaluation des risques professionnels sur un portail numérique, l'employeur conserve les versions successives du document unique au sein de l'entreprise sous la forme d'un document papier ou dématérialisé.
                    </p>
                </li>
                <li>
                    <p>
                        Un avis indiquant les modalités d'accès des travailleurs au document unique est affiché à une place convenable et aisément accessible dans les lieux de travail. Dans les entreprises ou établissements dotés d'un règlement intérieur, cet avis est affiché au même emplacement que celui réservé au règlement intérieur.
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
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body">
            <h1 class="head-title">SOMMAIRE</h1>
            <ul class="list-item">
                <li>
                    <p><span class="line"><a href="#actu" class="link">ACTUALISATION DU DOCUMENT UNIQUE</a></span></p>
                </li>
                <li>
                    <p><span class="line"><a href="#structure" class="link">PRÉSENTATION DÉTAILLÉE DE LA STRUCTURE ET DES UNITÉS DE TAVAIL</a></span></p>
                </li>
                <li>
                    <span class="number">1</span>
                    <p><span class="line"><a href="#tabBord" class="link">TABLEAU DE BORD DE L’EVALUATION DES RISQUES</a></span></p>
                </li>
                <li>
                    <span class="number">2</span>
                    <p><span class="line"><a href="#proAnnuel" class="link">PROGRAMME ANNUEL DE PREVENTION ET D'AMELIORATION DES CONDITIONS DE TRAVAIL</a></span></p>
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
                    <p><span class="line"><a href="#evalRiskPro" class="link">EVALUATION DES RISQUES PROFESSIONNELS PAR <span class="bold">UNITÉ DE TRAVAIL</span>, classement alphabétique</a></span></p>
                </li>
                <li>
                    <span class="number">6</span>
                    <p><span class="line"><a href="#listPost" class="link">LISTE DES POSTES DE TRAVAIL A RISQUE PARTICULIER</a></span></p>
                </li>
                <li>
                    <span class="number">7</span>
                    <p><span class="line"><a href="#evalRiskPsycho" class="link">EVALUATION DETAILLEE DU RISQUE PSYCHOSOCIAL ET <span>PLAN D’ACTION</span></a></span></p>
                </li>
                <li>
                    <span class="number">8</span>
                    <p><span class="line"><a href="#evalRiskChimi" class="link">EVALUATION DETAILLEE DU RISQUE CHIMIQUE ET <span>PLAN D’ACTION</span></a></span></p>
                </li>
                <li>
                    <span class="number">9</span>
                    <p><span class="line"><a href="#explo" class="link">DOCUMENT RELATIF A LA PREVENTION CONTRE L’EXPLOSION ET <span>PLAN D’ACTION</span></a></span></p>
                </li>
                <li>
                    <span class="number">10</span>
                    <p><span class="line"><a href="#expoRiskPro" class="link">EXPOSITION AUX FACTEURS DE RISQUES PROFESSIONNELS ET <span>PLAN D’ACTION</span></a></span></p>
                </li>
                <li>
                    <span class="number">11</span>
                    <p><span class="line"><a href="#historie" class="link">HISTORIQUE DES ACTIONS REALISÉES</a></span></p>
                </li>
                <li class="no-border">
                    <p><span class="line">L'ensemble des annexes peuvent être consultées et imprimées depuis votre application DU OZA Online</span></p>
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
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
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
                        <td rowspan="2" class="theader"> Travail réalisé sur le DU <br><span class="description">(Mise à jour annuelle, mise à jour des actions, mise à jour des évaluations, ajout ou retrait de risques ou de préventions, …)</span></td>
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
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
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
                            {{ $single_document->client->name }}
                        </td>
                        <td>
                            <span class="bold">Téléphone : </span><br>
                            {{ $single_document->phone }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="bold">Adresse postale : </span><br>
                            {{ $single_document->adress }}
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
            <p class="text-color-red"><span class="bold">À noter :</span> le genre masculin, utilisé dans la rédaction de ce document, l’a été uniquement dans le but d’alléger sa rédaction et sa lecture.</p>
        </div>

        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">PRÉSENTATION DÉTAILLÉE DE LA STRUCTURE ET DES UNITÉS DE TAVAIL</p>
        </div>
    </section>

    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
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
        </div>

        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">PRÉSENTATION DÉTAILLÉE DE LA STRUCTURE ET DES UNITÉS DE TAVAIL</p>
        </div>
    </section>

    @foreach($single_document->work_unit as $key => $sd_work_unit)
        <section class="page">
            <div class="header">
                <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
            </div>

            <div class="body">
                @if($key === 0)
                    <p class="info text-color-red">
                        <span class="bold">Rappel :</span> Pour chaque unité de travail, l’évaluation des risques porte sur les activités principales.<br>
                        Lorsqu’une personne affectée à une unité de travail met en œuvre de la polyvalence sur d’autres unités de travail, l’exposition globale de la personne considérée doit être appréciée en fonction du temps travaillé dans chaque unité de travail en moyenne sur l’année.
                    </p>
                @endif
                <table class="table table--work_unit">
                    <thead>
                        <tr>
                            <th class="yellow" colspan="2">UNITÉ DE TRAVAIL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><span class="bold">{{ $sd_work_unit->name }}</span></td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    <span class="bold">Principale(s) activité(s) : </span><br>
                                    @foreach($sd_work_unit->activities as $activitie)
                                    - @stripTags($activitie->text) <br>
                                    @endforeach
                                </p>
                                <p>
                                    <span class="bold">Machine(s) : </span><br>
                                    @foreach($item_mat->sub_items as $sub_item)
                                        @if(count($sd_work_unit->items->where('sub_item_id', $sub_item->id)) !== 0)
                                            {{ $sub_item->name }} : {{ $sd_work_unit->items->where('sub_item_id', $sub_item->id)->pluck('name')->implode(', ') }},
                                        @else
                                            {{ $sub_item->name }} : Néant
                                        @endif
                                        <br>
                                    @endforeach
                                </p>
                            </td>
                            <td>
                                <p>
                                    <span class="bold">Véhicule(s) : </span><br>
                                    @foreach($item_veh->sub_items as $sub_item)
                                        @if(count($sd_work_unit->items->where('sub_item_id', $sub_item->id)) !== 0)
                                            {{ $sub_item->name }} : {{ $sd_work_unit->items->where('sub_item_id', $sub_item->id)->pluck('name')->implode(', ') }},
                                        @else
                                            {{ $sub_item->name }} : Néant
                                        @endif
                                        <br>
                                    @endforeach
                                </p>
                                <p>
                                    <span class="bold">Engin(s) et appareil(s) de manutention mécanique : </span><br>
                                    @foreach($item_eng->sub_items as $sub_item)
                                        @if(count($sd_work_unit->items->where('sub_item_id', $sub_item->id)) !== 0)
                                            {{ $sub_item->name }} : {{ $sd_work_unit->items->where('sub_item_id', $sub_item->id)->pluck('name')->implode(', ') }},
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
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body">
            <h1 class="head-title" id="tabBord">1. TABLEAU DE BORD DE L'ÉVALUATION DES RISQUES</h1>
            <table class="table table--no-border table--dashboard">
                <tr>
                    <td>
                        <div>
                            <p class="bold">Risque brut moyen</p>
                            <p>
                                Permet de situer le niveau de risque total de la structure, évalué sans prendre en compte les mesures de prévention ; sur une échelle de zéro (risque nul) à 50 (risque maximal).
                            </p>
                            <p class="{{ $single_document->color($single_document->moyenneRB(),true) }} number">{{ $single_document->moyenneRB() }}</p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <p class="bold">Réduction du risque</p>
                            <p>
                                Réduction du risque BRUT grâce aux mesures de prévention existantes : met en évidence les efforts de prévention de la structure.
                            </p>
                            <p class="text-color-green number">{{ $single_document->discountRisk() }} %</p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <p class="bold">Risque résiduel moyen</p>
                            <p>
                                Permet de situer le niveau de risque actuel de la structure, en prenant en compte les mesures de prévention existantes ;
                                sur une échelle de zéro (risque nul) à 50 (risque maximal).
                            </p>
                            <p class="{{ $single_document->color($single_document->moyenneRR(),false) }} number">{{ $single_document->moyenneRR() }}</p>
                        </div>
                    </td>
                </tr>
            </table>
            <p class="center bold">Risque résiduel</p>
            <img src="{{ $chartUrl }}" alt="" class="chart-risk">
        </div>

        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">TABLEAU DE BORD DE L’EVALUATION DES RISQUES </p>
        </div>
    </section>

    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body body--notif">
            <h1 class="head-title" id="proAnnuel">2. PROGRAMME ANNUEL DE PREVENTION ET D'AMELIORATION DES CONDITIONS DE TRAVAIL</h1>
            <p class="bold">Le PROGRAMME ANNUEL DE PREVENTION ET D'AMELIORATION DES CONDITIONS DE TRAVAIL reprend et présente tous les risques identifiés et évalués dans le chapitre 5 "Evaluation des risques" classés ici selon leur criticité (priorité) dans la colonne "Criticité".</p>
            <p class="bold">Le PROGRAMME ANNUEL DE PREVENTION ET D'AMELIORATION DES CONDITIONS DE TRAVAIL reprend et présente également toutes les situations de "non-conformité réglementaire" dans la colonne "Mesures de prévention et de protection à mettre en place", sous le libellé "Obligation réglementaire".</p>
            <p>
                <span class="bold">Colonne "Mesures de prévention et de protection à mettre en place" :</span><br>
                Les mesures de prévention et de protection proposées se déclinent en 3 catégories énoncées dans les 9 principes de prévention de l'article L.4121-2 du Code du Travail (Loi n° 91-1414 du 31 décembre 1991 art. 1 Journal Officiel du 7 janvier 1992 en vigueur le 31 décembre 1992) :<br>
                - Mesure Technique, <br>
                - Mesure Organisationnelle, <br>
                - Mesure Humaine (Information et formation, protection collective et individuelle).
            </p>
            <p>
                <span class="">L'employeur décidera quelle(s) mesure(s) proposée(s) il mettra en place.</span><br>
            </p>
            <p>
                <span class="bold">Colonne "Date de réalisation prévue, Conditions d’exécution, Estimation du coût, Ressources nécessaires" :</span><br>
                Inscrire ici la date planifiée par l'employeur pour la réalisation des actions de prévention ou de protection qu'il a validé,<br>
                Inscrire ici la date de réalisation prévue, les conditions d’exécution, l'estimation du coût, et les ressources nécessaires pour la mise en œuvre des actions validées qui seront mises en place.<br>
                Préciser également les actions que l'employeur ne valide pas et qui ne seront pas mises en place. <br>
            </p>
            <p>
                <span class="bold">Colonne « Date de réalisation » :</span>
                Inscrire la date à laquelle l'action de prévention ou de protection a réellement été mise en place et a été opérationnelle.<br>
            </p>
        </div>

        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">PROGRAMME ANNUEL DE PREVENTION ET D'AMELIORATION DES CONDITIONS DE TRAVAIL</p>
        </div>
    </section>

    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body">
            <table class="table table--action-plan">
                <thead>
                    <tr>
                        <th colspan="8" class="green">2. PROGRAMME ANNUEL DE PREVENTION ET D'AMELIORATION DES CONDITIONS DE TRAVAIL</th>
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
                        <td class="theader">
                            Risque résiduel
                        </td>
                        <td class="theader">
                            Criticité = situation actuelle
                        </td>
                        <td class="theader">
                            Mesures de prévention et de protection proposées
                        </td>
                        <td class="theader">
                            Date de réalisation prévue <br> Conditions d’exécution <br> Estimation du coût <br> Ressources nécessaires
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
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body body--notif">
            <h1 class="head-title" id="rules">3. RAPPEL RÉGLEMENTAIRE "DOCUMENT UNIQUE"</h1>
            <p class="bold">L’EVALUATION DES RISQUES, LE DOCUMENT UNIQUE ET SON ANNEXE « FACTEURS DE RISQUES PROFESSIONNELS »</p>
            <p>
                <span class="bold">1. Pourquoi évaluer les risques professionnels ?</span><br>
                L’évaluation des risques professionnels est imposée par le Code du Travail à tout employeur, dès lors qu’il emploie au moins un salarié. Code du travail, article R4121-1 :<br>
                - « L’employeur transcrit et met à jour dans un document unique les résultats de l’évaluation des risques pour la santé et la sécurité des travailleurs à laquelle il procède en application de l’article L. 4121-3.<br>
                - Cette évaluation comporte un inventaire des risques identifiés dans chaque unité de travail de l’entreprise ou de l’établissement, y compris ceux liés aux ambiances thermiques. »
            </p>
            <p>
                Au-delà de cette obligation réglementaire, l’évaluation des risques s’inscrit logiquement dans toute démarche de prévention dont elle constitue la première et incontournable étape.<br>
                Le point de départ de l’évaluation des risques réside dans la volonté du législateur de réduire le nombre des accidents du travail et des maladies professionnelles.
            </p>
            <p>
                <span class="bold">2. De quoi parle-t-on ?</span><br>
                <span class="bold">2.1. Définitions</span><br>
                Le dictionnaire LAROUSSE définit l’<span class="bold">ACCIDENT</span> comme : « un événement fortuit qui a des effets plus ou moins dommageables pour les personnes ou pour les choses ».<br>
                De fait l’accident est la concrétisation d’un <span class="bold">RISQUE.</span><br>
                <span class="bold">- Sans danger, pas de risque,</span><br>
                <span class="bold">- Sans exposition au danger, pas de risque,</span><br>
                <span class="bold">- Sans risque pas d’accident.</span>
            </p>
            <p>
                <span class="bold">EXEMPLE</span><br>
                <span class="bold">L’accident : </span>Un salarié se coupe à l’index avec une tronçonneuse électroportative en tronçonnant un fer à béton.<br>
                Dans cet exemple, <br>
                <span class="bold">- Le danger</span> est constitué par la rotation du disque de la tronçonneuse. <br>
                <span class="bold">- Le risque</span> est constitué par la probabilité que le disque en rotation entre en contact avec une partie non protégée d’un être humain, en l’occurrence le salarié.<br>
            </p>
        </div>

        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">RAPPEL RÉGLEMENTAIRE "DOCUMENT UNIQUE"</p>
        </div>
    </section>

    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body body--notif">
            <p>
                On parlera ici de risque de coupure. <br>
                Ce risque de coupure peut être plus ou moins important. Il variera en fonction de ses deux paramètres constitutifs :<br>
                <span class="bold">- Le Danger et,</span> <br>
                <span class="bold">- Le Danger</span> <br>
                <span class="bold">Le danger</span> ne variera qu’en fonction de peu de paramètres, notamment la vitesse de rotation et l’état du disque.<br>
                <span class="bold">L’exposition</span> variera en fonction de paramètres plus nombreux, notamment la protection du disque, la protection des doigts de la main, la
                connaissance du danger par l’utilisateur, la bonne utilisation de la tronçonneuse, la vitesse d’exécution du geste, la vigilance de l’utilisateur, etc. ... <br>
            </p>
            <p>
                <span class="bold">L’EVALUATION</span> est définie dans le dictionnaire LAROUSSE comme « l’action de déterminer la valeur de quelque chose ».<br>
                L’évaluation des risques consistera donc à déterminer la valeur des risques. Pour cela il faudra identifier et caractériser les dangers, et identifier et
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
                L'article L. 4121-2 du code du travail énonce les 9 principes qui doivent guider la démarche de prévention de tout employeur :<br>
                1° Eviter les risques ; <br>
                2° <span class="bold">Evaluer les risques</span> qui ne peuvent pas être évités ; <br>
                3° Combattre les risques à la source ; <br>
                4° Adapter le travail à l'homme, en particulier en ce qui concerne la conception des postes de travail ainsi que le choix des équipements de travail et
                des méthodes de travail et de production, en vue notamment de limiter le travail monotone et le travail cadencé et de réduire les effets de ceux-ci sur
                la santé ;<br>
                5° Tenir compte de l'état d'évolution de la technique ; <br>
                6° Remplacer ce qui est dangereux par ce qui n'est pas dangereux ou par ce qui est moins dangereux ;<br>
                7° Planifier la prévention en y intégrant, dans un ensemble cohérent, la technique, l'organisation du travail, les conditions de travail, les relations
                sociales et l'influence des facteurs ambiants, notamment les risques liés au harcèlement moral et au harcèlement sexuel, tels qu'ils sont définis aux
                articles L. 1152-1 et L. 1153-1 ; ainsi que ceux liés aux agissements sexistes définis à l'article L. 1142-2-1<br>
                8° Prendre des mesures de protection collective en leur donnant la priorité sur les mesures de protection individuelle ;<br>
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
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>
        <div class="body body--notif">
            <p>
                <span class="bold">
                    L’évaluation des risques est donc bien placée en tête des principes de prévention par le législateur. C’est elle qui apporte la cohésion
                    nécessaire à la 4ème partie (santé et sécurité au travail) du Code du travail, par sa retranscription dans le « DOCUMENT UNIQUE ».
                </span> <br>
                Le DU centralise en effet toutes les activités professionnelles, leurs dangers, leurs risques et leurs réglementations spécifiques, notamment (non
                exhaustif) : <br>
                - les facteurs de risque professionnels, <br>
                - les risques d’interférences encadrés par les réglementation « Plan de Prévention » et « PPSPS », <br>
                - les risques liés aux opérations de chargement et de déchargement encadrés par le « Protocole de sécurité transport »,<br>
                - les risques liés aux installations, matériels et outils encadrés par la réglementation des « vérifications périodiques »,<br>
                Le DU intègre également toutes les mesures de prévention en place dans l’entreprise. <br>
                Le DU intègre finalement le Plan d’action de réduction des risques ou « programme de prévention ». <br>
            </p>
            <p>
                <span class="bold">2.3. L’annexe d'évaluation de l'exposition aux FACTEURS DE RISQUES PROFESSIONNELS du Document Unique</span><br>
                L'employeur doit consigner en annexe du document unique (R. 4121-1-1) : <br>
                - L'évaluation des expositions individuelles aux facteurs de risques professionnels définis réglementairement. Il peut pour cela utiliser le cas échéant
                un accord collectif étendu ou un référentiel professionnel de branche homologué. <br>
                - La proportion de salariés exposés au-delà des seuils fixés pour les facteurs de risques professionnels. Cette proportion est actualisée en tant que
                de besoin lors de la mise à jour du Document Unique. <br>
            </p>
            <p>
                <span class="bold">2.3.1. Que sont les FACTEURS DE RISQUES PROFESSIONNELS</span> <br>
                Le Code du travail (articles L4161-1 et D4161-1-1) et le Décret n° 2017-1769 du 27/12/2017 définissent les facteurs de risques professionnels comme
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
                - Travail répétitif caractérisé par la réalisation de travaux impliquant l’exécution de mouvements répétés, sollicitant tout ou partie
                du membre supérieur, à une fréquence élevée et sous cadence contrainte. <br>
                Depuis le 01/10/2017, seuls les 6 derniers facteurs de risques ci-dessus sont associés à des seuils définis réglementairement (art. D4161-2).<br>
                L'exposition aux 10 facteurs de risques professionnels est donc évaluée dans votre Document Unique, mais seule l'exposition aux 6 facteurs de
                risques associés à un seuil est évaluée précisément par rapport aux seuils réglementaires dans l'annexe d'évaluation de l'exposition aux FACTEURS
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
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>
        <div class="body body--notif">
            <p>
                <span class="bold">2.3.2. De la Prévention à la Compensation, le Compte Professionnel de Prévention (C2P)</span><br>
                Quand les mesures de prévention s’avèrent insuffisantes, certains risques peuvent occasionner ; lorsque l’exposition se situe au-delà de certains
                seuils, eux aussi définis réglementairement ; des dommages durables, identifiables et irréversibles sur sa santé des salariés.<br>
                Le législateur a donc instauré au bénéfice des salariés concernés un mécanisme de compensation : le Compte Professionnel de Prévention en
                vigueur depuis le 01/10/2017, qui est géré par la Caisse Nationale d’Assurance Maladie. <br>
                C’est elle qui informe les salariés de l’ouverture de leur compte et des points qu’ils ont acquis. <br>
            </p>
            <p>
                <span class="bold">2.3.2.1. Acquisition de points par les salariés exposés</span> <br>
                Les points accumulés sur le compte pourront être utilisés par les salariés pour financer : <br>
                - Une formation permettant de s’orienter vers un emploi non exposé ou moins exposé à des facteurs de risque professionnels,<br>
                - Un complément de rémunération lors d’un passage à temps partiel, <br>
                - Un départ anticipé à la retraite. <br>
            </p>
            <p>
                <span class="bold">2.3.2.2. Déclaration annuelle des expositions aux facteurs de risques professionnels</span><br>
                - Pour les travailleurs titulaires d'un contrat de travail qui demeure en cours à la fin de l'année civile, l'employeur déclare au terme de chaque année
                civile et au plus tard au titre de la paie du mois de décembre, le ou les facteurs de risques professionnels auxquels ils ont été exposés au-delà des
                seuils fixés réglementairement au cours de l'année civile considérée. <br>
                - Pour les travailleurs titulaires d'un contrat de travail d'une durée supérieure ou égale à un mois qui s'achève au cours de l'année civile, l'employeur
                déclare au plus tard lors de la paie effectuée au titre de la fin de ce contrat de travail le ou les facteurs de risques professionnels auxquels ils ont été
                exposés au cours de la période considérée. <br>
                Dans les deux cas, l’employeur effectue sa déclaration auprès des caisses de Sécurité Sociale dans le cadre de la DSN.<br>
                L'employeur peut rectifier sa déclaration des facteurs de risques professionnels : <br>
                - Jusqu'au 5 ou au 15 avril de l'année qui suit celle au titre de laquelle elle a été effectuée, selon l'échéance du paiement des cotisations qui lui est
                applicable ; <br>
                - Dans les cas où la rectification est faite en faveur du salarié, pendant une période de trois ans.<br>
            </p>
            <p>
                <span class="bold"> 3. Comment évaluer les risques et comment rédiger le Document Unique et son annexe des risques professionnels dans une logique de prévention ?</span><br>
                <span class="bold">3.1. Qui fait quoi</span><br>
                S’il n’impose aucune forme pour rédiger le Document Unique, le législateur impose à l’employeur d’utiliser une (des) personne(s) compétente(s) afin
                d’effectuer l’évaluation des risques et sa retranscription dans le Document Unique. <br>
                En effet, depuis le 1er juillet 2012 le Code du travail fait obligation à tout employeur de « désigner un ou plusieurs salariés compétents pour s'occuper
                des activités de protection et de prévention des risques professionnels de l'entreprise ». <br>
                Ce ou ces salarié(s) dispose(nt) donc des compétences nécessaires à la définition d’une méthode et d’un outil d’évaluation des risques adaptés à
                l’entreprise. <br>
                Cependant, « si les compétences dans l'entreprise ne permettent pas d'organiser ces activités, l'employeur peut faire appel, aux intervenants en
                prévention des risques professionnels (IPRP) appartenant au service de santé au travail auquel il adhère ou enregistrés auprès de la DIRECCTE.
                L’employeur peut en outre faire appel à d’autres ressources extérieures (CARSAT, INRS, OPPBTP, ANACT, à des consultants...) ».<br>
            </p>

        </div>
        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">RAPPEL RÉGLEMENTAIRE "DOCUMENT UNIQUE"</p>
        </div>
    </section>

    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>
        <div class="body body--notif">
            <p>
                <span class="bold">3.2. Quelles méthodes et quels outils ?</span>
                Le législateur n’impose aucune méthode ni aucune forme pour l’évaluation des risques et la rédaction du Document Unique. Le second alinéa de
                l’article R4121-1 du code du travail précise néanmoins : « Cette évaluation comporte un inventaire des risques identifiés dans chaque unité de travail
                de l'entreprise ou de l'établissement, y compris ceux liés aux ambiances thermiques ». <br>
                Les composants incontournables du Document Unique sont : <br>
                - Un inventaire des risques identifiés dans chaque unité de travail de l'entreprise ou de l'établissement, notamment :<br>
                - - L'évaluation des risques liés aux ambiances thermiques. <br>
                - - L'évaluation des risques psychosociaux. <br>
                - - L'évaluation des risques d'exposition aux agents chimiques à réaliser selon les prescriptions de l'article R.4412-6 du Code du travail. <br>
                - - L’évaluation des risques d’exposition aux champs électromagnétiques selon les critères précisés (art R. 4453-8). <br>
            </p>
            <p>
                - Une hiérarchisation des risques identifiés et évalués dans l'inventaire. <br>
                - Un plan d'action de réduction des risques identifiés, évalués et hiérarchisés. <br>
                - L'annexe d'évaluation de l'exposition aux risques professionnels. <br>
                - Le Document Relatif à la Prévention Contre l'Explosion. <br>
            </p>
            <p>
                <span class="bold">3.2.1. Comment rédiger son Document Unique ?</span> <br>
                Le mode opératoire d'évaluation des risques est présenté dans la "Notice explicative de l'évaluation des risques" ci-contre.<br>
            </p>
            <p>
                <span class="bold">3.2.2. Comment rédiger son annexe d'évaluation de l'exposition aux facteurs de risques professionnels</span><br>
                Sur ce sujet le législateur a posé un cadre précis puisque pour 6 des 10 facteurs de risques, il existe un seuil d’exposition qui déclenche le mécanisme
                de réparation. <br>
            </p>
            <p>
                <span class="bold">3.2.3. Réalisation du diagnostic « d'exposition aux facteurs de risques professionnels »</span><br>
                On évaluera pour chaque poste de travail, l'exposition à chacun des 6 facteurs de risque de l'article D.4161-2 du Code du travail ; au regard des
                conditions habituelles de travail caractérisant le poste ; appréciées après application des mesures de protection collective et individuelle existantes.<br>
                Si pour tous les postes de l'entreprise, dans le cas le plus défavorable, l'exposition ne dépasse pas le seuil d'un des 6 facteurs de risque, on
                considèrera qu'aucun salarié n'est exposé au delà d'un seuil de pénibilité. <br>
                Si un au moins des seuils est dépassé à un poste de travail, on évaluera l’exposition de tous les salariés titulaires d'un contrat de travail d'une durée
                d'au moins un mois, quelle que soit la nature du contrat (CDI, CDD, intérim, apprentissage, etc.) qui ont travaillé à ce poste au cours de l'année, au
                prorata de leur temps de travail annuel à ce poste. <br>
                L'exposition de chaque salarié sera apprécié au regard des conditions habituelles de travail caractérisant le poste ou l'ensemble des postes occupé(s)
                en moyenne sur l'année entière ; que le contrat de travail porte sur l'année entière ou non. Dans ce dernier cas, l'exposition sera extrapolée en
                moyenne sur l'année complète. <br>
                L'exposition d’un salarié à temps partiel sera exactement équivalente à celle d’un salarié à temps plein (en pratique, un salarié à temps partiel
                n’atteindra probablement pas les seuils annuels). <br>
                Les périodes d'absence seront prises en compte dès lors qu'elles remettent manifestement en cause l'exposition au-delà des seuils caractérisant le ou
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
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>
        <div class="body body--notif">
            <h1 class="head-title" id="evalRisk">4. NOTICE EXPLICATIVE DE L'EVALUATION DES RISQUES</h1>
            <p>
                <span class="bold">EVALUATION DES RISQUES PROFESSIONNELS :</span> De gauche à droite du tableau d'évaluation des risques
            </p>
            <p>
                <span class="bold">Unité de travail</span> <br>
                L'article R.4121-1 du Code du travail "DOCUMENT UNIQUE D'EVALUATION DES RISQUES" précise : <br>
                "Cette évaluation comporte un inventaire des risques identifiés dans chaque unité de travail de l'entreprise ou de l'établissement".<br>
                Le législateur n'a pas défini "l'unité de travail". Nous l'entendons ici comme un poste de travail, un métier ou une activité.<br>
                <span class="bold">Les unités de travail sont détaillées dans la partie "Présentation de la structure" de ce Document Unique.</span>
            </p>
            <p>
                <span class="bold">DANGER et dommages potentiels à la personne</span> <br>
                Le danger est la propriété intrinsèque d'un agent (physique, chimique, biologique) susceptible d'avoir un effet nuisible sur l'Homme. Plus le potentiel de
                nuisance est élevé, plus les conséquences sur l'Homme sont importantes. On parlera des conséquences sur la santé de l'Homme (santé physique et
                santé mentale). La liste des dangers considérés dans ce Document Unique est présente à la fin de ce chapitre.<br>
                Nous listons ici tous les dangers potentiellement présents sur les lieux de travail et leurs conséquences potentielles.<br>
            </p>
            <p>
                <span class="bold">RISQUE, phase de travail modes et caractéristiques de l'exposition (outil, matériel, produit, situation, opération, fréquence, durée)</span><br>
                Nous décrirons ici l'activité professionnelle réelle, en fonctionnement normal et en marche dégradée, en détaillant chaque phase de travail, et pour
                chacune d'elles, les modes et les caractéristiques de l'exposition.
            </p>
            <p>
                <span class="bold">Fréquence d'exposition</span><br>
                La fréquence d'exposition est évaluée selon une échelle à 5 niveaux : <br>
                - <span class="bold">"Moins de 1 fois par an"</span> correspond à une exposition extrêmement rare de moins de une fois par an, soit "1" dans la formule de calcul.<br>
                - <span class="bold">"An"</span> correspond à une exposition rare de une à plusieurs fois par an, soit "2" dans la formule de calcul.<br>
                - <span class="bold">"Mois"</span> correspond à une exposition peu fréquente de une à plusieurs fois par mois, soit "3" dans la formule de calcul.<br>
                - <span class="bold">"Semaine"</span> correspond à une exposition fréquente de une à plusieurs fois par semaine, soit "4" dans la formule de calcul.<br>
                - <span class="bold">"Jour"</span> correspond à une exposition très fréquente, de une à plusieurs fois par jour, soit "5" dans la formule de calcul.<br>
            </p>
            <p>
                <span class="bold">Probabilité</span> <br>
                La probabilité de survenue d'un accident ou d'une atteinte à la santé doit être également évaluée, car la fréquence d'exposition à un danger n'est pas
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
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>
        <div class="body body--notif">
            <p>
                <span class="bold">Par exemple,</span> une personne emprunte plusieurs fois par jour un escalier en se tenant à la rampe. La fréquence d'exposition est maximale, mais cela
                ne signifie pas que cette personne aura un accident chaque jour dans cet escalier. La probabilité qu'elle chute dans cet escalier est "faible" ou "très
                faible". <br>
                La probabilité d'occurrence est évaluée selon une échelle à 5 niveaux : <br>
                - <span class="bold">"très faible"</span> = 0,5 # <span class="bold">"faible"</span> = 2 # <span class="bold">"non faible"</span> = 3 # <span class="bold">"élevée"</span> = 4 # <span class="bold">"très élevée"</span> = 5.<br>
                Les indices de fréquence et de probabilité permettent de définir une <span class="bold">"classe d'exposition"</span> comme suit : fréquence + probabilité = classe d'exposition
                La "classe d'exposition" varie de 1,5 à 10. <br>
            </p>
            <p>
                <span class="bold">Gravité potentielle</span> <br>
                La gravité potentielle des conséquences de l'exposition à un danger est évaluée selon une échelle à 5 niveaux :<br>
                - <span class="bold">"Impact faible"</span> correspond à une exposition sans conséquence sur la santé physique et mentale de la personne exposée.<br>
                - <span class="bold">"ASA"</span> correspond à un <span class="bold">A</span>ccident ou à une maladie professionnelle <span class="bold">S</span>ans <span class="bold">A</span>rrêt de travail. <br>
                - <span class="bold">"AAA"</span> correspond à un <span class="bold">A</span>ccident ou à une maladie professionnelle <span class="bold">A</span>vec <span class="bold">A</span>rrêt de travail, sans IPP (Incapacité Permanente Partielle*).<br>
                - <span class="bold">"IPP"</span> correspond à un accident ou à une maladie professionnelle avec arrêt de travail et avec IPP (<span class="bold">I</span>ncapacité <span class="bold">P</span>ermanente <span class="bold">P</span>artielle*).<br>
                - <span class="bold">"Décès"</span> correspond à au moins une maladie professionnelle avec Incapacité Permanente Totale ou au moins un décès.<br>
                * L'IPP est constatée lorsqu'il persiste des séquelles de l'accident du travail, alors que le salarié est déclaré apte.<br>
                Dans la formule de calcul, ces 5 niveaux sont côtés de la façon suivante : <br>
                "Impact faible" = 1 # "ASA" = 2 # "AAA" = 3 # "IPP" = 4 # "Décès" = 5 <br>
            </p>
            <p>
                <span class="bold">Impact différencié F / H</span> <br>
                Les lettres "F" pour Femme, ou "H" pour Homme sont utilisées pour identifier le cas échéant le sexe pour lequel la gravité est potentiellement la plus
                importante ; lorsqu'elle n'est pas égale pour les deux sexes (non concerné = "non"). <br>
                L'évaluation de l'impact différencié de l'exposition aux risques en fonction du sexe est en effet une exigence réglementaire. <br>
            </p>
            <p>
                <span class="bold">Risque brut</span> <br>
                Le risque brut correspond au niveau de risque évalué sans prendre en considération les mesures de prévention et de protection existantes.<br>
                Le risque brut correspond au produit de la classe d'exposition par la gravité (classe d'exposition x gravité).<br>
                Le risque brut varie de 1,5 à 50. <br>
            </p>
            <p>
                <span class="bold">Postes de travail à "RISQUE PARTICULIER"</span><br>
                Tous les postes de travail comportant au moins une situation de travail dont le risque brut est >= à 24 font partie de la "Liste des postes de travail à
                risque particulier".<br>
                Tous les salariés embauchés pour travailler à l'un de ces postes, en contrat de travail précaire (autre que CDI), doivent bénéficier d'une formation
                renforcée à la sécurité, ainsi que d'un accueil et d'une formation adaptés dans l'entreprise. <br>
                Liste établie par l'employeur, après avis du médecin du travail, du CHSCT ou, à défaut, des représentants du personnel, s'il en existe.<br>
                Liste tenue à la disposition des agents de contrôle des agents de l'inspection du travail (amende de 10 000 €uros en cas de non présentation art.<br>
            </p>
        </div>
        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">NOTICE EXPLICATIVE DE L'EVALUATION DES RISQUES</p>
        </div>
    </section>

    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>
        <div class="body body--notif">
            <p>
                <span class="bold">Mesures de prévention et de protection existantes</span> <br>
                Les mesures de prévention et de protection existantes se déclinent en 3 catégories énoncées dans les 9 principes de prévention de l'article L.4121-2
                du Code du Travail (Loi n° 91-1414 du 31 décembre 1991 art. 1 Journal Officiel du 7 janvier 1992 en vigueur le 31 décembre 1992) :<br>
                Mesure <span class="bold">Technique, Organisationnelle, Humaine (Information et formation, protection collective et individuelle).</span><br>
                Dans chaque catégorie, l'efficacité des différentes mesures de prévention existantes est présentée de la façon suivante :<br>
                - <span class="bold">"très bon"</span> = mesure existante très efficace : Technique = 6 ; Organisationnelle et Humaine = 3.<br>
                - <span class="bold">"bon"</span> = mesure existante de bonne efficacité : Technique = 4 ; Organisationnelle et Humaine = 2.<br>
                - <span class="bold">"moy"</span> = mesure existante d'efficacité moyenne : Technique = 2 ; Organisationnelle et Humaine = 1.<br>
                - <span class="bold">"0"</span> = mesure non existante.<br>
                Une pondération est appliquée à la somme des mesures de prévention selon les équivalences suivantes :<br>
                T+H+O = 12, pondération = 0,1 ; 11 0,15 ; 10 = 0,2 ; 9 = 0,25 ; 8 = 0,3 ; 7 = 0,35 ; 6 = 0,4 ; 5 = 0,5 ; 4 = 0,6 ; 3 = 0,7 ; 2 = 0,8 ; 1 = 0,9.<br>
                <span class="bold">Le risque résiduel correspond donc à : ((F + P) x G) x pondération de (T + O + H)</span>
            </p>
            <p>
                <span class="bold">Criticité = situation actuelle</span><br>
                Le Document Unique doit réglementairement permettre d’identifier les risques les plus critiques afin de planifier leur suppression ou leur réduction.<br>
                La « criticité » traduit donc les risques résiduels en « état de la situation actuelle » de la façon suivante :<br>
                <span class="text-color-green">« Acceptable »</span> associé à la couleur verte, elle correspond à une criticité &lt; 12,5.<br>
                La diminution de ce risque n’est pas une priorité. <br>
                <span class="text-color-orange">« A améliorer »</span> associé à la couleur jaune, elle correspond à une criticité >= 12,5.<br>
                La diminution de ces risque peut être planifiée à moyen / long terme. <br>
                <span class="text-color-pink">« Agir vite »</span> est associé à la couleur rose, elle correspond à une criticité >= 20.<br>
                La diminution de ces risques est à planifier en priorité. <br>
                <span class="text-color-red">« STOP »</span> est associé à la couleur rouge, elle correspond à une criticité >=30 <= 50.<br>
                Ces activités doivent être stoppées immédiatement afin d’identifier et de mettre en place une activité plus sûre.
            </p>
        </div>
        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">NOTICE EXPLICATIVE DE L'EVALUATION DES RISQUES</p>
        </div>
    </section>

    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>
        <div class="body body--rules">
            <h1 class="head-title" id="evalRiskPro">5. EVALUATION DES RISQUES PROFESSIONNELS PAR UNITÉ DE TRAVAIL</h1>
            <p class="bold">
                Liste des dangers considérés. <br>
                <span class="text-color-red">En gras, dangers présents uniquement dans la version « Conformité » du Document Unique OZA.</span>
            </p>
            <p>
                1. Absence d’une personne « compétente » pour s’occuper des activités de protection et de prévention des risques professionnels de la structure.
            </p>
            <p>
                2. Accident, presqu’accident et maladie du travail non ou mal analysés et prévenus pouvant générer la répétition de ces faits.
            </p>
            <p class="bold">
                3. Agents biologiques (bactéries, virus) pouvant générer infections, intoxications, allergies, cancers, zoonoses.
            </p>
            <p class="bold">
                4. Agents chimiques pouvant générer des intoxications aigües ou chroniques, cancers, brûlures.
            </p>
            <p class="bold">
                5. Agression et violence internes et externes, à caractère sexuel ou non, pouvant mettre en péril la santé et la sécurité des salariés, notamment : vols, rackets, agression physique, agression verbale.
            </p>
            <p>
                Le harcèlement sexuel se caractérise par le fait d’imposer à une personne, de façon répétée, des propos ou comportements à connotation sexuelle qui :<br>
                - portent atteinte à sa dignité en raison de leur caractère dégradant ou humiliant, ou<br>
                - créent à son encontre une situation intimidante, hostile ou offensante.<br>
                Est assimilée au harcèlement sexuel toute forme de pression grave (même non répétée) dans le but réel ou apparent d’obtenir un acte sexuel, au profit de l’auteur des faits ou d’un tiers.<br>
                Dans le milieu professionnel, il y a harcèlement sexuel même s’il n’y a aucune relation hiérarchique entre l’agressé(e) et l’auteur des faits (entre collègues de même niveau, de services différents…)<br>
                Si l’auteur des faits a eu un contact physique avec l’agressé(e) il peut s’agir d’une agression sexuelle, plus gravement punie.<br>
                La victime peut se retourner contre l’auteur des faits en portant plainte dans un délai de 6 ans après le dernier fait (geste, propos…) lié à ce type de harcèlement. La victime peut également saisir le conseil des prud’hommes (secteur privé) ou le tribunal administratif (agents publics).<br>
                Le harcèlement sexuel est un délit pouvant être puni jusqu’à 2 ans de prison et 30 000 € d’amende. En cas d’abus d’autorité (de la part d’un supérieur hiérarchique par exemple), les peines peuvent être plus lourdes.<br>
                L’auteur du harcèlement peut par ailleurs devoir verser des dommages-intérêts à sa victime.<br>
                Enfin, l’auteur de ces agissements peut être soumis à des sanctions disciplinaires à son travail.
            </p>
            <p class="bold">
                6. Ambiances thermiques liées aux températures extérieures (hors températures liées aux postes de travail) pouvant générer fatigue, sueurs, nausées, maux de tête, vertiges, crampes, déshydratation, coup de chaleur, engourdissement, gelures, hypothermie.
            </p>
            <p>
                7. Amiante pouvant entrainer de graves maladies respiratoires : plaques pleurales, asbestose, cancer de la plèvre ou du poumon.
            </p>
            <p>
                8. Aptitude au travail, non respectée elle peut générer ou provoquer la rechute d’atteintes à la santé un accident du travail.
            </p>
        </div>
        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">EVALUATION DES RISQUES PROFESSIONNELS PAR UNITÉ DE TRAVAIL</p>
        </div>
    </section>

    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>
        <div class="body body--rules">
            <p class="bold">
                9. Bruit pouvant provoquer atteinte auditive, surdité, stress, fatigue FACTEUR DE RISQUE PROFESSIONNEL.
            </p>
            <p class="bold">
                10. Champs électromagnétiques pouvant générer vertiges, nausées, troubles visuels, brûlures, dysfonctionnement d’implants actifs.
            </p>
            <p>
                11. Chute à l’eau ou dans un autre liquide pouvant générer une atteinte à la santé ou la noyade.
            </p>
            <p class="bold">
                12. Chute d’objets, renversements et effondrements pouvant générer traumatismes, plaies, fractures, écrasement.
            </p>
            <p class="bold">
                13. Chutes de hauteur y compris chute dans les escaliers, pouvant générer traumatismes, plaies, fractures, noyade.
            </p>
            <p class="bold">
                14. Circulation à pied pouvant provoquer des chutes de plain-pied (glissades, trébuchements, pertes d’équilibre sur une surface “plane” : surfaces ne présentant aucune rupture de niveau ou bien des ruptures de niveau réduites (trottoir, petites marches, plan incliné, etc.)) ; ou provoquer des chocs à l’origine de traumatismes, plaies, fractures.
            </p>
            <p>
                15. Consommation de substances psychoactives (alcool, drogues, médicaments détournés) pouvant être à l’origine d’accidents du travail, notamment par la diminution de la vigilance, l’altération des capacités de jugement, de la motricité, de la vision et des réflexes.
            </p>
            <p>
                16. Dangers des produits, matériels, installations et activités de l’atelier pouvant générer des blessures et des atteintes à la santé.
            </p>
            <p class="bold">
                17. Déplacements dans l’enceinte de la structure avec un véhicule motorisé ou non pouvant générer des TMS, dorso-lombalgies, plaies, traumatismes, fractures, écrasement.
            </p>
            <p class="bold">
                18. Eclairage inadapté pouvant générer éblouissement, fatigue et inconfort visuel, chute, traumatisme, atteinte visuelle, erreur d’appréciation.
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
                25. Intempéries telles que la pluie, le vent, la neige, le brouillard, … , hors températures extérieures ; pouvant générer des atteintes à la santé, des glissades et des chutes, des risques d’effondrement ou d’ensevelissement
            </p>
        </div>
        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">EVALUATION DES RISQUES PROFESSIONNELS PAR UNITÉ DE TRAVAIL</p>
        </div>
    </section>

    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>
        <div class="body body--rules">
            <p class="bold">
                26. Machines ; outils électroportatifs, thermiques et pneumatiques ; outils à main et équipements de travail ; pouvant générer des plaies, coupures, lacérations, amputations, brulures, traumatismes, fractures, écrasements.
            </p>
            <p class="bold">
                27. Manutentions manuelles pouvant générer TMS, dorso-lombalgie, traumatisme, plaie, coupure, brûlures.
            </p>
            <p class="bold">
                28. Manutentions mécaniques pouvant générer écrasement, traumatisme, plaie, coupure.
            </p>
            <p>
                29. Méconnaissance de l’évolution de la règlemention en santé et sécurité au travail pouvant générer des atteintes à la santé et des accidents du travail.
            </p>
            <p>
                30. Méconnaissance des risques et des consignes de sécurité pouvant générer des atteintes à la santé et des accidents du travail.
            </p>
            <p class="bold">
                31. Milieu hyperbare pouvant générer des accidents et / ou des pathologies de décompression FACTEUR DE RISQUE PROFESSIONNEL.
            </p>
            <p>
                32. Nanomatériaux et nanoparticules pouvant générer des intoxications principalement par inhalation ou ingestion.
            </p>
            <p>
                33. Opérations de chargement et de déchargement de véhicule réalisées en coactivité entre la structure utilisatrice et une entreprise de transport, pouvant générer des atteintes à la santé et / ou des accidents.
            </p>
            <p>
                34. Organisation du travail, pouvant générer notamment des risques psychosociaux, troubles musculosquelettiques, accidents.
            </p>
            <p>
                35. Plomb pouvant entrainer des atteintes graves au niveau du système nerveux, au niveau des reins, au niveau du sang, au niveau du système digestif, et sur le système reproducteur.
            </p>
            <p>
                36. Postures pénibles, travail statique pouvant générer fatigue et douleurs, accidents traumatiques et cardiovasculaires, TMS, dorso-lombalgies.
            </p>
            <p class="bold">
                37. Rayonnements ionisants pouvant générer des brûlures, des lésions cellulaires, des effets cancérogènes, mutagènes et reprotoxiques.
            </p>
            <p class="bold">
                38. Rayonnements optiques pouvant générer des atteintes de la peau (brulure, vieillissement, cancer) et de l’œil (lésions de cornée, conjonctivite, rétine et opacification du cristallin).
            </p>
            <p>
                39. Risques liés à la l’interférence entre plusieurs activités pouvant générer des atteintes à la santé et / ou des accidents.
            </p>
            <p class="bold">
                40. Risques psychosociaux dont harcèlement moral et sexuel, agression, harcèlement et violence internes et externes (morale, verbale, physique, à caractère sexuel) pouvant mettre en péril la santé et la sécurité des salariés, affecter la dignité et le devenir professionnel et / ou générer des maladies cardio-vasculaires, troubles anxiodépressifs, stress, épuisement professionnel ou burnout, suicide.
            </p>
            <p class="bold">
                41. Risques routiers durant le trajet domicile travail pouvant générer des atteintes traumatiques plus ou moins sévères ou le décès (1ère cause de mortalité au travail).
            </p>
            <p class="bold">
                42 Risques routiers en mission à l’extérieur des locaux de la structure pouvant générer stress, TMS, dorso-lombalgies, et atteintes traumatiques plus ou moins sévères.
            </p>
        </div>
        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">EVALUATION DES RISQUES PROFESSIONNELS PAR UNITÉ DE TRAVAIL</p>
        </div>
    </section>

    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>
        <div class="body body--rules">
            <p class="bold">
                43 Télétravail réalisé au domicile pouvant engendrer des risques physiques (musculosquelettiques, visuels, électriques, …), des risques liés à une mauvaise ergonomie du poste de travail ou à une installation défectueuse ; et des risques psychosociaux.
            </p>
            <p>
                44 Températures extrêmes liées aux postes de travail (hors températures extérieures) pouvant générer fatigue, sueurs, nausées, maux de tête, vertiges, crampes, déshydratation, coup de chaleur, engourdissement, gelures, hypothermieFACTEUR DE RISQUE PROFESSIONNEL.
            </p>
            <p>
                45 Travail de nuit entre 21h et 6 heures, ou en équipes successives alternantes pouvant générer des troubles du sommeil, des troubles cardiovasculaires, des cancers FACTEUR DE RISQUE PROFESSIONNEL
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
                49 Vibrations transmises aux mains et aux bras pouvant générer des pathologies des articulations du poignet ou du coude, un syndrome de Raynaud ou des troubles neurologiques.
            </p>
        </div>
        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">EVALUATION DES RISQUES PROFESSIONNELS PAR UNITÉ DE TRAVAIL</p>
        </div>
    </section>

    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body">
            <p class="center legend info"> F = Fréquence | P = Probabilité | GP = Gravité potentiel | ID = Impact différencié | RB = Risque brut | T = Technique | O = Oragnisationnelle | H = Humain | RR = Risque résiduel</p>
            <table class="table table--action">
                <thead>
                    <tr>
                        <th colspan="15" class="green">5. EVALUATION DES RISQUES PROFESSIONNELS</th>
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
                        <td class="theader min-width">
                            P
                        </td>
                        <td class="theader min-width">
                            GP
                        </td>
                        <td class="theader min-width">
                            ID
                        </td>
                        <td class="theader min-width">
                            RB
                        </td>
                        <td class="theader max-width">
                            Mesures de prévention et de protection existantes : Technique, Organisationnelle, Protection, Humaine (information)
                        </td>
                        <td class="theader">
                            T
                        </td>
                        <td class="theader">
                            O
                        </td>
                        <td class="theader">
                            H
                        </td>
                        <td class="theader">
                            RR
                        </td>
                        <td class="theader">
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
                                    <td class="risk">@stripTags($sd_risk->name)</td>
                                    <td class="center min-width min-width-left">{{ $sd_risk->translate($sd_risk->frequency,'frequency') }}</td>
                                    <td class="center min-width min-width-left">{{ $sd_risk->translate($sd_risk->probability,'probability') }}</td>
                                    <td class="center min-width min-width-left">{{ $sd_risk->translate($sd_risk->gravity,'gravity') }}</td>
                                    <td class="center min-width min-width-left">{{ $sd_risk->translate($sd_risk->impact,'impact') }}</td>
                                    <td class="center min-width min-width-left {{ $sd_risk->total() >= 24 ? "pink" : "" }}">{{ $sd_risk->total() }}</td>
                                    <td class="restraint">
                                        @foreach($sd_risk->sd_restraints_exist as $sd_restraint)
                                            * @stripTags($sd_restraint->name) <br>
                                        @endforeach
                                    </td>
                                    <td class="center min-width min-width-right">{{ $sd_risk->translateRR(round($sd_risk->moyenneTech(), 1), "tech") }}</td>
                                    <td class="center min-width min-width-right">{{ $sd_risk->translateRR(round($sd_risk->moyenneOrga(), 1), "orga") }}</td>
                                    <td class="center min-width min-width-right">{{ $sd_risk->translateRR(round($sd_risk->moyenneHum(), 1), "hum") }}</td>
                                    <td class="center min-width min-width-right"> {{ isset($sd_risk->sd_restraints_exist[0]) ? $sd_risk->totalRR($sd_risk->sd_restraints_exist) : $sd_risk->total() }}</td>
                                    <td class="center criticity {{ isset($sd_risk->sd_restraints_exist[0]) ? $sd_risk->colorPDF($sd_risk->totalRR($sd_risk->sd_restraints_exist),false) :  $sd_risk->colorPDF($sd_risk->total(),true) }}">{{ isset($sd_risk->sd_restraints_exist[0]) ? $sd_risk->colorTotal($sd_risk->totalRR($sd_risk->sd_restraints),false) : $sd_risk->colorTotal($sd_risk->total(),true) }}</td>
                                    <td class="restraint_proposed">
                                        @foreach($sd_risk->sd_restraints_porposed as $sd_restraint)
                                            * @stripTags($sd_restraint->name) <br>
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
                                <td class="center min-width min-width-right">0</td>
                                <td class="center min-width min-width-right">0</td>
                                <td class="center min-width min-width-right">0</td>
                                <td class="center min-width min-width-right">0</td>
                                <td class="center green criticity">0</td>
                                <td class="restraint_proposed"></td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="footer">
            <p>Copyright © OZA DUERP Online</p>
            <p class="page-num">EVALUATION DES RISQUES PROFESSIONNELS</p>
        </div>
    </section>

     <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body body--notif">
            <h1 class="head-title" id="listPost">6. LISTE DES POSTES DE TRAVAIL "A RISQUE PARTICULIER" (CODE DU TRAVAIL ART. I.4154-2)</h1>
            <p class="text-color-red info">
                <span class="bold">Rappel :</span>  Tous les salariés embauchés pour travailler à l’un de ces postes, en contrat de travail précaire (autre que CDI), doivent bénéficier d’une formation renforcée à la sécurité, ainsi que d’un accueil et d’une formation adaptés dans l’entreprise.
                Obtenir l’avis du médecin du travail, du CSE ou, à défaut, des représentants du personnel, s’il en existe.<br>
                Liste tenue à la disposition des agents de contrôle de l’inspection du travail (amende de 10 000 €uros en cas de non présentation : art. L.4741-1).
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
                            <td>@stripTags($sd_risk->name)</td>
                            <td class="center">{{ $sd_risk->translate($sd_risk->frequency,'frequency') }}</td>
                            <td class="center">{{ $sd_risk->translate($sd_risk->probability,'probability') }}</td>
                            <td class="center">{{ $sd_risk->translate($sd_risk->gravity,'gravity') }}</td>
                            <td class="grey center">{{ $sd_risk->total() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">LISTE DES POSTES DE TRAVAIL</p>
        </div>
    </section>


    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body body--notif">
            <h1 class="head-title" id="expoRiskPro">10. EVALUATION DE L'EXPOSITION AUX "FACTEURS DE RISQUES PROFESSIONNELS"</h1>
            <p>
                Cette annexe du Document Unique consigne réglementairement (Article R.4121-1-1) : <br><br>
                1° Les données de l’évaluation de l’exposition aux facteurs de risques professionnels de nature à faciliter la déclaration annuelle des salariés exposés au delà des seuils réglementaires ; <br> <br>
                2° La proportion de salariés exposés aux facteurs de risques professionnels, au-delà des seuils réglementaires. <br>
            </p>
            <table class="table table--risk-post">
                <thead>
                    <tr>
                        <td class="theader yellow-v" colspan="3">
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
                    <tr>
                        <td class="center">
                            {{ $numberEmUt }}
                        </td>
                        <td class="{{ $numberEmExpo === 0 ? "green" : "red" }} center">
                            {{ $numberEmExpo }}
                        </td>
                        <td class="{{$numberEmExpo/$numberEmUt === 0 ? "green" : "red" }} center">
                            {{ $numberEmExpo/$numberEmUt."%"}}
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table table--risk-post">
                <thead>
                    <tr>
                        <td class="theader yellow-v">
                            Facteurs de risques professionnels
                        </td>
                        <td class="theader yellow-v">
                            Unité exposée au-delà des seuils
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expos as $expo)
                        @if ($expo->danger->name === "Travail de nuit")
                            <tr>
                                <td>
                                    Travail de nuit dans les conditions fixées aux articles L. 3122-2 à L. 3122-5
                                </td>
                                <td class="center">
                                    {{ count($expo->pivot($single_document->id)) === 0 ? "Non" : "Oui"  }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Travail en équipes successives alternantes
                                </td>
                                <td class="center">
                                    {{ count($expo->pivot($single_document->id)) === 0 ? "Non" : "Oui"  }}
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td>
                                    {{ $expo->danger->name }}
                                </td>
                                <td class="center">
                                    {{ count($expo->pivot($single_document->id)) === 0 ? "Non" : "Oui"  }}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">EVALUATION DE L'EXPOSITION</p>
        </div>
    </section>


    <section class="page">
        <div class="header">
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}, {{ $single_document->client->city_zipcode }} {{ $single_document->client->city }}</p>
        </div>

        <div class="body body--notif">
            <h1 class="head-title" id="expoRiskPro">10. EVALUATION DE L'EXPOSITION AUX "FACTEURS DE RISQUES PROFESSIONNELS"</h1>
            <p class="text-color-red">
                A noter : La durée annuelle d’exposition considérée est de 220 jours.
                Seules les unités de travail concernées par une exposition sont présentées. Ce qui implique que les unités non présentes dans le tableau ne sont pas concernées.
            </p>
            <table class="table table--risk-post">
                <thead>
                    <tr>
                        <td class="theader yellow-v" colspan="8">
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
                            Détail de l’exposiatin
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
                        @if (count($pivot) === 0)
                            <tr>
                                <td class="center">{{ $danger->danger->name }}</td>
                                <td class="center">TOUS</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="center">Non concernée</td>
                            </tr>
                        @else
                            @foreach ($single_document->work_unit as $sd_work_unit)
                                @if ($sd_work_unit->sd_danger($danger->id) && $sd_work_unit->sd_danger($danger->id)->pivot->exist)
                                    @if ($sd_work_unit->sd_danger($danger->id)->pivot->exposition)
                                    @php
                                        $count = $danger->danger->exposition->exposition_groups;
                                    @endphp
                                        @foreach ($danger->danger->exposition->exposition_groups as $key => $exposition_group)
                                            @foreach ($exposition_group->exposition_questions as  $exposition_question)
                                                @php
                                                    $sd_exposition_question = $exposition_question->sd_work_unit_exposition_question($sd_work_unit->id);
                                                    if(isset($sd_exposition_question)){
                                                        $old_sd_exposition_question = $sd_exposition_question;
                                                    }
                                                @endphp

                                                @if (isset($sd_exposition_question))
                                                    <tr>

                                                        @if ($key === 0)
                                                            <td class="center" rowspan="{{count($count) > 0 ? count($count) : 1 }}">
                                                                {{ $danger->danger->name }}
                                                            </td>
                                                            <td class="center" rowspan="{{count($count) > 0 ? count($count) : 1 }}">
                                                                {{ $sd_work_unit->name }}
                                                            </td>
                                                            <td rowspan="{{count($count) > 0 ? count($count) : 1 }}">
                                                                {{ $exposition_group->intervention_type_label }}
                                                            </td>
                                                        @endif
                                                        @if (isset($sd_exposition_question))
                                                            <td>{{ $sd_exposition_question->intervention_type }}</td>
                                                            <td class="center">{{ $sd_exposition_question->number_employee }}</td>
                                                            <td>
                                                                @if ($exposition_group->type === "default")
                                                                    {{ $exposition_group->value_label." : "}} <span class="text-color-{{$exposition_group->calculation($sd_exposition_question->value)}}">{{ $sd_exposition_question->value }}</span>
                                                                @else
                                                                    Durée en mm / j <span class="text-color-{{$exposition_group->calculation($sd_exposition_question->minutes)}}">{{$sd_exposition_question->minutes}} </span>
                                                                    Durée en h / an <span class="text-color-{{$exposition_group->calculation($sd_exposition_question->value)}}">{{$sd_exposition_question->value}}</span>
                                                                @endif
                                                            </td>
                                                            @if ($exposition_group->name === "exposition_group_team_work" && $exposition_group->name === "exposition_group_night_work")
                                                                @php
                                                                    $result = 0;
                                                                @endphp
                                                                <td class="center" rowspan="{{ count($count) }}">Total h / an : <span class="text-color-{{$exposition_group->calculation($result)}}">{{ $result }}</span></td>
                                                            @else
                                                                @if ($sd_exposition_question->exposition_question->exposition_group->type === "default")
                                                                    <td class="center"></td>
                                                                @else
                                                                    <td class="center">Total h / an : <span class="text-color-{{$exposition_group->calculation($sd_exposition_question->value)}}">{{$sd_exposition_question->value}}</span></td>
                                                                @endif
                                                            @endif
                                                            @if ($key === 0)
                                                                <td rowspan="{{count($count) > 0 ? count($count) : 1 }}" class="center {{$exposition_group->calculation($sd_exposition_question->value)}}"> {{$exposition_group->translate($sd_exposition_question->value)}} </td>
                                                            @endif
                                                        @else
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="center">Non concernée</td>
                                                        @endif
                                                    </tr>

                                                @elseif (!isset($sd_exposition_question) && $key === 1 && isset($old_sd_exposition_question))
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                @endif

                                            @endforeach
                                        @endforeach
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </tbody>
            </table>
            <p class="text-color-red">
                Lorsque la situation est critique (Exposé), veuillez vous assurer que les mesures proposées lors de l’évaluation des risques de l’UT vous permettent d’agir sur ce facteur.
            </p>
        </div>

        <div class="footer">
            <p> Copyright © OZA DUERP Online</p>
            <p class="page-num">EVALUATION DE L'EXPOSITION</p>
        </div>
    </section>

</body>
</html>
