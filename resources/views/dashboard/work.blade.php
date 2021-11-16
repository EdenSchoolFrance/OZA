@extends('app')

@section('content')
<div class="body">
    <div class="card card--table-works">
        <div class="card-header">
            <div></div>
            <button class="btn btn-add"><i class="fas fa-plus"></i> AJOUTER UN UTILISATEUR</button>
        </div>
        <div class="card-body">
            
        </div>
    </div>
</div>

{{-- <div class="container-fluid main workunit">
    @include('utils/header')
    <div class="row body">

        <div class="col-12">
            <div class="side">
                @php
                    $sidebar = "structure";
                    $sousSidebar = "unit-work";
                @endphp
                @include('utils.sidebar')
            </div>
            <div class="content">
                <div class="row header">
                    <div class="col-12">
                        <h1>Présentation de la structure</h1>
                    </div>
                    <div class="col-12 d-flex justify-content-start header-icon header-info">
                        <div class="ml-3 mr-4"><i class="fas fa-info-circle"></i></div>
                        <div>
                            <p>
                                L’article R.4121-1 du Code du travail « DOCUMENT UNIQUE D’EVALUATION DES RISQUES » précise :
                                <br>
                                « Cette évaluation comporte un inventaire des risques identifiés dans chaque unité de travail de l’entreprise ou de l’établissement ».
                                <br>
                                Le législateur n’a pas défini « l’unité de travail ». Nous l’entendons ici comme un poste de travail, un métier ou une activité.
                                <br>
                                Les unités de travail sont détaillées dans la partie « Présentation de la structure » à partir de la page 5 de ce Document Unique.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-between mb-2 ">
                        <h3 class="show-detail-work">
                            <i class="far fa-plus-square ml-2 mr-2"></i>
                            Afficher le détail de toutes les unités de travail
                        </h3>
                        <button class="btn-main">+ AJOUTER UNE UNITE DE TRAVAIL</button>
                    </div>
                    <div class="col-12 mb-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="row pb-3 pt-3">
                                    <div class="tableNew">
                                        <div class="rowTable">
                                            <div class="spaceTable"></div>
                                            <div class="cellTable"><i class="fas fa-male"></i></div>
                                            <div class="cellTable">Unité de travail</div>
                                            <div class="cellTable">Activité</div>
                                            <div class="cellTable">Matériel</div>
                                            <div class="cellTable">Véhicule</div>
                                            <div class="cellTable">Engins et appareil</div>
                                            <div class="spaceTable"></div>
                                        </div>
                                        <div class="rowTable">
                                            <div class="spaceTable">
                                                <div class="upTable">
                                                    <i class="far fa-minus-square"></i>
                                                    <div>
                                                        <i class="fas fa-check text-color-green"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cellTable">43</div>
                                            <div class="cellTable agent">Agent technique</div>
                                            <div class="cellTable activity">
                                                <div>
                                                    <p>
                                                    ► Maintenir en propreté l’établissement (intérieur et extérieur), notamment aménager, débarrasser et nettoyer les salles de cours, nettoyer les tableaux et goulottes à craies, nettoyer les bureaux, les circulations et les escaliers, nettoyer et désinfecter les sanitaires, nettoyer les vitrages en face intérieure avec des manches télescopiques, collecter et évacuer les déchets, nettoyer et sortir les conteneurs.<br>
                                                    ► Assurer l’alimentation en encre, en toner et en papier des photocopieurs de la salle de reprographie ; réaliser l’impression, la plastification et la reliure de document pour les professeurs et l’administration, effectuer le suivi des entretiens des photocopieurs et des matériels de reprographie ; acheminer des courriers, et transporter des personnes avec un véhicule de l’établissement.<br>
                                                    ► Le gardien d’astreinte est chargé d’assurer la surveillance nocturne de l’établissement, notamment : ouvrir et fermer des accès à l’établissement en assurant une surveillance technique lors de rondes dans les locaux (éclairages, portes, fenêtres, appareils électriques…), contrôler le bon fonctionnement des dispositifs de surveillance et d’alarme, surveiller et contrôler les accès aux bâtiments et équipements, détecter et signaler les comportements ou actes pouvant affecter la sécurité, rédiger un rapport en cas d’incident, gérer les appels téléphoniques aux horaires de fermeture au public, assurer l’accès des secours lorsque nécessaire
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="cellTable">
                                                <div>
                                                    <div>
                                                        <h6>Communication</h6>
                                                        <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                    </div>
                                                    <div>
                                                        <h6>Communication</h6>
                                                        <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                    </div>
                                                    <div>
                                                        <h6>Communication</h6>
                                                        <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cellTable">
                                                <div>
                                                    <h6>Communication</h6>
                                                    <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                </div>
                                                <div>
                                                    <h6>Communication</h6>
                                                    <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                </div>
                                                <div>
                                                    <h6>Communication</h6>
                                                    <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                </div>
                                            </div>
                                            <div class="cellTable">
                                                <div>
                                                    <h6>Communication</h6>
                                                    <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                </div>
                                                <div>
                                                    <h6>Communication</h6>
                                                    <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                </div>
                                                <div>
                                                    <h6>Communication</h6>
                                                    <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                </div>
                                            </div>
                                            <div class="spaceTable">
                                                <i class="far fa-edit"></i>
                                                <i class="fas fa-trash"></i>
                                            </div>
                                        </div>
                                        <div class="rowTable">
                                            <div class="spaceTable">
                                                <div class="upTable">
                                                    <i class="far fa-minus-square"></i>
                                                    <div>
                                                        <i class="fas fa-check text-color-green"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cellTable">43</div>
                                            <div class="cellTable agent">Agent technique</div>
                                            <div class="cellTable activity">
                                                <div>
                                                    <p>
                                                        ► Maintenir en propreté l’établissement (intérieur et extérieur), notamment aménager, débarrasser et nettoyer les salles de cours, nettoyer les tableaux et goulottes à craies, nettoyer les bureaux, les circulations et les escaliers, nettoyer et désinfecter les sanitaires, nettoyer les vitrages en face intérieure avec des manches télescopiques, collecter et évacuer les déchets, nettoyer et sortir les conteneurs.<br>
                                                        ► Assurer l’alimentation en encre, en toner et en papier des photocopieurs de la salle de reprographie ; réaliser l’impression, la plastification et la reliure de document pour les professeurs et l’administration, effectuer le suivi des entretiens des photocopieurs et des matériels de reprographie ; acheminer des courriers, et transporter des personnes avec un véhicule de l’établissement.<br>
                                                        ► Le gardien d’astreinte est chargé d’assurer la surveillance nocturne de l’établissement, notamment : ouvrir et fermer des accès à l’établissement en assurant une surveillance technique lors de rondes dans les locaux (éclairages, portes, fenêtres, appareils électriques…), contrôler le bon fonctionnement des dispositifs de surveillance et d’alarme, surveiller et contrôler les accès aux bâtiments et équipements, détecter et signaler les comportements ou actes pouvant affecter la sécurité, rédiger un rapport en cas d’incident, gérer les appels téléphoniques aux horaires de fermeture au public, assurer l’accès des secours lorsque nécessaire
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="cellTable">
                                                <div>
                                                    <div>
                                                        <h6>Communication</h6>
                                                        <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                    </div>
                                                    <div>
                                                        <h6>Communication</h6>
                                                        <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                    </div>
                                                    <div>
                                                        <h6>Communication</h6>
                                                        <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cellTable">
                                                <div>
                                                    <h6>Communication</h6>
                                                    <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                </div>
                                                <div>
                                                    <h6>Communication</h6>
                                                    <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                </div>
                                                <div>
                                                    <h6>Communication</h6>
                                                    <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                </div>
                                            </div>
                                            <div class="cellTable">
                                                <div>
                                                    <h6>Communication</h6>
                                                    <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                </div>
                                                <div>
                                                    <h6>Communication</h6>
                                                    <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                </div>
                                                <div>
                                                    <h6>Communication</h6>
                                                    <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                </div>
                                            </div>
                                            <div class="spaceTable">
                                                <i class="far fa-edit"></i>
                                                <i class="fas fa-trash"></i>
                                            </div>
                                        </div>
                                        <div class="rowTable">
                                            <div class="spaceTable">
                                                <div class="upTable">
                                                    <i class="far fa-minus-square"></i>
                                                    <div>
                                                        <i class="fas fa-check text-color-green"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cellTable">43</div>
                                            <div class="cellTable agent">Agent technique</div>
                                            <div class="cellTable activity">
                                                <div>
                                                    <p>
                                                        ► Maintenir en propreté l’établissement (intérieur et extérieur), notamment aménager, débarrasser et nettoyer les salles de cours, nettoyer les tableaux et goulottes à craies, nettoyer les bureaux, les circulations et les escaliers, nettoyer et désinfecter les sanitaires, nettoyer les vitrages en face intérieure avec des manches télescopiques, collecter et évacuer les déchets, nettoyer et sortir les conteneurs.<br>
                                                        ► Assurer l’alimentation en encre, en toner et en papier des photocopieurs de la salle de reprographie ; réaliser l’impression, la plastification et la reliure de document pour les professeurs et l’administration, effectuer le suivi des entretiens des photocopieurs et des matériels de reprographie ; acheminer des courriers, et transporter des personnes avec un véhicule de l’établissement.<br>
                                                        ► Le gardien d’astreinte est chargé d’assurer la surveillance nocturne de l’établissement, notamment : ouvrir et fermer des accès à l’établissement en assurant une surveillance technique lors de rondes dans les locaux (éclairages, portes, fenêtres, appareils électriques…), contrôler le bon fonctionnement des dispositifs de surveillance et d’alarme, surveiller et contrôler les accès aux bâtiments et équipements, détecter et signaler les comportements ou actes pouvant affecter la sécurité, rédiger un rapport en cas d’incident, gérer les appels téléphoniques aux horaires de fermeture au public, assurer l’accès des secours lorsque nécessaire
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="cellTable">
                                                <div>
                                                    <div>
                                                        <h6>Communication</h6>
                                                        <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                    </div>
                                                    <div>
                                                        <h6>Communication</h6>
                                                        <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                    </div>
                                                    <div>
                                                        <h6>Communication</h6>
                                                        <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cellTable">
                                                <div>
                                                    <h6>Communication</h6>
                                                    <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                </div>
                                                <div>
                                                    <h6>Communication</h6>
                                                    <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                </div>
                                                <div>
                                                    <h6>Communication</h6>
                                                    <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                </div>
                                            </div>
                                            <div class="cellTable">
                                                <div>
                                                    <h6>Communication</h6>
                                                    <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                </div>
                                                <div>
                                                    <h6>Communication</h6>
                                                    <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                </div>
                                                <div>
                                                    <h6>Communication</h6>
                                                    <p>téléphone filaire, téléphone DECT, téléphone GSM, casque téléphonique filaire, casque téléphonique bluetooth, réseau Wifi, talkie-walkie</p>
                                                </div>
                                            </div>
                                            <div class="spaceTable">
                                                <i class="far fa-edit"></i>
                                                <i class="fas fa-trash"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-foot">
                                <div class="row work-unit">
                                    <div class="col-12 pt-3 pb-3">
                                        <h4>TOTAL</h4>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between">
                                        <p>
                                            <span>120</span>
                                            salarié(s) inscrit(s) sur le registre du personnel
                                        </p>
                                        <button class="btn-main mb-5 float-right">+ AJOUTER UNE UNITE DE TRAVAIL</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection

@section('script')
    <script src="/js/app/dashboard.js"></script>
@endsection
