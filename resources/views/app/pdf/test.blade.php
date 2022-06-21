<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Test</title>
    <link rel="stylesheet" href="{{ public_path('css/pdf/test.min.css') }}">
</head>
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

            <img src="{{ public_path('storage/' . $single_document->client->id . '/logo.' . $single_document->client->image_type) }}" alt="">

            <div class="info-single_document">
                <p> @if(count($single_document->histories) === 1) Document Unique élaboré le @else Mise à jour du DUERP le @endif: <span class="bold">{{ date("d F Y") }}</span></p>
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
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}</p>
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
            <p class="center">{{ $single_document->name_enterprise }} - {{ $single_document->client->adress }}</p>
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
                {{-- <li>
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
                </li> --}}
                <li>
                    <span class="number">7</span>
                    <p><span class="line"><a href="#expoRiskPro" class="link">EXPOSITION AUX FACTEURS DE RISQUES PROFESSIONNELS ET <span>PLAN D’ACTION</span></a></span></p>
                </li>
                <li>
                    <span class="number">8</span>
                    <p><span class="line"><a href="#historie" class="link">HISTORIQUE DES ACTIONS REALISÉES</a></span></p>
                </li>
                <li>
                    <span class="number">9</span>
                    <p><span class="line"><a href="#annexes" class="link">ANNEXES</a></span></p>
                </li>
                <li class="no-border">
                    <p><span class="line">Glossaire</span></p>
                </li>
                <li class="no-border">
                    <p><span class="line">Attestations ("Déplacements" - "Formation sécurité" - "Exposition aux facteurs de risques professionnels")</span></p>
                </li>
                <li class="no-border">
                    <p><span class="line">Fiche d’évaluation simplifiée des risques d’interférence et de coactivité</span></p>
                </li>
                <li class="no-border">
                    <p><span class="line">Arrêté du 19-03-1993 (travaux dangereux mis en œuvre par une entreprise extérieure)</span></p>
                </li>
                <li class="no-border">
                    <p><span class="line">Arrêté du 25-02-2003 (travaux à risques particuliers sur chantier de BTP)</span></p>
                </li>
                <li class="no-border">
                    <p><span class="line">Fiche pratique « Hygiène des mains »</span></p>
                </li>
                <li class="no-border">
                    <p><span class="line">Fiche pratique « Prévention COVID-19 »</span></p>
                </li>
                <li class="no-border">
                    <p class="text-color-red">
                        Ce Document Unique a été élaboré sur la base du « Pack Conformité » du DOCUMENT UNIQUE OZA.<br>
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
            <p class="center"> Copyright © OZA DUERP Online</p>
            <p class="page-num"></p>
        </div>
    </section>
</body>
</html>
