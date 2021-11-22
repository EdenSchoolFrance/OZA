@extends('app')

@section('content')
<div class="content">
    <div class="card card--work_units">
        <div class="card-header">
            <button class="btn-resize-all btn btn-text"><i class="far fa-minus-square"></i> Afficher/cacher tous les détails</button>
            <a href="{{ route('work.create') }}" class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UNE UNITE DE TRAVAIL</a>
        </div>
        <div class="card-body">
            <table class="table table--work_units table--resizable">
                <thead>
                    <tr>
                        <th class="th_status"></th>
                        <th class="th_number_employee"><i class="fas fa-user"></i></th>
                        <th class="th_work_unit">Unité de travail</th>
                        <th class="th_activity">Activité</th>
                        <th class="th_material">Matériel</th>
                        <th class="th_vehicle">Véhicule</th>
                        <th class="th_gear_apparatus">Engins et appareil</th>
                        <th class="th_actions"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td_status">
                            <button class="btn-resize-row btn btn-text"><i class="far fa-minus-square"></i></button>
                            <i class="fas fa-check fa-check-checked"></i>
                        </td>
                        <td class="td_number_employee">43</td>
                        <td class="td_work_unit">
                            <div class="table-resizable">
                                <p>Administratif</p>
                            </div>
                        </td>
                        <td class="td_activity">
                            <div class="table-resizable">
                                <p>► Maintenir en propreté l’établissement (intérieur et extérieur), notamment aménager, débarrasser et nettoyer les salles de cours, nettoyer les tableaux et goulottes à craies, nettoyer les bureaux, les circulations et les escaliers, nettoyer et désinfecter les sanitaires, nettoyer les vitrages en face intérieure avec des manches télescopiques, collecter et évacuer les déchets, nettoyer et sortir les conteneurs.</p>
                                <p>► Assurer l’alimentation en encre, en toner et en papier des photocopieurs de la salle de reprographie ; réaliser l’impression, la plastification et la reliure de document pour les professeurs et l’administration, effectuer le suivi des entretiens des photocopieurs et des matériels de reprographie ; acheminer des courriers, et transporter des personnes avec un véhicule de l’établissement.</p>
                                <p>► Le gardien d’astreinte est chargé d’assurer la surveillance nocturne de l’établissement, notamment : ouvrir et fermer des accès à l’établissement en assurant une surveillance technique lors de rondes dans les locaux (éclairages, portes, fenêtres, appareils électriques…), contrôler le bon fonctionnement des dispositifs de surveillance et d’alarme, surveiller et contrôler les accès aux bâtiments et équipements, détecter et signaler les comportements ou actes pouvant affecter la sécurité, rédiger un rapport en cas d’incident, gérer les appels téléphoniques aux horaires de fermeture au public, assurer l’accès des secours lorsque nécessaire.</p>
                            </div>
                        </td>
                        <td class="td_material">
                            <div class="table-resizable">
                                <div class="list_group">
                                    <p class="title">Communication</p>
                                    <p class="content">
                                        téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie
                                    </p>
                                </div>
                                <div class="list_group">
                                    <p class="title">Bureautique</p>
                                    <p class="content">
                                        ordinateur, ordinateur portable, écran supplémentaire, imprimante, imprimante multifonctions, destructeur de documents, relieuse, massicot, cutter, meuble de classement, bureau, chaise, petit matériel de bureautique classique
                                    </p>
                                </div>
                                <div class="list_group">
                                    <p class="title">Entretien des locaux</p>
                                    <p class="content">
                                        aspirateur, balai, balai plat avec lavette, seau, chariot de ménage avec seau et presse, pelle, poubelle
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="td_vehicle">
                            <div class="table-resizable">
                                <div class="list_group">
                                    <p class="title">Deux roues</p>
                                    <p class="content">
                                        vélo, vélo électrique, vélo-cargo électrique, cyclomoteur, scooter, moto,
                                    </p>
                                </div>
                                <div class="list_group">
                                    <p class="title">Véhicule léger</p>
                                    <p class="content">
                                        véhicule de tourisme, camionnette, fourgon, fourgon avec hayon hydraulique, camion avec benne hydraulique, camionnette frigorifique, fourgon frigorifique, camionnette isotherme, fourgon isotherme                                </p>
                                </div>
                                <div class="list_group">
                                    <p class="title">Poids lourd</p>
                                    <p class="content">
                                        camion benne, camion polybenne, camion tôlé, camion bâché, camion frigorifique, camion citerne, camion porte-conteneur
                                    </p>
                                </div>
                                <div class="list_group">
                                    <p class="title">Super Lourd</p>
                                    <p class="content">
                                        tracteur et remorque tôlée, tracteur et remorque bâchée, tracteur et remorque citerne, camion et remorque, porte-char, 
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="td_gear_apparatus">
                            <div class="table-resizable">
                                <div class="list_group">
                                    <p class="title">Engin</p>
                                    <p class="content">
                                        tracto-pelle, chargeur, bull, pelle mécanique à roues, pelle à chanilles, mini-pelle, 
                                    </p>
                                </div>
                                <div class="list_group">
                                    <p class="title">Engin de manutention mécanique</p>
                                    <p class="content">
                                        chariot élévateur électrique, chariot élévateur thermique, PEMP électrique non automotrice, PEMP automotrice électrique, PEMP automotrice thermique, PEMP sur véhicule porteur, grue auxilaire sur véhicule porteur, grue hydraulique automotrice, grue à tour,
                                    </p>
                                </div>
                                <div class="list_group">
                                    <p class="title">Appareil de manutention mécanique</p>
                                    <p class="content">
                                        palan à chaine, palan électrique, pont élévateur avec palan, pont hydraylique 2 colonnes, pont hydraulique 4 colonnes, monte-meubles, monte-charge de chantier, potence hydraulique, potence avec palan électrique,
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="td_actions"><i class="far fa-edit"></i><i class="fas fa-trash"></i></td>
                    </tr>
                    <tr>
                        <td class="td_status">
                            <button class="btn-resize-row btn btn-text"><i class="far fa-minus-square"></i></button>
                            <i class="fas fa-check fa-check-checked"></i>
                        </td>
                        <td class="td_number_employee">43</td>
                        <td class="td_work_unit">
                            <div class="table-resizable">
                                <p>Agent technique</p>
                            </div>
                        </td>
                        <td class="td_activity">
                            <div class="table-resizable">
                                <p>► Maintenir en propreté l’établissement (intérieur et extérieur), notamment aménager, débarrasser et nettoyer les salles de cours, nettoyer les tableaux et goulottes à craies, nettoyer les bureaux, les circulations et les escaliers, nettoyer et désinfecter les sanitaires, nettoyer les vitrages en face intérieure avec des manches télescopiques, collecter et évacuer les déchets, nettoyer et sortir les conteneurs.</p>
                                <p>► Assurer l’alimentation en encre, en toner et en papier des photocopieurs de la salle de reprographie ; réaliser l’impression, la plastification et la reliure de document pour les professeurs et l’administration, effectuer le suivi des entretiens des photocopieurs et des matériels de reprographie ; acheminer des courriers, et transporter des personnes avec un véhicule de l’établissement.</p>
                                <p>► Le gardien d’astreinte est chargé d’assurer la surveillance nocturne de l’établissement, notamment : ouvrir et fermer des accès à l’établissement en assurant une surveillance technique lors de rondes dans les locaux (éclairages, portes, fenêtres, appareils électriques…), contrôler le bon fonctionnement des dispositifs de surveillance et d’alarme, surveiller et contrôler les accès aux bâtiments et équipements, détecter et signaler les comportements ou actes pouvant affecter la sécurité, rédiger un rapport en cas d’incident, gérer les appels téléphoniques aux horaires de fermeture au public, assurer l’accès des secours lorsque nécessaire.</p>
                            </div>
                        </td>
                        <td class="td_material">
                            <div class="table-resizable">
                                <div class="list_group">
                                    <p class="title">Communication</p>
                                    <p class="content">
                                        téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie
                                    </p>
                                </div>
                                <div class="list_group">
                                    <p class="title">Bureautique</p>
                                    <p class="content">
                                        ordinateur, ordinateur portable, écran supplémentaire, imprimante, imprimante multifonctions, destructeur de documents, relieuse, massicot, cutter, meuble de classement, bureau, chaise, petit matériel de bureautique classique
                                    </p>
                                </div>
                                <div class="list_group">
                                    <p class="title">Entretien des locaux</p>
                                    <p class="content">
                                        aspirateur, balai, balai plat avec lavette, seau, chariot de ménage avec seau et presse, pelle, poubelle
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="td_vehicle">
                            <div class="table-resizable">
                                <div class="list_group">
                                    <p class="title">Deux roues</p>
                                    <p class="content">
                                        vélo, vélo électrique, vélo-cargo électrique, cyclomoteur, scooter, moto,
                                    </p>
                                </div>
                                <div class="list_group">
                                    <p class="title">Véhicule léger</p>
                                    <p class="content">
                                        véhicule de tourisme, camionnette, fourgon, fourgon avec hayon hydraulique, camion avec benne hydraulique, camionnette frigorifique, fourgon frigorifique, camionnette isotherme, fourgon isotherme                                </p>
                                </div>
                                <div class="list_group">
                                    <p class="title">Poids lourd</p>
                                    <p class="content">
                                        camion benne, camion polybenne, camion tôlé, camion bâché, camion frigorifique, camion citerne, camion porte-conteneur
                                    </p>
                                </div>
                                <div class="list_group">
                                    <p class="title">Super Lourd</p>
                                    <p class="content">
                                        tracteur et remorque tôlée, tracteur et remorque bâchée, tracteur et remorque citerne, camion et remorque, porte-char, 
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="td_gear_apparatus">
                            <div class="table-resizable">
                                <div class="list_group">
                                    <p class="title">Engin</p>
                                    <p class="content">
                                        tracto-pelle, chargeur, bull, pelle mécanique à roues, pelle à chanilles, mini-pelle, 
                                    </p>
                                </div>
                                <div class="list_group">
                                    <p class="title">Engin de manutention mécanique</p>
                                    <p class="content">
                                        chariot élévateur électrique, chariot élévateur thermique, PEMP électrique non automotrice, PEMP automotrice électrique, PEMP automotrice thermique, PEMP sur véhicule porteur, grue auxilaire sur véhicule porteur, grue hydraulique automotrice, grue à tour,
                                    </p>
                                </div>
                                <div class="list_group">
                                    <p class="title">Appareil de manutention mécanique</p>
                                    <p class="content">
                                        palan à chaine, palan électrique, pont élévateur avec palan, pont hydraylique 2 colonnes, pont hydraulique 4 colonnes, monte-meubles, monte-charge de chantier, potence hydraulique, potence avec palan électrique,
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="td_actions"><i class="far fa-edit"></i><i class="fas fa-trash"></i></td>
                    </tr>
                    <tr class="tr_resized">
                        <td class="td_status">
                            <button class="btn-resize-row btn btn-text"><i class="far fa-minus-square"></i></button>
                            <i class="fas fa-check"></i>
                        </td>
                        <td class="td_number_employee">43</td>
                        <td class="td_work_unit">
                            <div class="table-resizable" style="height: 100px">
                                <p>Agent technique</p>
                            </div>
                        </td>
                        <td class="td_activity">
                            <div class="table-resizable" style="height: 100px">
                                <p>► Maintenir en propreté l’établissement (intérieur et extérieur), notamment aménager, débarrasser et nettoyer les salles de cours, nettoyer les tableaux et goulottes à craies, nettoyer les bureaux, les circulations et les escaliers, nettoyer et désinfecter les sanitaires, nettoyer les vitrages en face intérieure avec des manches télescopiques, collecter et évacuer les déchets, nettoyer et sortir les conteneurs.</p>
                                <p>► Assurer l’alimentation en encre, en toner et en papier des photocopieurs de la salle de reprographie ; réaliser l’impression, la plastification et la reliure de document pour les professeurs et l’administration, effectuer le suivi des entretiens des photocopieurs et des matériels de reprographie ; acheminer des courriers, et transporter des personnes avec un véhicule de l’établissement.</p>
                                <p>► Le gardien d’astreinte est chargé d’assurer la surveillance nocturne de l’établissement, notamment : ouvrir et fermer des accès à l’établissement en assurant une surveillance technique lors de rondes dans les locaux (éclairages, portes, fenêtres, appareils électriques…), contrôler le bon fonctionnement des dispositifs de surveillance et d’alarme, surveiller et contrôler les accès aux bâtiments et équipements, détecter et signaler les comportements ou actes pouvant affecter la sécurité, rédiger un rapport en cas d’incident, gérer les appels téléphoniques aux horaires de fermeture au public, assurer l’accès des secours lorsque nécessaire.</p>
                            </div>
                        </td>
                        <td class="td_material">
                            <div class="table-resizable" style="height: 100px">
                                <div class="list_group">
                                    <p class="title">Communication</p>
                                    <p class="content">
                                        téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie
                                    </p>
                                </div>
                                <div class="list_group">
                                    <p class="title">Bureautique</p>
                                    <p class="content">
                                        ordinateur, ordinateur portable, écran supplémentaire, imprimante, imprimante multifonctions, destructeur de documents, relieuse, massicot, cutter, meuble de classement, bureau, chaise, petit matériel de bureautique classique
                                    </p>
                                </div>
                                <div class="list_group">
                                    <p class="title">Entretien des locaux</p>
                                    <p class="content">
                                        aspirateur, balai, balai plat avec lavette, seau, chariot de ménage avec seau et presse, pelle, poubelle
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="td_vehicle">
                            <div class="table-resizable" style="height: 100px">
                                <div class="list_group">
                                    <p class="title">Deux roues</p>
                                    <p class="content">
                                        vélo, vélo électrique, vélo-cargo électrique, cyclomoteur, scooter, moto,
                                    </p>
                                </div>
                                <div class="list_group">
                                    <p class="title">Véhicule léger</p>
                                    <p class="content">
                                        véhicule de tourisme, camionnette, fourgon, fourgon avec hayon hydraulique, camion avec benne hydraulique, camionnette frigorifique, fourgon frigorifique, camionnette isotherme, fourgon isotherme                                </p>
                                </div>
                                <div class="list_group">
                                    <p class="title">Poids lourd</p>
                                    <p class="content">
                                        camion benne, camion polybenne, camion tôlé, camion bâché, camion frigorifique, camion citerne, camion porte-conteneur
                                    </p>
                                </div>
                                <div class="list_group">
                                    <p class="title">Super Lourd</p>
                                    <p class="content">
                                        tracteur et remorque tôlée, tracteur et remorque bâchée, tracteur et remorque citerne, camion et remorque, porte-char, 
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="td_gear_apparatus">
                            <div class="table-resizable" style="height: 100px">
                                <div class="list_group">
                                    <p class="title">Engin</p>
                                    <p class="content">
                                        tracto-pelle, chargeur, bull, pelle mécanique à roues, pelle à chanilles, mini-pelle, 
                                    </p>
                                </div>
                                <div class="list_group">
                                    <p class="title">Engin de manutention mécanique</p>
                                    <p class="content">
                                        chariot élévateur électrique, chariot élévateur thermique, PEMP électrique non automotrice, PEMP automotrice électrique, PEMP automotrice thermique, PEMP sur véhicule porteur, grue auxilaire sur véhicule porteur, grue hydraulique automotrice, grue à tour,
                                    </p>
                                </div>
                                <div class="list_group">
                                    <p class="title">Appareil de manutention mécanique</p>
                                    <p class="content">
                                        palan à chaine, palan électrique, pont élévateur avec palan, pont hydraylique 2 colonnes, pont hydraulique 4 colonnes, monte-meubles, monte-charge de chantier, potence hydraulique, potence avec palan électrique,
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="td_actions"><i class="far fa-edit"></i><i class="fas fa-trash"></i></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td colspan="6" class="content">
                            <div>
                                <div>
                                    <p class="title">TOTAL</p>
                                    <div>
                                        <button type="button" class="btn btn-small btn-dark-purple">120</button>
                                        <p>salarié(s) inscrit(s) sur le registre du personnel</p>
                                    </div>
                                </div>
                                <a href="/risk/accident/create" class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UNE UNITE DE TRAVAIL</a>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        on('.btn-resize-row', 'click', (el, e) => {
            let row = el.closest('tr');
            let elements = $('div.table-resizable', row);

            if (row.classList.contains('tr_resized')) {
                elements.forEach(element => {
                    DOMAnimations.slideDown(element, '300', '100px');
                });

                row.classList.remove('tr_resized');
            } else {
                elements.forEach(element => {
                    DOMAnimations.slideUp(element, '300', '100px');
                });

                row.classList.add('tr_resized');
            }
        });

        on('.btn-resize-all', 'click', (el, e) => {
            let card = el.closest('.card');
            let rows;

            if (card.classList.contains('card--resized')) {
                rows = $('table tr.tr_resized', card);
            } else {
                rows = $('table tr:not(.tr_resized)', card);
            }

            rows.forEach(row => {
                let elements = $('div.table-resizable', row);

                if (row.classList.contains('tr_resized')) {
                    elements.forEach(element => {
                        DOMAnimations.slideDown(element, '300', '100px');
                    });
                } else {
                    elements.forEach(element => {
                        DOMAnimations.slideUp(element, '300', '100px');
                    });
                }

                row.classList.toggle('tr_resized');
            });

            card.classList.toggle('card--resized');

            

            
        });
    </script>
@endsection
