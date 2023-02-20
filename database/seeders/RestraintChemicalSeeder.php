<?php

namespace Database\Seeders;

use App\Models\RestraintChemical;
use Illuminate\Database\Seeder;

class RestraintChemicalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Aspirer les fumées à la source avec une table aspirante, ou un bras aspirant, ou une torche aspirante.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Contrôler le port de gants étanches au produit.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Contrôler le port de lunettes étanches.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Contrôler le port du 1/2 masque de protection des voies respiratoires contre les gaz et vapeurs.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Contrôler le port du 1/2 masque de protection des voies respiratoires contre les poussières FFP2.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Contrôler le port du 1/2 masque de protection des voies respiratoires contre les poussières toxiques FFP3.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Contrôler le port du masque de protection des voies respiratoires adapté (voir FDS).";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Contrôler le port d'une combinaison de protection adaptée.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Contrôler périodiquement le bon fonctionnement de la ventilation mécanique.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Contrôler périodiquement le bon fonctionnement de la ventilation mécanique dans les aires de circulation des véhicules thermiques.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Mettre à disposition et faire porter des gants étanches au produit.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Mettre à disposition et faire porter des lunettes étanches.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Mettre à disposition et faire porter un 1/2 masque de protection des voies respiratoires contre les gaz et vapeurs.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Mettre à disposition et faire porter un 1/2 masque de protection des voies respiratoires contre les poussières FFP2.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Mettre à disposition et faire porter un 1/2 masque de protection des voies respiratoires contre les poussières toxiques FFP3.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Mettre à disposition et faire porter un masque de protection des voies respiratoires à ventilation assistée de type ABEKP3.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Mettre à disposition et faire porter un masque de protection des voies respiratoires adapté (voir FDS).";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Ne pas utiliser dans des locaux fermés non pourvus d'une ventilation mécanique correspondant aux caractéristiques d'un local à pollution spécifique.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Obligation règlementaire : Contrôler régulièrement les performances de l'installation de ventilation mécanique.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Obligation règlementaire : Faire procéder aux mesures d'exposition règlementaires.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Obligation règlementaire : Initier une démarche de substitution de ce produit CMR pour le remplacer par un produit non CMR.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Obligation règlementaire : Mettre en place une ventilation mécanique correspondant à un local à pollution spécifique.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Privilégier le travail à l'humide, et lorsque le travail à l'humide n'est pas possible, capter les poussières à la source à l'aide d'une ventilation mécanique et filtration.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Remplacer ce produit par un autre moins dangereux (phrases H).";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Remplacer le véhicule thermique par un véhicule électrique pour une utilisation en intérieur.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "S'assurer auprès du médecin du travail de l'aptitude des salariés à utiliser un appareil de protection des voies respiratoires à adduction d'air.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "S'assurer de la formation du personnel à l'utilisation des EPI, notamment de l'équipement de protection des voies respiratoires.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Se procurer une FDS récente (<1an).";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Si le captage à la source est impossible ou n'est pas suffisamment performant, mettre à disposition, former à l'utilisation et faire porter un masque à ventilation assistée de type FFP3.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Si travail en intérieur, équiper le local d'une ventilation mécanique adaptée à un local à pollution spécifique.";
        $restraint->save();

        $restraint = new RestraintChemical();
        $restraint->id = uniqid();
        $restraint->name = "Utiliser avec une ventilation mécanique performante de type sorbonne.";
        $restraint->save();
    }
}
