@extends('app')

@section('content')

<div class="container-fluid main">
    @include('utils/header')
    <div class="row body">
        <div class="col-2">
            @include('utils.sidebar')
        </div>
        <div class="col-10 content">
            <div class="row header">
                <div class="col-12 mt-5 mb-5">
                    <h1>Présentation de la structure</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="card">
                        <form action="#">
                            <div class="card-header">
                                <h2>Informations générales</h2>
                                <button type="button" class="btn-main-inv">Modifier<i class="far fa-edit"></i></button>
                            </div>
                            <div class="card-body">
                                <div class="row pb-3 pt-3">
                                    <div class="col-3">
                                        <div class="form-group float-right">
                                            <label for="nameCompagny">Nom de l'entreprise</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="NameCompagny" placeholder="Indiquer le nom de votre entreprise" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-3 pt-3">
                                    <div class="col-3 card-body-title">
                                        <div class="form-group float-right">
                                            <label for="adressePostal">Adresse postale</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h3>Adresse de l’entreprise</h3>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="adressePostal" placeholder="Ligne 1" disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="adressePostal2" placeholder="Ligne 2" disabled>
                                        </div>
                                    </div>
                                    <div class="col-3"></div>
                                    <div class="col-3">
                                        <div class="form-group float-right">
                                            <label for="postalCode">Code postal</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="postalCode" placeholder="Code postal" disabled>
                                        </div>
                                    </div>
                                    <div class="col-3"></div>
                                    <div class="col-3">
                                        <div class="form-group float-right">
                                            <label for="city">Ville</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="city" placeholder="Ville" disabled>
                                        </div>
                                    </div>
                                    <div class="col-3"></div>
                                </div>
                                <div class="row pb-3 pt-3 btn-foot d-none">
                                    <div class="col-3"></div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <button class="btn-main btn-main--green mr-3">Enregistrer</button>
                                            <a class="btn-cancel">Annuler</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="card">
                        <form action="#">
                            <div class="card-header">
                                <h2>Informations générales</h2>
                                <button type="button" class="btn-main-inv">Modifier<i class="far fa-edit"></i></button>
                            </div>
                            <div class="card-body">
                                <div class="row pb-3 pt-3">
                                    <div class="col-3">
                                        <div class="form-group float-right">
                                            <label for="activity">Secteur d’activité</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <select class="form-control" id="activity" disabled>
                                                <option selected>Sélectionner un secteur</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-3 pt-3">
                                    <div class="col-3">
                                        <div class="form-group float-right">
                                            <label for="descCompagny">Description de l’entreprise</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <textarea class="form-control" id="descCompagny" rows="5" disabled placeholder="Oui "></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-3 pt-3 btn-foot d-none">
                                    <div class="col-3"></div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <button class="btn-main btn-main--green mr-3">Enregistrer</button>
                                            <a class="btn-cancel">Annuler</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="card">
                        <form action="#">
                            <div class="card-header">
                                <h2>Responsable du document au sein de l’entreprise</h2>
                                <button type="button" class="btn-main-inv">Modifier<i class="far fa-edit"></i></button>
                            </div>
                            <div class="card-body">
                                <div class="row pb-3 pt-3">
                                    <div class="col-3">
                                        <div class="form-group float-right">
                                            <label for="firstname">Prénom</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="firstname" placeholder="Prénom du responsable du DU" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-3 pt-3">
                                    <div class="col-3">
                                        <div class="form-group float-right">
                                            <label for="lastname">Nom</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="lastname" placeholder="Nom du responsable du DU" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-3 pt-3">
                                    <div class="col-3">
                                        <div class="form-group float-right">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" placeholder="Email" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-3 pt-3">
                                    <div class="col-3">
                                        <div class="form-group float-right">
                                            <label for="phoneNumber">Téléphone</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="phoneNumber" placeholder="Téléphone" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-3 pt-3 btn-foot d-none">
                                    <div class="col-3"></div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <button class="btn-main btn-main--green mr-3">Enregistrer</button>
                                            <a class="btn-cancel">Annuler</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h2>Responsable du document au sein de l’entreprise</h2>
                            <button class="btn-main">+ AJOUTER UNE UNITE DE TRAVAIL</button>
                        </div>
                        <div class="card-body">
                            <div class="row pb-3 pt-3">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><i class="fas fa-male"></i></th>
                                        <th>Unité de travail</th>
                                        <th>Activité</th>
                                        <th>Matériel</th>
                                        <th>Véhicule</th>
                                        <th>Engins et appareil</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>43</th>
                                        <td class="agent">Agent technique</td>
                                        <td class="activity">► Maintenir en propreté l’établissement (intérieur et extérieur), notamment aménager, débarrasser et nettoyer les salles de cours, nettoyer les tableaux et goulottes à craies, nettoyer les bureaux, les circulations et les escaliers, nettoyer et désinfecter les sanitaires, nettoyer les vitrages en face intérieure avec des manches télescopiques, collecter et évacuer les déchets, nettoyer et sortir les conteneurs.
                                            ► Assurer l’alimentation en encre, en toner et en papier des photocopieurs de la salle de reprographie ; réaliser l’impression, la plastification et la reliure de document pour les professeurs et l’administration, effectuer le suivi des entretiens des photocopieurs et des matériels de reprographie ; acheminer des courriers, et transporter des personnes avec un véhicule de l’établissement.
                                            ► Le gardien d’astreinte est chargé d’assurer la surveillance nocturne de l’établissement, notamment : ouvrir et fermer des accès à l’établissement en assurant une surveillance technique lors de rondes dans les locaux (éclairages, portes, fenêtres, appareils électriques…), contrôler le bon fonctionnement des dispositifs de surveillance et d’alarme, surveiller et contrôler les accès aux bâtiments et équipements, détecter et signaler les comportements ou actes pouvant affecter la sécurité, rédiger un rapport en cas d’incident, gérer les appels téléphoniques aux horaires de fermeture au public, assurer l’accès des secours lorsque nécessaire.</td>
                                        <td>
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
                                        </td>
                                        <td>
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
                                        </td>
                                        <td>
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
                                        </td>
                                        <td><i class="far fa-edit"></i><i class="fas fa-trash"></i></td>
                                    </tr>
                                    <tr>
                                        <th>43</th>
                                        <td class="agent">Agent technique</td>
                                        <td class="activity">► Maintenir en propreté l’établissement (intérieur et extérieur), notamment aménager, débarrasser et nettoyer les salles de cours, nettoyer les tableaux et goulottes à craies, nettoyer les bureaux, les circulations et les escaliers, nettoyer et désinfecter les sanitaires, nettoyer les vitrages en face intérieure avec des manches télescopiques, collecter et évacuer les déchets, nettoyer et sortir les conteneurs.
                                            ► Assurer l’alimentation en encre, en toner et en papier des photocopieurs de la salle de reprographie ; réaliser l’impression, la plastification et la reliure de document pour les professeurs et l’administration, effectuer le suivi des entretiens des photocopieurs et des matériels de reprographie ; acheminer des courriers, et transporter des personnes avec un véhicule de l’établissement.
                                            ► Le gardien d’astreinte est chargé d’assurer la surveillance nocturne de l’établissement, notamment : ouvrir et fermer des accès à l’établissement en assurant une surveillance technique lors de rondes dans les locaux (éclairages, portes, fenêtres, appareils électriques…), contrôler le bon fonctionnement des dispositifs de surveillance et d’alarme, surveiller et contrôler les accès aux bâtiments et équipements, détecter et signaler les comportements ou actes pouvant affecter la sécurité, rédiger un rapport en cas d’incident, gérer les appels téléphoniques aux horaires de fermeture au public, assurer l’accès des secours lorsque nécessaire.</td>
                                        <td>
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
                                        </td>
                                        <td>
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
                                        </td>
                                        <td>
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
                                        </td>
                                        <td><i class="far fa-edit"></i><i class="fas fa-trash"></i></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script src="/js/app/dashboard.js"></script>
@endsection
