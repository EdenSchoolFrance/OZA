<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF OZA</title>
    <link rel="stylesheet" href="/css/pdf/pdf.min.css">
    <link rel="stylesheet" href="{{ public_path('css/pdf/pdf.min.css') }}">

    <style>
        @page {
            margin: 0;
            padding: 0;
            /*background-color: #FFFFFF;*/
        }
    </style>
</head>
<body class="pdf">
    <section class="page page-first">
        <div class="header">
            <img src="{{ public_path('img/logo.png') }}">
        </div>

        <div class="body">
            <div class="header">
                <p class="subtitle">Document Unique</p>
                <h1 class="title">{{ $single_document->name }}</h1>
                <p class="info">Code de Travail article L.4121-3</p>
                <p class="info">Transcription des résultats de l'évaluation des risques pour la santé et la sécurité du personnel</p>
            </div>

            <img src="{{ public_path('storage/logo/'.$single_document->client->id.'.'.$single_document->client->image_type) }}" alt="">

            <div class="info-single_document">
                <p>Document Unique élaboré le : <span class="bold">16 Décembre 2021</span></p>
                <p>Version : <span class="bold">2</span></p>
            </div>
        </div>

        <div class="footer">
            <p class="center text-color-green">Copyright © OZA S.A.S. - Objectif Zéro Accident - 15 place des Arènes - 40400 MEILHAN - Tél. : 05 58 76 39 36 - contact@oza-france.fr - www.objectif-zero-accident.fr</p>
            <p class="page-num">Page <span></span></p>
        </div>
    </section>

    <section class="page page-second">
        <div class="header">
        </div>
        <div class="body">
            <div class="header">
                <h1 class="title">Document Unique</h1>
                <p class="info">Code de Travail article L.4121-3</p>
                <p class="info">Transcription des résultats de l'évaluation des risques pour la santé et la sécurité du personnel</p>
            </div>
            <ul>
                <li class="bold"><p>Ce Document Unique doit réglementairement être tenu à la disposition de (Article R4121-4 du Code du Travail) :</p></li>
                <li><p>1° Des travailleurs ;</p></li>
                <li><p>2° Des membres du Comité Social et Economique ou des instances qui en tiennent lieu ;</p></li>
                <li><p>3° Des délégués du personnel ;</p></li>
                <li><p>4° Du médecin du travail ;</p></li>
                <li><p>5° Des agents de l’inspection du travail ;</p></li>
                <li><p>6° Des agents des services de prévention des organismes de sécurité sociale ;</p></li>
                <li><p>7° Des agents des organismes professionnels de santé, de sécurité et des conditions de travail ;</p></li>
                <li><p>8° Des inspecteurs de la radioprotection.</p></li>
                <li>
                    <p class="text-color-red">
                        <span class="bold">A noter :</span> <br>
                        Un avis indiquant les modalités d'accès des travailleurs au document unique est affiché à une place convenable et aisément accessible dans les lieux de travail.
                        Dans les entreprises ou établissements dotés d'un règlement intérieur, cet avis est affiché au même emplacement que celui réservé au règlement intérieur
                    </p>
                </li>
            </ul>
        </div>
        <div class="footer">
            <p class="center">Copyright © OZA S.A.S. - Objectif Zéro Accident</p>
            <p class="page-num">Page <span></span></p>
        </div>
    </section>

    <section class="page">
        <div class="header">
            <p class="center">Numéro du client - Adresse postale</p>
        </div>
        <div class="body">
            <h1 class="head-title">SOMMAIRE</h1>
            <ul class="list-item">
                <li>
                    <p><span class="line">Actualisation du Document Unique <a href="#" class="link">4</a></span></p>
                </li>
                <li>
                    <p><span class="line">Présentation détaillée de la structure et des unités de travail <a href="#" class="link">4</a></span></p>
                </li>
                <li>
                    <p><span class="line">TABLEAU DE BORD DE L’EVALUATION DES RISQUES <a href="#" class="link">4</a></span></p>
                </li>
                <li>
                    <span class="number">1</span>
                    <p><span class="line"><span class="text-color-green">PLAN D'ACTION</span> de réduction des risques, classement par <span class="bold">Criticité décroissante</span> <a href="#" class="link">4</a></span></p>
                </li>
                <li>
                    <span class="number">2</span>
                    <p><span class="line">RAPPEL REGLEMENTAIRE DOCUMENT UNIQUE<a href="#" class="link">4</a></span></p>
                </li>
                <li>
                    <span class="number">3</span>
                    <p><span class="line">NOTICE DE L’EVALUATION DES RISQUES<a href="#" class="link">4</a></span></p>
                </li>
                <li>
                    <span class="number">4</span>
                    <p><span class="line">EVALUATION DES RISQUES PROFESSIONNELS PAR <span class="bold">UNITÉ DE TRAVAIL</span>, classement alphabétique<a href="#" class="link">4</a></span></p>
                </li>
                <li>
                    <span class="number">5</span>
                    <p><span class="line">LISTE DES POSTES DE TRAVAIL A RISQUE PARTICULIER<a href="#" class="link">4</a></span></p>
                </li>
                <li>
                    <span class="number">6</span>
                    <p><span class="line">EVALUATION DETAILLEE DU RISQUE PSYCHOSOCIAL ET <span>PLAN D’ACTION</span><a href="#" class="link">4</a></span></p>
                </li>
                <li>
                    <span class="number">7</span>
                    <p><span class="line">EVALUATION DETAILLEE DU RISQUE CHIMIQUE ET <span>PLAN D’ACTION</span><a href="#" class="link">4</a></span></p>
                </li>
                <li>
                    <span class="number">8</span>
                    <p><span class="line">EVALUATION DETAILLEE DES CHAMPS ELECTROMAGNETIQUES ET <span>PLAN D’ACTION</span><a href="#" class="link">4</a></span></p>
                </li>
                <li>
                    <span class="number">9</span>
                    <p><span class="line">DOCUMENT RELATIF A LA PREVENTION CONTRE L’EXPLOSION ET <span>PLAN D’ACTION</span><a href="#" class="link">4</a></span></p>
                </li>
                <li>
                    <span class="number">10</span>
                    <p><span class="line">EXPOSITION AUX FACTEURS DE RISQUES PROFESSIONNELS ET <span>PLAN D’ACTION</span><a href="#" class="link">4</a></span></p>
                </li>
                <li>
                    <span class="number">11</span>
                    <p><span class="line">HISTORIQUE DES ACTIONS REALISÉES<a href="#" class="link">4</a></span></p>
                </li>
                <li>
                    <span class="number">12</span>
                    <p><span class="line">ANNEXES<a href="#" class="link">4</a></span></p>
                </li>
                <li class="no-border">
                    <p><span class="line">Glossaire<a href="#" class="link">4</a></span></p>
                </li>
                <li class="no-border">
                    <p><span class="line">Attestations ("Déplacements" - "Formation sécurité" - "Exposition aux facteurs de risques professionnels")<a href="#" class="link">4</a></span></p>
                </li>
                <li class="no-border">
                    <p><span class="line">Fiche d’évaluation simplifiée des risques d’interférence et de coactivité<a href="#" class="link">4</a></span></p>
                </li>
                <li class="no-border">
                    <p><span class="line">Arrêté du 19-03-1993 (travaux dangereux mis en œuvre par une entreprise extérieure)<a href="#" class="link">4</a></span></p>
                </li>
                <li class="no-border">
                    <p><span class="line">Arrêté du 25-02-2003 (travaux à risques particuliers sur chantier de BTP)<a href="#" class="link">4</a></span></p>
                </li>
                <li class="no-border">
                    <p><span class="line">Fiche pratique « Hygiène des mains »<a href="#" class="link">4</a></span></p>
                </li>
                <li class="no-border">
                    <p><span class="line">Fiche pratique « Prévention COVID-19 »<a href="#" class="link">4</a></span></p>
                </li>
                <li class="no-border">
                    <p class="text-color-red">
                        Ce Document Unique a été élaboré sur la base du « Pack Conformité » du DOCUMENT UNIQUE OZA.<br>
                        L’employeur est conscient qu’il s’agit d’une version allégée du Document Unique de OZA France dans lequel l’évaluation des risque est réalisée sur la base de 18 Dangers, dans lequel n’apparaissent pas pes parties ci-dessous et dans lequel l’évaluation de l’exposition aux Facteurs de Risques Professionnels est un simple diagnostic.<br>
                        - La liste des postes de travail à risque particulier, <br>
                        - L’évaluation détaillée du risque psychosocial, <br>
                        - L’évaluation détaillée du risque chimique, <br>
                        - L’évaluation détaillée de l’exposition aux Champs électromagnétiques, <br>
                        - Le Document Relatif à la Protection Contre les Explosions.
                    </p>
                </li>
            </ul>
        </div>
        <div class="footer">
            <p class="center">Copyright © OZA S.A.S. - Objectif Zéro Accident</p>
            <p class="page-num">Page <span></span></p>
        </div>
    </section>
    <section class="page">
        <div class="header">
            <p class="center">Numéro du client - Adresse postale</p>
        </div>
        <div class="body">
            <h1 class="head-title">ACTUALISATION DU DOCUMENT UNIQUE</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="5" class="green">VERSIONS DU DOCUMENT UNIQUE</th>
                    </tr>
                </thead>
                <tbody>
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
                    {{--Data line--}}
                    <tr>
                        <td>Prénom NOM du responsable DU</td>
                        <td>Fonction</td>
                        <td></td>
                        <td>Réalisation initiale du DU et de son annexe "Facteurs de risques…"</td>
                        <td>16/12/2021</td>
                    </tr>
                    {{--No data line--}}
                    <tr>
                        <td><div></div></td>
                        <td><div></div></td>
                        <td><div></div></td>
                        <td><div></div></td>
                        <td><div></div></td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="footer">
            <p class="center text-color-green">Copyright © OZA S.A.S. - Objectif Zéro Accident - 15 place des Arènes - 40400 MEILHAN - Tél. : 05 58 76 39 36 - contact@oza-france.fr - www.objectif-zero-accident.fr</p>
            <p class="page-num">Page <span></span></p>
        </div>
    </section>

    <section class="page">
        <div class="header"></div>
        <div class="body">
            <h1 class="head-title">PRÉSENTATION DE LA STRUCTURE</h1>
            <table class="table table--info-gen">
                <thead>
                    <tr>
                        <th colspan="2" class="yellow">INFORMATION GÉNÉRALES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2">
                            Ce Document Unique, y compris ses annexes, est protégé par les droits d'auteur. Il a été réalisé avec l'assistance d'un IPRP de la
                            société OZA, sous l'entière responsabilité et selon les indications de : <br>
                            Mr {{ $single_document->firstname }} {{ $single_document->lastname }}, Fonction (responsable du DU)
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Pour : <br>
                            {{ $single_document->client->name }}
                        </td>
                        <td>
                            Téléphone : <br>
                            {{ $single_document->phone }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Adresse postale : <br>
                            {{ $single_document->adress }}
                        </td>
                        <td>
                            Email : <br>
                            {{ $single_document->email }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Nombre de salariés inscrits sur le registre du personnel au moment de la rédaction du Document Unique : <br>
                            {{ $single_document->work_unit->pluck('number_employee')->sum() }} salaries <br>

                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="text-color-red"><span class="bold">À noter :</span> le genre masculin, utilisé dans la rédaction de ce document, l’a été uniquement dans le but d’alléger sa rédaction et sa lecture.</p>
        </div>
        <div class="footer">
            <p class="center text-color-green">Copyright © OZA S.A.S. - Objectif Zéro Accident - 15 place des Arènes - 40400 MEILHAN - Tél. : 05 58 76 39 36 - contact@oza-france.fr - www.objectif-zero-accident.fr</p>
            <p class="page-num">Page <span></span></p>
        </div>
    </section>

    <section class="page">
        <div class="header"></div>
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
            <p class="center text-color-green">Copyright © OZA S.A.S. - Objectif Zéro Accident - 15 place des Arènes - 40400 MEILHAN - Tél. : 05 58 76 39 36 - contact@oza-france.fr - www.objectif-zero-accident.fr</p>
            <p class="page-num">Page <span></span></p>
        </div>
    </section>
    @foreach($single_document->work_unit as $key => $sd_work_unit)
        <section class="page">
            <div class="header"></div>
            <div class="body">
                @if($key === 0)
                    <p class="text-color-red">
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
                        <td colspan="2">{{ $sd_work_unit->name }}</td>
                    </tr>
                        <tr>
                            <td>
                                <p>
                                    <span class="bold">Principales activités : </span><br>
                                    @foreach($sd_work_unit->activities as $activitie)
                                    - {{ $activitie->text }} <br>
                                    @endforeach
                                </p>
                                <p>
                                    <span class="bold">Machines : </span><br>
                                    @foreach($item_mat->sub_items as $sub_item)
                                        @if(count($sd_work_unit->items->where('sub_item_id', $sub_item->id)) !== 0)
                                            {{ $sd_work_unit->items->where('sub_item_id', $sub_item->id)->pluck('name')->implode(', ') }},
                                        @endif
                                    @endforeach
                                </p>
                            </td>
                            <td>
                                <p>
                                    <span class="bold">Véhicules : </span><br>
                                    @foreach($item_veh->sub_items as $sub_item)
                                        @if(count($sd_work_unit->items->where('sub_item_id', $sub_item->id)) !== 0)
                                            {{ $sd_work_unit->items->where('sub_item_id', $sub_item->id)->pluck('name')->implode(', ') }},
                                        @endif
                                    @endforeach
                                </p>
                                <p>
                                    <span class="bold">Engins et appareils de manutention mécanique : </span><br>
                                    @foreach($item_eng->sub_items as $sub_item)
                                        @if(count($sd_work_unit->items->where('sub_item_id', $sub_item->id)) !== 0)
                                            {{ $sd_work_unit->items->where('sub_item_id', $sub_item->id)->pluck('name')->implode(', ') }},
                                        @endif
                                    @endforeach
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="footer">
                <p class="center text-color-green">Copyright © OZA S.A.S. - Objectif Zéro Accident - 15 place des Arènes - 40400 MEILHAN - Tél. : 05 58 76 39 36 - contact@oza-france.fr - www.objectif-zero-accident.fr</p>
                <p class="page-num">Page <span></span></p>
            </div>
        </section>
    @endforeach
    <section class="page">
        <div class="header"></div>
        <div class="body">
            <h1 class="head-title">TABLEAU DE BORD DE L'ÉVALUATION DES RISQUES</h1>
            <table class="table table--no-border table--dashboard">
                <tr>
                    <td>
                        <div>
                            <p>Risque brut moyen</p>
                            <p class="text-color-green number">15.0</p>
                            <p>Maxi = 50</p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <p>Réduction du risque</p>
                            <p class="text-color-green number">24.7 %</p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <p>Risque résiduel  moyen</p>
                            <p class="text-color-green number">11.3</p>
                            <p>Maxi = 50</p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Permet de situer le niveau de risque total de la structure, évalué sans prendre en compte les mesures de prévention ; sur une échelle de zéro (risque nul) à 50 (risque maximal).
                    </td>
                    <td>
                        Met en évidence les efforts de prévention de la structure
                    </td>
                    <td>
                        Permet de situer le niveau de risque actuel de la structure, en prenant en compte les mesures de prévention existantes ;
                        sur une échelle de zéro (risque nul) à 50 (risque maximal).
                    </td>
                </tr>
            </table>
            <p class="center bold">Risque résiduel</p>
            <img src="{{ $chartUrl }}" alt="" class="chart-risk">
        </div>
        <div class="footer">
            <p class="center text-color-green">Copyright © OZA S.A.S. - Objectif Zéro Accident - 15 place des Arènes - 40400 MEILHAN - Tél. : 05 58 76 39 36 - contact@oza-france.fr - www.objectif-zero-accident.fr</p>
            <p class="page-num">Page <span></span></p>
        </div>
    </section>

    <section class="page">
        <div class="header"></div>
        <div class="body body--notif">
            <h1 class="head-title">1. PLAN D'ACTION DE RÉDUCTION DES RISQUES</h1>
            <p class="bold">Le Plan d’action reprend et présente tous les risques identifiés et évalués dans le chapitre 4 « Evaluation des risques » classés ici selon leur criticité (priorité) dans la colonne « Criticité ».</p>
            <p class="bold">Le Plan d’action reprend et présente également toutes les situations de « non-conformité réglementaire » dans la colonne « Mesures de prévention et de protection proposées », sous le libellé « Obligation réglementaire ».</p>
            <p>
                <span class="bold">Colonne « Mesures de prévention et de protection proposées » :</span><br>
                Les mesures de prévention et de protection proposées se déclinent en 3 catégories énoncées dans les 9 principes de prévention de l’article L.4121-2 du Code du Travail (Loi n° 91-1414 du 31 décembre 1991 art. 1 Journal Officiel du 7 janvier 1992 en vigueur le 31 décembre 1992) :<br>
                - Mesure Technique, <br>
                - Mesure Organisationnelle, <br>
                - Mesure Humaine (Information et formation, protection collective et individuelle).
            </p>
            <p>
                <span class="bold">L’employeur décidera quelle(s) mesure(s) proposée(s) il réalisera.</span><br>
                <span class="bold">Colonne « Décision sur les actions proposées »</span><br>
                - Sera réalisé le (date) : Inscrire ici la date planifiée par l’employeur pour la réalisation des actions de prévention ou de protection qu’il a validé.<br>
                - Ne sera pas réalisé » : Préciser les actions que l’employeur ne valide pas et qui ne seront pas mises en place.<br>
                <span class="bold">Colonne « Date de réalisation » :</span><br>
                Inscrire la date à laquelle l’action de prévention ou de protection a réellement été mise en place et a été opérationnelle.<br>
                <span class="bold">Colonne « Commentaire, complément, autres actions » :</span><br>
                L’employeur inscrira éventuellement ici des commentaires sur les décisions prises, des compléments d’explications, et, ou des actions complémentaires.
            </p>
        </div>
        <div class="footer">
            <p class="center text-color-green">Copyright © OZA S.A.S. - Objectif Zéro Accident - 15 place des Arènes - 40400 MEILHAN - Tél. : 05 58 76 39 36 - contact@oza-france.fr - www.objectif-zero-accident.fr</p>
            <p class="page-num">Page <span></span></p>
        </div>
    </section>


    <section class="page">
        <div class="header"></div>
        <div class="body">
            <p>Ce Document Unique, y compris ses annexes, est protégé par les droits d'auteur. Il a été réalisé avec l'assistance d'un IPRP de la société OZA, sous l'entière responsabilité et selon les indications fournies par : <span class="bold">=Mr {{ $single_document->firstname }} {{ $single_document->lastname }}, Fonction</span> </p>
            <table class="table table--action-plan">
                <tr>
                    <th colspan="9" class="green">1. PLAN D'ACTION</th>
                </tr>
                <tr>
                    <td class="theader">
                        Unité de Travail = poste de travail
                    </td>
                    <td class="theader">
                        DANGER et dommages potentiels à la personne
                    </td>
                    <td class="theader">
                        RISQUE Phase de travail modes et caractéristiques de l'exposition (outil, matériel, produit, situation, opération, fréquence, durée)
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
                        Décision sur les actions proposées : <br>
                        - sera réalisé le (date) <br>
                        - ne sera pas réalisé
                    </td>
                    <td class="theader">
                        Date de réalisation
                    </td>
                    <td class="theader">
                        Commentaire, complément, autres actions
                    </td>
                </tr>
                @foreach($sd_risks as $sd_risk)
                    <tr>
                        <td>{{ $sd_risk->sd_work_unit ? $sd_risk->sd_work_unit->name : "Tous" }}</td>
                        <td>{{ $sd_risk->sd_danger->danger->name }}</td>
                        <td>{{ $sd_risk->name }}</td>
                        <td>{{ $sd_risk->totalRR($sd_risk->sd_restraints) }}</td>
                        <td class="{{ $sd_risk->colorPDF($sd_risk->totalRR($sd_risk->sd_restraints)) }}">{{ $sd_risk->colorTotal($sd_risk->totalRR($sd_risk->sd_restraints)) }}</td>
                        <td>
                            @foreach($sd_risk->sd_restraints as $sd_restraint)
                                {{ $sd_restraint->name }}<br>
                            @endforeach
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="footer">
            <p class="center text-color-green">Copyright © OZA S.A.S. - Objectif Zéro Accident - 15 place des Arènes - 40400 MEILHAN - Tél. : 05 58 76 39 36 - contact@oza-france.fr - www.objectif-zero-accident.fr</p>
            <p class="page-num">Page <span></span></p>
        </div>
    </section>

    <section class="page">
        <div class="header"></div>
        <div class="body body--notif">
            <h1 class="head-title">2. RAPPEL RÉGLEMENTAIRE "DOCUMENT UNIQUE"</h1>
            <p class="bold">L’EVALUATION DES RISQUES, LE DOCUMENT UNIQUE ET SON ANNEXE « FACTEURS DE RISQUES PROFESSIONNELS »</p>
            <p class="bold">Le Plan d’action reprend et présente également toutes les situations de « non-conformité réglementaire » dans la colonne « Mesures de prévention et de protection proposées », sous le libellé « Obligation réglementaire ».</p>
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
                De fait l’accident est la concrétisation d’un <span class="bold">RISQUE.</span>
            </p>
        </div>
        <div class="footer">
            <p class="center text-color-green">Copyright © OZA S.A.S. - Objectif Zéro Accident - 15 place des Arènes - 40400 MEILHAN - Tél. : 05 58 76 39 36 - contact@oza-france.fr - www.objectif-zero-accident.fr</p>
            <p class="page-num">Page <span></span></p>
        </div>
    </section>

    <section class="page">
        <div class="header"></div>
        <div class="body body--notif">
            <h1 class="head-title">3. NOTICE EXPLICATIVE DE L'EVALUATION DES RISQUES</h1>
            <p>
                <span class="bold">Postes de travail à « RISQUE PARTICULIER »</span><br>
                Tous les postes de travail comportant au moins une situation de travail dont le risque brut est >= à 24 font partie de la « Liste des postes de travail à risque particulier ».<br>
                Tous les salariés embauchés pour travailler à l’un de ces postes, en contrat de travail précaire (autre que CDI), doivent bénéficier d’une formation renforcée à la sécurité, ainsi que d’un accueil et d’une formation adaptés dans l’entreprise.<br>
                Liste établie par l’employeur, après avis du médecin du travail, du CHSCT ou, à défaut, des représentants du personnel, s’il en existe.<br>
                Liste tenue à la disposition des agents de contrôle des agents de l’inspection du travail (amende de 10 000 € euros en cas de non présentation art).
            </p>
            <p>
                <span class="bold">Le risque résiduel correspond donc à : ((F + P) x G) x pondération de (T + O + H)</span><br>
                <span class="bold">Criticité = situation actuelle</span><br>
                Le Document Unique doit réglementairement permettre d’identifier les risques les plus critiques afin de planifier leur suppression ou leur réduction.<br>
                La « criticité » traduit donc les risques résiduels en « état de la situation actuelle » de la façon suivante :<br>
                <span class="text-color-green">« Acceptable »</span> associé à la couleur verte, elle correspond à une criticité &lt; 12,5.<br>
                La diminution de ce risque n’est pas une priorité. <br>
                <span class="text-color-yellow">« A améliorer »</span> associé à la couleur jaune, elle correspond à une criticité >= 12,5.<br>
                La diminution de ces risque peut être planifiée à moyen / long terme. <br>
                <span class="text-color-orange">« Agir vite »</span> est associé à la couleur orange, elle correspond à une criticité >= 20.<br>
                La diminution de ces risques est à planifier en priorité. <br>
                <span class="text-color-red">« STOP »</span> est associé à la couleur rouge, elle correspond à une criticité >=30 <= 50.<br>
                Ces activités doivent être stoppées immédiatement afin d’identifier et de mettre en place une activité plus sûre.
            </p>
        </div>
        <div class="footer">
            <p class="center text-color-green">Copyright © OZA S.A.S. - Objectif Zéro Accident - 15 place des Arènes - 40400 MEILHAN - Tél. : 05 58 76 39 36 - contact@oza-france.fr - www.objectif-zero-accident.fr</p>
            <p class="page-num">Page <span></span></p>
        </div>
    </section>

    <section class="page">
        <div class="header"></div>
        <div class="body body--rules">
            <h1 class="head-title">3. NOTICE EXPLICATIVE DE L'EVALUATION DES RISQUES</h1>
            <p class="bold">
                Liste des dangers considérés. <br>
                <span class="text-color-red">En gras, dangers présents uniquement dans la version « Conformité » du Document Unique OZA.</span>
            </p>
            <p>
                1. Absence d’une personne « compétente » pour s’occuper des activités de protection et de prévention des risques professionnels de la structure.
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
        </div>
        <div class="footer">
            <p class="center text-color-green">Copyright © OZA S.A.S. - Objectif Zéro Accident - 15 place des Arènes - 40400 MEILHAN - Tél. : 05 58 76 39 36 - contact@oza-france.fr - www.objectif-zero-accident.fr</p>
            <p class="page-num">Page <span></span></p>
        </div>
    </section>

    <section class="page">
        <div class="header"></div>
        <div class="body body--rules">
            <p class="bold">
                6. Ambiances thermiques liées aux températures extérieures (hors températures liées aux postes de travail) pouvant générer fatigue, sueurs, nausées, maux de tête, vertiges, crampes, déshydratation, coup de chaleur, engourdissement, gelures, hypothermie.
            </p>
            <p>
                7. Amiante pouvant entrainer de graves maladies respiratoires : plaques pleurales, asbestose, cancer de la plèvre ou du poumon.
            </p>
            <p>
                8. Aptitude au travail, non respectée elle peut générer ou provoquer la rechute d’atteintes à la santé un accident du travail.
            </p>
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
        </div>
        <div class="footer">
            <p class="center text-color-green">Copyright © OZA S.A.S. - Objectif Zéro Accident - 15 place des Arènes - 40400 MEILHAN - Tél. : 05 58 76 39 36 - contact@oza-france.fr - www.objectif-zero-accident.fr</p>
            <p class="page-num">Page <span></span></p>
        </div>
    </section>
    <section class="page">
        <div class="header"></div>
        <div class="body body--rules">
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
        </div>
        <div class="footer">
            <p class="center text-color-green">Copyright © OZA S.A.S. - Objectif Zéro Accident - 15 place des Arènes - 40400 MEILHAN - Tél. : 05 58 76 39 36 - contact@oza-france.fr - www.objectif-zero-accident.fr</p>
            <p class="page-num">Page <span></span></p>
        </div>
    </section>
    <section class="page">
        <div class="header"></div>
        <div class="body body--rules">
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
            <p>
        </div>
        <div class="footer">
            <p class="center text-color-green">Copyright © OZA S.A.S. - Objectif Zéro Accident - 15 place des Arènes - 40400 MEILHAN - Tél. : 05 58 76 39 36 - contact@oza-france.fr - www.objectif-zero-accident.fr</p>
            <p class="page-num">Page <span></span></p>
        </div>
    </section>

    <section class="page">
        <div class="header"></div>
        <div class="body body--rules">
            <p class="bold">
                42 Risques routiers en mission à l’extérieur des locaux de la structure pouvant générer stress, TMS, dorso-lombalgies, et atteintes traumatiques plus ou moins sévères.
            </p>
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
            <p class="center text-color-green">Copyright © OZA S.A.S. - Objectif Zéro Accident - 15 place des Arènes - 40400 MEILHAN - Tél. : 05 58 76 39 36 - contact@oza-france.fr - www.objectif-zero-accident.fr</p>
            <p class="page-num">Page <span></span></p>
        </div>
    </section>

    <section class="page">
        <div class="header"></div>
        <div class="body">
            <table class="table table--action">
                <tr>
                    <th colspan="15" class="green">1. PLAN D'ACTION</th>
                </tr>
                <tr>
                    <td class="theader">
                        Unité de Travail = poste de travail
                    </td>
                    <td class="theader">
                        DANGER et dommages potentiels à la personne
                    </td>
                    <td class="theader">
                        RISQUE Phase de travail modes et caractéristiques de l'exposition (outil, matériel, produit, situation, opération, fréquence, durée)
                    </td>
                    <td class="theader">
                        F
                    </td>
                    <td class="theader">
                        P
                    </td>
                    <td class="theader">
                        GP
                    </td>
                    <td class="theader">
                        ID
                    </td>
                    <td class="theader">
                        RB
                    </td>
                    <td class="theader">
                        Mesures de prévention et de protection proposées
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
                    <td class="theader">
                        Mesures de prévention et de protection proposées
                    </td>
                </tr>
                @foreach($sd_risks as $sd_risk)
                    <tr>
                        <td>{{ $sd_risk->sd_work_unit ? $sd_risk->sd_work_unit->name : "Tous" }}</td>
                        <td>{{ $sd_risk->sd_danger->danger->name }}</td>
                        <td>{{ $sd_risk->name }}</td>
                        <td>{{ $sd_risk->translate($sd_risk->frequency,'frequency') }}</td>
                        <td>{{ $sd_risk->translate($sd_risk->probability,'probability') }}</td>
                        <td>{{ $sd_risk->translate($sd_risk->gravity,'gravity') }}</td>
                        <td>{{ $sd_risk->translate($sd_risk->impact,'impact') }}</td>
                        <td class="{{ $sd_risk->colorPDF($sd_risk->total()) }}">{{ $sd_risk->colorTotal($sd_risk->total()) }}</td>
                        <td>
                            @foreach($sd_risk->sd_restraints_exist as $sd_restraint)
                                {{ "* ".$sd_restraint->name }} <br>
                            @endforeach
                        </td>
                        <td>{{ round($sd_risk->moyenneTech(), 1) }}</td>
                        <td>{{ round($sd_risk->moyenneOrga(), 1) }}</td>
                        <td>{{ round($sd_risk->moyenneHum(), 1) }}</td>
                        <td> {{ $sd_risk->totalRR($sd_risk->sd_restraints) }}</td>
                        <td class="{{ $sd_risk->colorPDF($sd_risk->totalRR($sd_risk->sd_restraints)) }}">{{ $sd_risk->colorTotal($sd_risk->totalRR($sd_risk->sd_restraints)) }}</td>
                        <td>
                            @foreach($sd_risk->sd_restraints_porposed as $sd_restraint)
                                {{ "* ".$sd_restraint->name }} <br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="footer">
            <p class="center text-color-green">Copyright © OZA S.A.S. - Objectif Zéro Accident - 15 place des Arènes - 40400 MEILHAN - Tél. : 05 58 76 39 36 - contact@oza-france.fr - www.objectif-zero-accident.fr</p>
            <p class="page-num">Page <span></span></p>
        </div>
    </section>


</body>
</html>
