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
    </body>
</html>
