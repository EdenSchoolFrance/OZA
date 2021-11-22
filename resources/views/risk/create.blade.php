@extends('app')

@section('content')


<div class="content">
    <form action="#" class="card card--add-risk">
        <div class="card-body">
            <div class="row">
                <div class="line">
                    <div class="left">
                        <label for="nameRisk">Intitulé du risque</label>
                    </div>
                    <div class="right">
                        <input type="email" class="form-control" id="workName" placeholder="Vente - Boulangerie pâtisserie">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="line">
                    <div class="left">
                        <h3>Evaluation du risque identifié</h3>
                    </div>
                    <div class="right">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="line">
                    <div class="left">
                        <label>Fréquence</label>
                    </div>
                    <div class="right">
                        <div class="radio-bar-content">
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
                        <i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="line">
                    <div class="left">
                        <label>Probabilité</label>
                    </div>
                    <div class="right">
                        <div class="radio-bar-content">
                            <div class="radio-bar">
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
                        <i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="line">
                    <div class="left">
                        <label>Gravité potentiel</label>
                    </div>
                    <div class="right">
                        <div class="radio-bar-content">
                            <div class="radio-bar">
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
                        <i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="line">
                    <div class="left">
                        <label>Gravité potentiel</label>
                    </div>
                    <div class="right ">
                        <div class="radio-bar-content">
                            <div class="radio-bar radio-bar--inv">
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
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="line">
                    <div class="left">
                    </div>
                    <div class="right">
                        <span class="bold">Valeur du risque brut évaluée :&nbsp;</span> <button type="button" class="btn btn-success btn-small">10</button>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="line">
                    <div class="left">
                        <h3>Définition des mesures de prévention et de protection existantes</h3>
                    </div>
                    <div class="right">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="line">
                    <div class="left">
                        <label>Mesures existantes</label>
                    </div>
                    <div class="right">
                        <ul>
                            <li>
                                <p> <i class="far fa-times-circle"></i> Matériels conformes, utilisés et entretenus dans les règles de l’art, en respectant les préconisations de la notice du constructeur <i class="far fa-edit text-color-yellow"></i></p>
                            </li>

                            <li>
                                Technique : <span class="text-color-green bold">BON</span>
                            </li>
                            <li>
                                Organisationnelle : <span class="text-color-green bold">BON</span>
                            </li>
                            <li>
                                Humain : <span class="text-color-red bold">NULLE</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="line">
                    <div class="left">
                    </div>
                    <div class="right">
                        <ul>
                            <li>
                                <p> <i class="far fa-times-circle"></i> Matériels conformes, utilisés et entretenus dans les règles de l’art, en respectant les préconisations de la notice du constructeur <i class="far fa-edit text-color-yellow"></i></p>
                            </li>

                            <li>
                                Technique : <span class="text-color-green bold">BON</span>
                            </li>
                            <li>
                                Organisationnelle : <span class="text-color-green bold">BON</span>
                            </li>
                            <li>
                                Humain : <span class="text-color-red bold">NULLE</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row card card--add-risk">

                <form action="" class="">
                    <div class="card-header">
                        <h2 class="text-color-yellow">Ajouter une nouvelle mesure déjà mise en place</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="line">
                                <div class="left">
                                    <label for="nameRisk">Intitulé du risque</label>
                                </div>
                                <div class="right">
                                    <input type="email" class="form-control" id="workName" placeholder="Vente - Boulangerie pâtisserie">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="line">
                                <div class="left">
                                    <h3>Evaluation du risque identifié</h3>
                                </div>
                                <div class="right">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="line">
                                <div class="left">
                                    <label>Technique</label>
                                </div>
                                <div class="right">
                                    <div class="radio-bar-content">
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
                                    <i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="line">
                                <div class="left">
                                    <label>Organisationnelle</label>
                                </div>
                                <div class="right">
                                    <div class="radio-bar-content">
                                        <div class="radio-bar">
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
                                    <i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="line">
                                <div class="left">
                                    <label>Humaine</label>
                                </div>
                                <div class="right">
                                    <div class="radio-bar-content">
                                        <div class="radio-bar">
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
                                    <i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="line">
                                <div class="left">
                                </div>
                                <div class="right">
                                    <button type="button" class="btn btn-success">Ajouter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="line">
                    <div class="left">
                        <label>Mesures proposées</label>
                    </div>
                    <div class="right">
                        <ul>
                            <li>
                                <p> <i class="far fa-times-circle"></i> Accueil des clients</p>
                            </li>
                            <li>
                                <p> <i class="far fa-times-circle"></i> Présentation et conseils sur les produits</p>
                            </li>
                            <li>
                                <button class="btn btn-yellow btn-text">+ Ajouter une mesure proposée</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="line">
                    <div class="left">
                    </div>
                    <div class="right">
                        <span class="bold">Valeur du risque résiduel évaluée :&nbsp;</span> <button type="button" class="btn btn-danger btn-small">24</button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="line">
                    <div class="left">
                        <span class="bold">Criticité de la situation actuelle</span>
                    </div>
                    <div class="right">
                        <button type="button" class="btn btn-danger">STOP</button>
                    </div>
                </div>
            </div>
            <div class="row row--submit">
                <button class="btn btn-success" disabled>Valider le danger</button>
            </div>
        </div>
    </form>
</div>
</div>

@endsection

@section('script')
    <script src="/js/app/accident.js"></script>
@endsection
