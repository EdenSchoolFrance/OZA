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

    </body>
</html>
