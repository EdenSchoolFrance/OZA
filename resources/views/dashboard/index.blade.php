@extends('app')

@section('content')

<div class="container-fluid main">
    @include('utils/header')
    <div class="row body">
        <div class="col-12">
            <div class="side">
                @php
                    $sidebar = "structure";
                    $sousSidebar = "pres";
                @endphp
                @include('utils.sidebar')
            </div>
            <div class="content">
                <div class="row header">
                    <div class="col-12">
                        <h1>Présentation de la structure</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-5">
                        <div class="card">
                            <form action="#">
                                <div class="card-header">
                                    <h2>Informations générales</h2>
                                    <button type="button" class="btn-main btn-main--inv">Modifier<i class="far fa-edit"></i></button>
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
                                                <a class="btn-main btn-main--cancel">Annuler</a>
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
                                    <button type="button" class="btn-main btn-main--inv">Modifier<i class="far fa-edit"></i></button>
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
                                                <a class="btn-main btn-main--cancel">Annuler</a>
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
                                    <button type="button" class="btn-main btn-main--inv">Modifier<i class="far fa-edit"></i></button>
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
                                                <a class="btn-main btn-main--cancel">Annuler</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
