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

    </body>
</html>
