@extends('app')

@section('content')

<div class="container-fluid main">
    @include('utils/header')
    <div class="row body">

        <div class="col-12  risk risk--accident">
            <div class="side">
                @php
                    $sidebar = "risk-pro";
                    $sousSidebar = "accident";
                @endphp
                @include('utils.sidebar')
            </div>
            <div class="content">
                <div class="row header">
                    <div class="col-12">
                        <a href="/risk/accident" class="btn-main btn-main--back"> <i class="fas fa-angle-left"></i> Retour</a>
                    </div>
                    <div class="col-12 d-flex justify-content-start">
                        <h1>Evaluation des risques professionnels</h1>
                    </div>
                    <div class="col-12 d-flex justify-content-start header-danger">
                        <p>Danger :</p>
                        <p>
                            Accident, presqu’accident et maladie du travail non ou mal analysés et prévenus pouvant générer la répétition de ces faits.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-5">
                        <div class="card">
                            <form action="#">
                                <div class="card-header">
                                    <h2>Ajouter un risque</h2>
                                </div>
                                <div class="card-body risk-add">
                                    <div class="row pb-5 pt-3">
                                        <div class="col-3">
                                            <div class="form-group float-right">
                                                <label for="nameRisk">Intitulé du risque</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="nameRisk" placeholder="Indiquer le nom de votre entreprise">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pb-3 pt-3">
                                        <div class="col-12">
                                            <h3>Evaluation du risque identifié</h3>
                                        </div>
                                        <div class="col-3 mt-5">
                                            <div class="form-group float-right">
                                                <label>Fréquence</label>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-5 radio-bar-content">
                                            <div class="form-group">
                                                <div class="radio-bar">
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="frequency">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="frequency">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="frequency">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="frequency">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="frequency">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="radio-title">
                                                    <label>Jour</label>
                                                    <label>Semaine</label>
                                                    <label>Mois</label>
                                                    <label>Années</label>
                                                    <label>>Années</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 mt-5 help"><i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i></div>
                                        <div class="col-3 mt-5">
                                            <div class="form-group float-right">
                                                <label>Probabilité</label>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-5 radio-bar-content">
                                            <div class="form-group">
                                                <div class="radio-bar radio-bar--white">
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="probability">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="probability">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="probability">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="probability">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="probability">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="radio-title">
                                                    <label>Très élevée</label>
                                                    <label>Élevée</label>
                                                    <label>Non faible</label>
                                                    <label>Faible</label>
                                                    <label>Très faible</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 mt-5 help"><i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i></div>
                                        <div class="col-3 mt-5">
                                            <div class="form-group float-right">
                                                <label>Gravité potentiel</label>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-5 radio-bar-content">
                                            <div class="form-group">
                                                <div class="radio-bar radio-bar--white">
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="gravity">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="gravity">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="gravity">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="gravity">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="gravity">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="radio-title">
                                                    <label>Décès</label>
                                                    <label>IPP</label>
                                                    <label>AAA</label>
                                                    <label>ASA</label>
                                                    <label>Impact faible</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 mt-5 help"><i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i></div>
                                        <div class="col-3 mt-5">
                                            <div class="form-group float-right">
                                                <label>Gravité potentiel</label>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-5 radio-bar-content">
                                            <div class="form-group d-flex justify-content-start">
                                                <label class="con"> Non
                                                    <input type="radio" checked="checked" name="gender">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="con"> Homme
                                                    <input type="radio" checked="checked" name="gender">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="con"> Femme
                                                    <input type="radio" checked="checked" name="gender">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-3 mt-5 help"><i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i></div>
                                        <div class="offset-3 col-9 mt-5">
                                            <span class="bold">Valeur du risque brut évaluée : </span><button type="button" class="btn-main btn-main--green btn-main--fake ml-3">10</button>
                                        </div>
                                    </div>
                                    {{--
                                        Cut section (delete his when developement stade is finish)
                                    --}}
                                    <div class="row pb-3 pt-3">
                                        <div class="col-3 d-flex justify-content-end">
                                            <h3>Définition des mesures de prévention et de protection existantes</h3>
                                        </div>
                                        <div class="col-9"></div>
                                        <div class="col-3 mt-5">
                                            <div class="form-group float-right">
                                                <label>Mesures existantes</label>
                                            </div>
                                        </div>
                                        <div class="col-9 mt-5">
                                            <div class="form-group">
                                                <ul>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Matériels conformes, utilisés et entretenus dans les règles de l’art, en respectant les préconisations de la notice du constructeur</p>
                                                        <i class="far fa-edit"></i>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Présentation et conseils sur les produits</p>
                                                    </li>
                                                    <li>
                                                        <button type="button" class="btn-main btn-main--text">+ Ajouter une mesure existante</button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-3 d-flex justify-content-end">
                                            <h3>Evaluation de la mesure décrite</h3>
                                        </div>
                                        <div class="col-9"></div>
                                        <div class="col-3 mt-5">
                                            <div class="form-group float-right">
                                                <label>Technique</label>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-5 radio-bar-content">
                                            <div class="form-group">
                                                <div class="radio-bar">
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="tech">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="tech">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="tech">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="tech">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="radio-title">
                                                    <label>Très bon</label>
                                                    <label>Bon</label>
                                                    <label>Moyen</label>
                                                    <label>Nulle</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 mt-5 help"><i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i></div>
                                        <div class="col-3 mt-5">
                                            <div class="form-group float-right">
                                                <label>Organisationnelle</label>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-5 radio-bar-content">
                                            <div class="form-group">
                                                <div class="radio-bar radio-bar--white">
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="orga">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="orga">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="orga">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="orga">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="radio-title">
                                                    <label>Très bon</label>
                                                    <label>Bon</label>
                                                    <label>Moyen</label>
                                                    <label>Nulle</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 mt-5 help"><i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i></div>
                                        <div class="col-3 mt-5">
                                            <div class="form-group float-right">
                                                <label>Humaine</label>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-5 radio-bar-content">
                                            <div class="form-group">
                                                <div class="radio-bar radio-bar--white">
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="human">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="human">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="human">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" checked="checked" name="human">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="radio-title">
                                                    <label>Très bon</label>
                                                    <label>Bon</label>
                                                    <label>Moyen</label>
                                                    <label>Nulle</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 mt-5 help"><i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i></div>
                                        <div class="offset-3 col-9 mt-5">
                                            <div class="form-group">
                                                <span class="bold">Valeur du risque résiduel évaluée : </span><button type="button" class="btn-main btn-main--red btn-main--fake ml-3">24</button>
                                            </div>
                                            <div class="form-group">
                                                <span class="bold">Criticité de la situation actuelle : </span><button type="button" class="btn-main btn-main--red btn-main--fake ml-3">STOP</button>
                                            </div>
                                        </div>
                                        <div class="col-3"></div>
                                        <div class="col-9"></div>
                                        <div class="col-3 mt-5">
                                            <div class="form-group float-right">
                                                <label>Plan d’action
                                                    Mesures proposées</label>
                                            </div>
                                        </div>
                                        <div class="col-9 mt-5">
                                            <div class="form-group">
                                                <ul>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Accueil des clients</p>
                                                        <i class="far fa-edit"></i>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-times-circle"></i>
                                                        <p>Présentation et conseils sur les produits</p>
                                                        <i class="far fa-edit"></i>
                                                    </li>
                                                    <li>
                                                        <button type="button" class="btn-main btn-main--text">+ Ajouter une mesure proposée</button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pb-3 pt-3 btn-foot">
                                        <div class="col-12 d-flex justify-content-center">
                                            <button class="btn-main btn-main--green mr-3">AJOUTER LE RISQUE</button>
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
    <script src="/js/app/accident.js"></script>
@endsection
