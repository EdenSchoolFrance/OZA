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
                <div class="col-md-6 col-12 mb-5">
                    <div class="card">
                        <form action="#">
                            <div class="card-header">
                                <h2>Informations générales</h2>
                            </div>
                            <div class="card-body">
                                <div class="row pb-3 pt-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="nameCompagny">Nom de l'entreprise</label>
                                            <input type="email" class="form-control" id="NameCompagny" placeholder="Indiquer le nom de votre entreprise">
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-3 pt-3">
                                    <div class="col-12">
                                        <h3>Adresse de l’entreprise</h3>
                                        <div class="form-group">
                                            <label for="adressePostal">Adresse postale</label>
                                            <input type="email" class="form-control" id="adressePostal" placeholder="Ligne 1">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="adressePostal2" placeholder="Ligne 2">
                                        </div>
                                </div>
                                </div>
                                <div class="row pb-3 pt-3">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="postalCode">Code postal</label>
                                            <input type="email" class="form-control" id="postalCode" placeholder="Code postal">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="city">Ville</label>
                                            <input type="email" class="form-control" id="city" placeholder="Ville">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-12 mb-5">
                    <div class="card">
                        <form action="#">
                            <div class="card-header">
                                <h2>Informations générales</h2>
                            </div>
                            <div class="card-body">
                                <div class="row pb-3 pt-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="activity">Secteur d’activité</label>
                                            <select class="form-control" id="activity">
                                                <option>Sélectionner un secteur</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-3 pt-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="descCompagny">Description de l’entreprise</label>
                                            <textarea class="form-control" id="descCompagny" rows="5"></textarea>
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
                            </div>
                            <div class="card-body">
                                <div class="row pb-3 pt-3">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="firstname">Prénom</label>
                                            <input type="email" class="form-control" id="firstname" placeholder="Prénom du responsable du DU">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="lastname">Nom</label>
                                            <input type="email" class="form-control" id="lastname" placeholder="Nom du responsable du DU">
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-3 pt-3">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="phoneNumber">Téléphone</label>
                                            <input type="email" class="form-control" id="phoneNumber" placeholder="Téléphone">
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

@endsection

@section('script')
@endsection
