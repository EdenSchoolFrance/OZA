@extends('app')

@section('content')

<div class="container-fluid main">
    @include('utils/header')
    <div class="row body">
        <div class="col-2">
            @php
                $sidebar = "structure";
                $sousSidebar = "unit-work";
            @endphp
            @include('utils.sidebar')
        </div>
        <div class="col-10 content create">
            <div class="row header">
                <div class="col-12 mt-5 mb-5">
                    <h1>Définition des unités de travail <a href="#"><i class="fas fa-chevron-left"></i> Retour</a></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="card">
                        <form action="#">
                            <div class="card-header">
                                <h2>Ajouter une unité de travail </h2>
                            </div>
                            <div class="card-body">
                                <div class="row pb-3 pt-3">
                                    <div class="col-3">
                                        <div class="form-group float-right">
                                            <label for="workName">Intitulé de l’unité de travail</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="workName" placeholder="Vente - Boulangerie pâtisserie">
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-3 pt-3">
                                    <div class="col-3">
                                        <div class="form-group float-right">
                                            <label for="nomberSal">Nombre de salariés concernés</label>
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <div class="form-group d-flex justify-content-start">
                                            <button type="button" class="btn-main btn-main--number" data-value="less">-</button>
                                            <input type="number" class="form-control" id="numberSal" placeholder="" value="0">
                                            <button type="button" class="btn-main btn-main--number" data-value="more">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-3 pt-3">
                                    <div class="col-3">
                                        <div class="form-group float-right">
                                            <label>Activités associées</label>
                                        </div>
                                    </div>
                                    <div class="col-9 ">
                                        <div class="row d-flex justify-content-start">
                                            <div class="form-group col-12">
                                                <ul>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Accueil des clients</p>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Présentation et conseils sur les produits</p>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Tranchage du pain</p>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Accueil physique et téléphonique des personnels, des étudiants, des personnes extérieures, réalisation de rondes le soir pour la fermeture des locaux, tenue du registre de sécurité et contrôle des entrées et sorties, gestion des clés (tenue du registre + boîte à clés), réception et diffusion du courrier, gestion des numéros d’urgence en cas de besoin, contrôle des livraisons et réception des bordereaux de livraison avec transmission au service intendance.</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="list-foot">
                                            <button class="btn-main btn-main--text">+ Ajouter une activité</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-3 pt-3">
                                    <div class="col-3">
                                        <div class="form-group float-right">
                                            <label>Matériels</label>
                                        </div>
                                    </div>
                                    <div class="col-9 ">
                                        <div class="row d-flex justify-content-start">
                                            <div class="form-group col-4">
                                                <ul>
                                                    <li class="list-head">
                                                        Communication
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone filaire</p>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone DECT</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="form-group col-4">
                                                <ul>
                                                    <li class="list-head">
                                                        Communication
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone filaire</p>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone DECT</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="form-group col-4">
                                                <ul>
                                                    <li class="list-head">
                                                        Communication
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone filaire</p>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone DECT</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="form-group col-4">
                                                <ul>
                                                    <li class="list-head">
                                                        Communication
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone filaire</p>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone DECT</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="form-group col-4">
                                                <ul>
                                                    <li class="list-head">
                                                        Communication
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone filaire</p>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone DECT</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="form-group col-4">
                                                <ul>
                                                    <li class="list-head">
                                                        Communication
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone filaire</p>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone DECT</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="list-foot">
                                            <button class="btn-main btn-main--text">+ Ajouter une activité</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-3 pt-3">
                                    <div class="col-3">
                                        <div class="form-group float-right">
                                            <label>Matériels</label>
                                        </div>
                                    </div>
                                    <div class="col-9 ">
                                        <div class="row d-flex justify-content-start">
                                            <div class="form-group col-4">
                                                <ul>
                                                    <li class="list-head">
                                                        Communication
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone filaire</p>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone DECT</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="form-group col-4">
                                                <ul>
                                                    <li class="list-head">
                                                        Communication
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone filaire</p>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone DECT</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="form-group col-4">
                                                <ul>
                                                    <li class="list-head">
                                                        Communication
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone filaire</p>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone DECT</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="form-group col-4">
                                                <ul>
                                                    <li class="list-head">
                                                        Communication
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone filaire</p>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone DECT</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="form-group col-4">
                                                <ul>
                                                    <li class="list-head">
                                                        Communication
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone filaire</p>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone DECT</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="form-group col-4">
                                                <ul>
                                                    <li class="list-head">
                                                        Communication
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone filaire</p>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone DECT</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="list-foot">
                                            <button class="btn-main btn-main--text">+ Ajouter une activité</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-3 pt-3">
                                    <div class="col-3">
                                        <div class="form-group float-right">
                                            <label>Matériels</label>
                                        </div>
                                    </div>
                                    <div class="col-9 ">
                                        <div class="row d-flex justify-content-start">
                                            <div class="form-group col-4">
                                                <ul>
                                                    <li class="list-head">
                                                        Communication
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone filaire</p>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone DECT</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="form-group col-4">
                                                <ul>
                                                    <li class="list-head">
                                                        Communication
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone filaire</p>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone DECT</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="form-group col-4">
                                                <ul>
                                                    <li class="list-head">
                                                        Communication
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone filaire</p>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone DECT</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="form-group col-4">
                                                <ul>
                                                    <li class="list-head">
                                                        Communication
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone filaire</p>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone DECT</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="form-group col-4">
                                                <ul>
                                                    <li class="list-head">
                                                        Communication
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone filaire</p>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone DECT</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="form-group col-4">
                                                <ul>
                                                    <li class="list-head">
                                                        Communication
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone filaire</p>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Téléphone DECT</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="list-foot">
                                            <button class="btn-main btn-main--text">+ Ajouter une activité</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-3 pt-3 btn-foot">
                                    <div class="col-12 d-flex justify-content-center">
                                        <div class="form-group">
                                            <button class="btn-main btn-main--green mr-3">Ajouter l’unité de travail</button>
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
    <script src="/js/app/dashboard.js"></script>
@endsection
