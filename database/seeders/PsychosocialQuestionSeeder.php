<?php

namespace Database\Seeders;

use App\Models\PsychosocialQuestion;
use Illuminate\Database\Seeder;

class PsychosocialQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "name" => "Contraintes de rythmes de  travail",
                "info" => "Etes-vous soumis à des contraintes de rythme de travail élevé imposées par exemple par la cadence d’une machine, une norme de production, la dépendance vis-à-vis de collègues en amont ou en aval, … ?",
            ],
            [
                "name" => "Confrontation à la souffrance d'autrui",
                "info" => "Dans le cadre de votre activité, êtes-vous amené à devoir traiter la situation de personnes en souffrance physique, psychologique ou sociale ; sans avoir les moyens de leur venir en aide ou de résoudre leurs problèmes ?",
            ],
            [
                "name" => "Maîtrise des émotions",
                "info" => "Dans votre travail, si vous devez adopter envers du public ou des clients une attitude bienveillante et disponible en toutes circonstances, est-ce une contrainte pour vous ?",
            ],
            [
                "name" => "Compatibilité des instructions de travail entre elles",
                "info" => "Recevez-vous des instructions, des ordres ou des demandes qui peuvent être contradictoires entre eux ?",
            ],
            [
                "name" => "Gestion de la planification et de la polyvalence",
                "info" => "Etes-vous polyvalent et amené à changer de poste de travail à l'improviste, dans l’urgence et sans préparation, pour répondre aux contraintes du moment ?",
            ],
            [
                "name" => "Interruption dans le travail",
                "info" => "Etes-vous fréquemment interrompu de façon inopinée au cours de votre travail, ce qui vous oblige à suspendre votre tâche principale pour en traiter d’autre(s) ?",
            ],
            [
                "name" => "Attention et vigilance dans le travail",
                "info" => "Votre travail nécessite-t-il une attention soutenue ou une vigilance permanente, par exemple pour des activités de surveillance ou de contrôle, sans pause ?",
            ],
            [
                "name" => "Durée hebdomadaire du travail",
                "info" => "Vous arrive-t-il de travailler plus de 45 heures par semaine ?",
            ],
            [
                "name" => "Travail en horaires atypiques",
                "info" => "Etes-vous soumis à des horaires de nuit, alternant (équipes), fractionnés, décalés, ou sur appel ?",
            ],
            [
                "name" => "Extension de la disponibilité en dehors des horaires de travail",
                "info" => "Etes-vous contacté en dehors des horaires de travail pour des raisons professionnelles (soir, nuit, WE, congés, jours fériés, …) ?",
            ],
            [
                "name" => "Insécurité socio- économique (emploi, salaires, carrière, …)",
                "info" => "Etes-vous confrontés à des incertitudes quant au maintien de votre activité dans les prochains mois ?",
            ],
            [
                "name" => "Tensions avec le public",
                "info" => "Etes-vous confrontés à des situations de tension avec, par exemple des clients, des usagers, des patients, des collègues, …, causées par, notamment, une mauvaise qualité de service, des délais d’attente jugés trop longs, … ?",
            ],
            [
                "name" => "Conciliation entre vie professionnelle et vie personnelle",
                "info" => "L'entreprise vous permet-elle de concilier vie professionnelle et vie personnelle, comme par exemple par la possibilité d’arrangement selon vos besoins ?",
            ],
            [
                "name" => "Niveau de précision des objectifs de travail",
                "info" => "Vos objectifs de travail sont-ils clairement définis (par exemple, nombre de vente à réaliser, durée pour la réalisation d’un chantier ou d’une activité, donner des réponses satisfaisantes aux demandes des clients) ?",
            ],
            [
                "name" => "Adéquation des objectifs avec les moyens et les responsabilités",
                "info" => "Vos objectifs sont-ils compatibles avec les moyens (humains, techniques) et responsabilités qui vous sont donnés pour les atteindre ?",
            ],
            [
                "name" => "Autonomie dans la tâche",
                "info" => "Disposez-vous de marges de manœuvre dans la manière de réaliser votre travail dès lors que les objectifs sont atteints (choix des gestes, des techniques, des outils) ?",
            ],
            [
                "name" => "Autonomie temporelle",
                "info" => "Pouvez-vous interrompre quelques minutes votre travail quand vous en ressentez le besoin ?",
            ],
            [
                "name" => "Utilisation et développement des compétences",
                "info" => "Dans votre travail, pouvez-vous pleinement utiliser vos compétences professionnelles et en développer de nouvelles ?",
            ],
            [
                "name" => "Soutien de la part des collègues",
                "info" => "Vos relations entre collègues sont-elles bonnes (confiance, entraide, convivialité au sein des équipes) ?",
            ],
            [
                "name" => "Soutien de la part des supérieurs hiérarchiques",
                "info" => "Recevez-vous un soutien de la part de vos supérieurs hiérarchiques ?",
            ],
            [
                "name" => "Violence interne au travail",
                "info" => "Règne-t-il un climat de courtoisie et de respect mutuel entre les salariés (absence de propos ou de comportements dégradants, méprisants, discriminatoires, voire de harcèlement moral ou sexuel) ?",
            ],
            [
                "name" => "Reconnaissance dans le travail",
                "info" => "Recevez-vous de la part de la structure, des marques de reconnaissance de votre travail (rémunération, statut, perspectives de carrière, attributions de moyens pour réaliser votre travail dans de bonnes conditions, éloges, distinction, …) ?",
            ],
            [
                "name" => "Qualité empêchée",
                "info" => "Considérez-vous que les moyens ou les délais dont vous disposez vous permettent de réaliser un travail de qualité ?",
            ],
            [
                "name" => "Travail inutile",
                "info" => "Estimez-vous que votre travail soit reconnu comme utile par la structure, les clients, les usagers, les patients, … ?",
            ],
            [
                "name" => "Prévisibilité des horaires de travail et anticipation de leur changement",
                "info" => "Connaissez-vous suffisamment à l'avance vos horaires de travail ou les changements éventuels de votre planning de travail ?",
            ],
            [
                "name" => "Conduite du changement dans l'entreprise",
                "info" => "Les changements stratégiques, organisationnels ou technologiques sont-ils suffisamment anticipés, accompagnés et vous sont-ils clairement expliqués ?",
            ],
        ];

        foreach ($data as $key => $question) {
            $newQuestion = new PsychosocialQuestion();
            $newQuestion->id = uniqid();
            $newQuestion->name = $question["name"];
            $newQuestion->info = $question["info"];
            $newQuestion->order = $key + 1;
            $newQuestion->save();
        }
    }
}
