<?php

namespace Database\Seeders;

use App\Models\Danger;
use App\Models\Pack;
use Illuminate\Database\Seeder;

class DangerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dangers = [
            [
                "name" => "Absence personne \"compétente\"",
                "info" => "Absence d'une personne \"compétente\" pour s'occuper des activités de protection et de prévention des risques professionnels de la structure.",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Accident",
                "info" => "Accident, presqu'accident et maladie du travail non ou mal analysés et prévenus pouvant générer la répétition de ces faits.",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Agents biologiques",
                "info" => "Agents biologiques : micro-organisme (bactérie, spore, virus), parasite, culture cellulaire, toxine, susceptible de provoquer infection, allergie, intoxication, cancer, zoonose, épidémie, pandémie (H1N1 - COVID-19), par inhalation ou contact cutané.",
                "packs" => [
                    "compliance",
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Agents chimiques",
                "info" => "Agents chimiques pouvant générer des intoxications aigües ou chroniques, cancers, brûlures.",
                "packs" => [
                    "compliance",
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Agression et violence",
                "info" => "Agression et violence interne et externes, à caractère sexuel ou non, pouvant mettre en péril la santé et la sécurité des salariés, notamment : vols, rackets, agression physique, agression verbale.",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Ambiances thermiques",
                "info" => "Ambiances thermiques liées aux températures extérieures (hors températures liées aux postes de travail) pouvant générer fatigue, sueurs, nausées, maux de tête, vertiges, crampes, déshydratation, coup de chaleur, engourdissement, gelures, hypothermie.",
                "packs" => [
                    "compliance",
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Amiante maladie",
                "info" => "Amiante pouvant entrainer de graves maladies respiratoires : plaques pleurales, asbestose, cancer de la plèvre ou du poumon.",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Aptitude travail",
                "info" => "Aptitude au travail, non respectée elle peut générer ou provoquer la rechute d'atteintes à la santé un accident du travail.",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Bruit",
                "info" => "Bruit pouvant provoquer atteinte auditive, surdité, stress, fatigue",
                "packs" => [
                    "compliance",
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Champs électromagnétiques",
                "info" => "Champs électromagnétiques pouvant générer vertiges, nausées, troubles visuels, brûlures, dysfonctionnement d'implants actifs",
                "packs" => [
                    "compliance",
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Chute liquide",
                "info" => "Chute à l'eau ou dans un autre liquide pouvant générer une atteinte à la santé ou la noyade",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Chute d'objets",
                "info" => "Chute d'objets, renversements et effondrements pouvant générer traumatismes, plaies, fractures, écrasement",
                "packs" => [
                    "compliance",
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Chutes de hauteur",
                "info" => "Chutes de hauteur y compris chute dans les escaliers, pouvant générer traumatismes, plaies, fractures, noyade",
                "packs" => [
                    "compliance",
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Circulation à pied",
                "info" => "Circulation à pied pouvant provoquer des chutes de plain-pied (glissades, trébuchements, pertes d’équilibre sur une surface “plane” : surfaces ne présentant aucune rupture de niveau ou bien des ruptures de niveau réduites (trottoir, petites marches, plan incliné, etc.)) ; ou provoquer des chocs à l'origine de traumatismes, plaies, fractures",
                "packs" => [
                    "compliance",
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Dangers des produits, ...",
                "info" => "Dangers des produits, matériels, installations et activités de l'atelier pouvant générer des blessures et des atteintes à la santé.",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Déplacements",
                "info" => "Déplacements dans l'enceinte de la structure avec un véhicule motorisé ou non pouvant générer des TMS, dorso-lombalgies, plaies, traumatismes, fractures, écrasement",
                "packs" => [
                    "compliance",
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Eclairage",
                "info" => "Eclairage inadapté pouvant générer éblouissement, fatigue et inconfort visuel, chute, traumatisme, atteinte visuelle, erreur d'appréciation",
                "packs" => [
                    "compliance",
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Ecrans",
                "info" => "Ecrans de visualisation pouvant générer fatigue visuelle, troubles musculosquelettiques et stress",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Electricité",
                "info" => "Electricité pouvant générer brûlures, électrisation, électrocution, chute de hauteur",
                "packs" => [
                    "compliance",
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Espaces confinés",
                "info" => "Espaces confinés et manque d'aération pouvant générer intoxication ou asphyxie",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Incapacité porter secours",
                "info" => "Incapacité à porter secours dans des délais raisonnables, pouvant aggraver la situation initiale.",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Incapacité stopper situation",
                "info" => "Incapacité à stopper et prévenir une situation de danger grave et imminent pour la santé ou la sécurité.",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Incendie, explosion",
                "info" => "Incendie et explosion pouvant générer des brûlures, plaies, traumatismes, fractures",
                "packs" => [
                    "compliance",
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Intempéries",
                "info" => "Intempéries telles que la pluie, le vent, la neige, le brouillard, … , hors températures extérieures ; pouvant générer des atteintes à la santé, des glissades et des chutes, des risques d'effondrement ou d'ensevelissement",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Machines",
                "info" => "Machines ; outils électroportatifs, thermiques et pneumatiques ; outils à main et équipements de travail ; pouvant générer des plaies, coupures, lacérations, amputations, brulures, traumatismes, fractures, écrasements",
                "packs" => [
                    "compliance",
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Manutentions manuelles",
                "info" => "Manutentions manuelles pouvant générer TMS, dorso-lombalgie, traumatisme, plaie, coupure, brûlures.",
                "packs" => [
                    "compliance",
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Manutentions mécanique",
                "info" => "Manutentions mécanique pouvant générer écrasement, traumatisme, plaie, coupure",
                "packs" => [
                    "compliance",
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Méconnaissance de la réglementation",
                "info" => "Méconnaissance de la réglementation en santé et sécurité au travail et de son évolution, pouvant générer des atteintes à la santé et des accidents du travail.",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Méconnaissance des consignes",
                "info" => "Méconnaissance des consignes de sécurité pouvant générer des atteintes à la santé et des accidents du travail.",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Milieu hyperbare",
                "info" => "Milieu hyperbare pouvant générer des accidents et / ou des pathologies de décompression",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Nanomatériaux",
                "info" => "Nanomatériaux et nanoparticules pouvant générer des intoxications principalement par inhalation ou ingestion.",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Opérations de chargement",
                "info" => "Opérations de chargement et de déchargement de véhicule réalisées en coactivité entre la structure utilisatrice et une entreprise de transport, pouvant générer des atteintes à la santé et / ou des accidents",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Organisation du travail",
                "info" => "Organisation du travail, pouvant générer notamment des risques psychosociaux, troubles musculosquelettiques, accidents",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Plomb",
                "info" => "Plomb pouvant entrainer des atteintes graves au niveau du système nerveux, au niveau des reins, au niveau du sang, au niveau du système digestif, et sur le système reproducteur",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Postures pénibles",
                "info" => "Postures pénibles, travail statique pouvant générer fatigue et douleurs, accidents traumatiques et cardiovasculaires, TMS, dorso-lombalgies.",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Rayonnements ionisants",
                "info" => "Rayonnements ionisants pouvant générer des brûlures, des lésions cellulaires, des effets cancérogènes, mutagènes et reprotoxiques",
                "packs" => [
                    "compliance",
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Rayonnements optiques",
                "info" => "Rayonnements optiques pouvant générer des atteintes de la peau (brulure, vieillissement, cancer) et de l'œil (lésions de cornée, conjonctive, rétine et opacification du cristallin",
                "packs" => [
                    "compliance",
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Risques interférence",
                "info" => "Risques liés à la l’interférence entre plusieurs activités pouvant générer des atteintes à la santé et / ou des accidents",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Risques psychosociaux",
                "info" => "Risques psychosociaux dont harcèlement moral et sexuel, agression, harcèlement et violence interne et externes (morale, verbale, physique, à caractère sexuel) pouvant mettre en péril la santé et la sécurité des salariés, affecter la dignité et le devenir professionnel et / ou générer des maladies cardio-vasculaires, troubles anxiodépressifs, stress, épuisement professionnel ou burnout, suicide.",
                "packs" => [
                    "compliance",
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Risques routiers",
                "info" => "Risques routiers durant le trajet domicile travail pouvant générer des atteintes traumatiques plus ou moins sévères ou le décès (1ère cause de mortalité au travail)",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Risques routiers mission",
                "info" => "Risques routiers en mission à l'extérieur des locaux de la structure pouvant générer stress, TMS, dorso-lombalgies, et atteintes traumatiques plus ou moins sévères",
                "packs" => [
                    "compliance",
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Télétravail",
                "info" => "Télétravail réalisé au domicile pouvant engendrer des risques physiques (musculosquelettiques, visuels, électriques, ...), des risques liés à une mauvaise ergonomie du poste de travail ou à une installation défectueuse ; et des risques psychosociaux.",
                "packs" => [
                    "compliance",
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Températures extrêmes",
                "info" => "Températures extrêmes liées aux postes de travail (hors températures extérieures) pouvant générer fatigue, sueurs, nausées, maux de tête, vertiges, crampes, déshydratation, coup de chaleur, engourdissement, gelures, hypothermie",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Travail de nuit",
                "info" => "Travail de nuit entre 21h et 6 heures, ou en équipes successives alternantes pouvant générer des troubles du sommeil, des troubles cardiovasculaires, des cancers",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Travail isolé",
                "info" => "Travail isolé pouvant générer des contraintes supplémentaires et augmenter les difficultés à secourir",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Travail répétitif",
                "info" => "Travail répétitif pouvant générer stress, TMS, dorso-lombalgies",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Vibrations corps",
                "info" => "Vibrations transmises au corps entier pouvant générer des dorso-lombalgies, hernies discales.",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
            [
                "name" => "Vibrations mains",
                "info" => "Vibrations transmises aux mains et aux bras pouvant générer des pathologies des articulations du poignet ou du coude, un syndrome de Raynaud ou des troubles neurologiques.",
                "packs" => [
                    "tranquility",
                    "serenity"
                ]
            ],
        ];

        foreach ($dangers as $danger) {
            $new_danger = new Danger();
            $new_danger->id = uniqid();
            $new_danger->name = $danger["name"];
            $new_danger->info = $danger["info"];
            $new_danger->save();

            foreach ($danger["packs"] as $pack_name) {
                $pack = Pack::where('name', $pack_name)->first();

                $new_danger->packs()->attach($pack);
            }
        }
    }
}
