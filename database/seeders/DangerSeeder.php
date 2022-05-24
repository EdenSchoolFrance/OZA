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
        $pack_compliance = Pack::where('name', 'compliance')->first();
        $pack_tranquility = Pack::where('name', 'tranquility')->first();
        $pack_serenity = Pack::where('name', 'serenity')->first();

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Absence personne \"compétente\"";
        $danger->info = "Absence d'une personne \"compétente\" pour s'occuper des activités de protection et de prévention des risques professionnels de la structure.";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Accident";
        $danger->info = "Accident, presqu'accident et maladie du travail non ou mal analysés et prévenus pouvant générer la répétition de ces faits.";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Agents biologiques";
        $danger->info = "Agents biologiques (bactéries, virus) pouvant générer infections, intoxications, allergies, cancers, zoonoses.";
        $danger->save();
        $danger->packs()->attach($pack_compliance);
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Agents chimiques";
        $danger->info = "Agents chimiques pouvant générer des intoxications aigües ou chroniques, cancers, brûlures.";
        $danger->save();
        $danger->packs()->attach($pack_compliance);
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Agression et violence";
        $danger->info = "Agression et violence interne et externes, à caractère sexuel ou non, pouvant mettre en péril la santé et la sécurité des salariés, notamment : vols, rackets, agression physique, agression verbale.";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Ambiances thermiques";
        $danger->info = "Ambiances thermiques liées aux températures extérieures (hors températures liées aux postes de travail) pouvant générer fatigue, sueurs, nausées, maux de tête, vertiges, crampes, déshydratation, coup de chaleur, engourdissement, gelures, hypothermie.";
        $danger->save();
        $danger->packs()->attach($pack_compliance);
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Amiante maladie";
        $danger->info = "Amiante pouvant entrainer de graves maladies respiratoires : plaques pleurales, asbestose, cancer de la plèvre ou du poumon.";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Aptitude travail";
        $danger->info = "Aptitude au travail, non respectée elle peut générer ou provoquer la rechute d'atteintes à la santé un accident du travail.";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Bruit";
        $danger->info = "Bruit pouvant provoquer atteinte auditive, surdité, stress, fatigue";
        $danger->save();
        $danger->packs()->attach($pack_compliance);
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Champs électromagnétiques";
        $danger->info = "Champs électromagnétiques pouvant générer vertiges, nausées, troubles visuels, brûlures, dysfonctionnement d'implants actifs";
        $danger->save();
        $danger->packs()->attach($pack_compliance);
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Chute liquide";
        $danger->info = "Chute à l'eau ou dans un autre liquide pouvant générer une atteinte à la santé ou la noyade";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Chute d'objets";
        $danger->info = "Chute d'objets, renversements et effondrements pouvant générer traumatismes, plaies, fractures, écrasement";
        $danger->save();
        $danger->packs()->attach($pack_compliance);
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Chutes de hauteur";
        $danger->info = "Chutes de hauteur y compris chute dans les escaliers, pouvant générer traumatismes, plaies, fractures, noyade";
        $danger->save();
        $danger->packs()->attach($pack_compliance);
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Circulation à pied";
        $danger->info = "Circulation à pied pouvant provoquer des chutes de plain-pied (glissades, trébuchements, pertes d’équilibre sur une surface “plane” : surfaces ne présentant aucune rupture de niveau ou bien des ruptures de niveau réduites (trottoir, petites marches, plan incliné, etc.)) ; ou provoquer des chocs à l'origine de traumatismes, plaies, fractures";
        $danger->save();
        $danger->packs()->attach($pack_compliance);
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Produits, matériels ...";
        $danger->info = "Dangers des produits, matériels, installations et activités de l'atelier pouvant générer des blessures et des atteintes à la santé.";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Déplacements";
        $danger->info = "Déplacements dans l'enceinte de la structure avec un véhicule motorisé ou non pouvant générer des TMS, dorso-lombalgies, plaies, traumatismes, fractures, écrasement";
        $danger->save();
        $danger->packs()->attach($pack_compliance);
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Eclairage";
        $danger->info = "Eclairage inadapté pouvant générer éblouissement, fatigue et inconfort visuel, chute, traumatisme, atteinte visuelle, erreur d'appréciation";
        $danger->save();
        $danger->packs()->attach($pack_compliance);
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Ecrans";
        $danger->info = "Ecrans de visualisation pouvant générer fatigue visuelle, troubles musculosquelettiques et stress";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Electricité";
        $danger->info = "Electricité pouvant générer brûlures, électrisation, électrocution, chute de hauteur";
        $danger->save();
        $danger->packs()->attach($pack_compliance);
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Espaces confinés";
        $danger->info = "Espaces confinés et manque d'aération pouvant générer intoxication ou asphyxie";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Incapacité porter secours";
        $danger->info = "Incapacité à porter secours dans des délais raisonnables, pouvant aggraver la situation initiale.";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Incapacité stopper situation";
        $danger->info = "Incapacité à stopper et prévenir une situation de danger grave et imminent pour la santé ou la sécurité.";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Incendie, explosion";
        $danger->info = "Incendie et explosion pouvant générer des brûlures, plaies, traumatismes, fractures";
        $danger->save();
        $danger->packs()->attach($pack_compliance);
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Intempéries";
        $danger->info = "Intempéries telles que la pluie, le vent, la neige, le brouillard, … , hors températures extérieures ; pouvant générer des atteintes à la santé, des glissades et des chutes, des risques d'effondrement ou d'ensevelissement";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Machines";
        $danger->info = "Machines ; outils électroportatifs, thermiques et pneumatiques ; outils à main et équipements de travail ; pouvant générer des plaies, coupures, lacérations, amputations, brulures, traumatismes, fractures, écrasements";
        $danger->save();
        $danger->packs()->attach($pack_compliance);
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Manutentions manuelles";
        $danger->info = "Manutentions manuelles pouvant générer TMS, dorso-lombalgie, traumatisme, plaie, coupure, brûlures.";
        $danger->save();
        $danger->packs()->attach($pack_compliance);
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Manutentions mécanique";
        $danger->info = "Manutentions mécanique pouvant générer écrasement, traumatisme, plaie, coupure";
        $danger->save();
        $danger->packs()->attach($pack_compliance);
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Méconnaissance de l'évolution";
        $danger->info = "Méconnaissance de l'évolution de la règlementions en santé et sécurité au travail pouvant générer des atteintes à la santé et des accidents du travail";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Méconnaissance des risques";
        $danger->info = "Méconnaissance des risques et des consignes de sécurité pouvant générer des atteintes à la santé et des accidents du travail";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Milieu hyperbare";
        $danger->info = "Milieu hyperbare pouvant générer des accidents et / ou des pathologies de décompression";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Nanomatériaux";
        $danger->info = "Nanomatériaux et nanoparticules pouvant générer des intoxications principalement par inhalation ou ingestion.";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Opérations de chargement";
        $danger->info = "Opérations de chargement et de déchargement de véhicule réalisées en coactivité entre la structure utilisatrice et une entreprise de transport, pouvant générer des atteintes à la santé et / ou des accidents";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Organisation du travail";
        $danger->info = "Organisation du travail, pouvant générer notamment des risques psychosociaux, troubles musculosquelettiques, accidents";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Plomb";
        $danger->info = "Plomb pouvant entrainer des atteintes graves au niveau du système nerveux, au niveau des reins, au niveau du sang, au niveau du système digestif, et sur le système reproducteur";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Postures pénibles";
        $danger->info = "Postures pénibles, travail statique pouvant générer fatigue et douleurs, accidents traumatiques et cardiovasculaires, TMS, dorso-lombalgies.";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Rayonnements ionisants";
        $danger->info = "Rayonnements ionisants pouvant générer des brûlures, des lésions cellulaires, des effets cancérogènes, mutagènes et reprotoxiques";
        $danger->save();
        $danger->packs()->attach($pack_compliance);
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Rayonnements optiques";
        $danger->info = "Rayonnements optiques pouvant générer des atteintes de la peau (brulure, vieillissement, cancer) et de l'œil (lésions de cornée, conjonctive, rétine et opacification du cristallin";
        $danger->save();
        $danger->packs()->attach($pack_compliance);
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Risques interférence";
        $danger->info = "Risques liés à la l’interférence entre plusieurs activités pouvant générer des atteintes à la santé et / ou des accidents";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Risques psychosociaux";
        $danger->info = "Risques psychosociaux dont harcèlement moral et sexuel, agression, harcèlement et violence interne et externes (morale, verbale, physique, à caractère sexuel) pouvant mettre en péril la santé et la sécurité des salariés, affecter la dignité et le devenir professionnel et / ou générer des maladies cardio-vasculaires, troubles anxiodépressifs, stress, épuisement professionnel ou burnout, suicide.";
        $danger->save();
        $danger->packs()->attach($pack_compliance);
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Risques routiers";
        $danger->info = "Risques routiers durant le trajet domicile travail pouvant générer des atteintes traumatiques plus ou moins sévères ou le décès (1ère cause de mortalité au travail)";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Risques routiers mission";
        $danger->info = "Risques routiers en mission à l'extérieur des locaux de la structure pouvant générer stress, TMS, dorso-lombalgies, et atteintes traumatiques plus ou moins sévères";
        $danger->save();
        $danger->packs()->attach($pack_compliance);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Télétravail";
        $danger->info = "Télétravail réalisé au domicile pouvant engendrer des risques physiques (musculosquelettiques, visuels, électriques, ...), des risques liés à une mauvaise ergonomie du poste de travail ou à une installation défectueuse ; et des risques psychosociaux.";
        $danger->save();
        $danger->packs()->attach($pack_compliance);
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Températures extrêmes";
        $danger->info = "Températures extrêmes liées aux postes de travail (hors températures extérieures) pouvant générer fatigue, sueurs, nausées, maux de tête, vertiges, crampes, déshydratation, coup de chaleur, engourdissement, gelures, hypothermie";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Travail de nuit";
        $danger->info = "Travail de nuit entre 21h et 6 heures, ou en équipes successives alternantes pouvant générer des troubles du sommeil, des troubles cardiovasculaires, des cancers";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Travail isolé";
        $danger->info = "Travail isolé pouvant générer des contraintes supplémentaires et augmenter les difficultés à secourir";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Travail répétitif";
        $danger->info = "Travail répétitif pouvant générer stress, TMS, dorso-lombalgies";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Vibrations corps";
        $danger->info = "Vibrations transmises au corps entier pouvant générer des dorso-lombalgies, hernies discales.";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = "Vibrations mains";
        $danger->info = "Vibrations transmises aux mains et aux bras pouvant générer des pathologies des articulations du poignet ou du coude, un syndrome de Raynaud ou des troubles neurologiques.";
        $danger->save();
        $danger->packs()->attach($pack_tranquility);
        $danger->packs()->attach($pack_serenity);
    }
}
