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
            <hr>
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

            <hr>

            <div class="row">
                <div class="line">
                    <div class="left">
                        <h3>Définition des mesures de prévention et de protection existantes</h3>
                    </div>
                    <div class="right">
                    </div>
                </div>
            </div>

            {{--<div class="row">
                <div class="line">
                    <div class="left">
                        <label>Mesures existantes</label>
                    </div>
                    <div class="right">
                        <ul>
                            <li>
                                <p>
                                    <i class="far fa-times-circle"></i>
                                    Matériels conformes, utilisés et entretenus dans les règles de l’art, en respectant les préconisations de la notice du constructeur
                                    <button data-modal=".modal--delete" data-id="{{ $restrain->id }}"><i class="far fa-edit text-color-yellow"></i></button>
                                </p>
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
            </div>--}}

            <div class="restraint">
                <div class="row">
                    <div class="line">
                        <div class="left">
                        </div>
                        <div class="right">
                            <ul>
                                <li>
                                    <p>
                                        <i class="far fa-times-circle btn-delete"></i>
                                        Matériels conformes, utilisés et entretenus dans les règles de l’art, en respectant les préconisations de la notice du constructeur
                                        <button data-modal=".modal--risk" data-id="576312553" class="btn btn-yellow btn-text btn-edit-modal-risk" type="button"><i class="far fa-edit text-color-yellow"></i></button>
                                        <input type="hidden" value="good,good,null" name="restraint[]">
                                    </p>
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
            </div>


            <div class="row">
                <div class="line">
                    <div class="left">
                    </div>
                    <div class="right">
                        <ul>
                            <li>
                                <button data-modal=".modal--risk" data-id="" type="button" class="btn btn-yellow btn-text btn-open-risk">+ Ajouter une mesure existante</button>
                            </li>
                            <li>
                                <span class="bold">Valeur du risque résiduel évaluée :&nbsp;</span> <button type="button" class="btn btn-danger btn-small">24</button>
                            </li>
                            <li>
                                <span class="bold">Criticité de la situation actuelle :&nbsp;</span> <button type="button" class="btn btn-danger btn-small">STOP</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="line">
                    <div class="left">
                        <label>Mesures proposées</label>
                    </div>
                    <div class="right">
                        <ul class="restraint-proposed">
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
                <button class="btn btn-success">Valider le danger</button>
            </div>
        </div>
    </form>






    <div class="modal modal--risk">
        <div class="modal-dialog modal-dialog-large">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="title">Ajouter une nouvelle mesure déjà mise en place</p>
                    <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="line">
                            <div class="left">
                                <label for="nameRisk">Intitulé du risque</label>
                            </div>
                            <div class="right">
                                <input type="email" class="form-control" id="nameRisk" placeholder="Vente - Boulangerie pâtisserie">
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
                                    <div class="radio-bar radio-bar-tech">
                                        <label class="con">
                                            <input type="radio" checked name="tech" value="very good">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="tech" value="good">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="tech" value="medium">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="tech" value="null">
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
                                    <div class="radio-bar radio-bar-orga">
                                        <label class="con">
                                            <input type="radio" checked name="orga" value="very good">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="orga" value="good">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="orga" value="medium">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="orga" value="null">
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
                                    <div class="radio-bar radio-bar-human">
                                        <label class="con">
                                            <input type="radio" checked="checked" name="human" value="very good">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="human" value="good">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="human" value="medium">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="human" value="null">
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
                                <button type="button" class="btn btn-success btn-modal-risk-add btn-close" data-dismiss="modal">Ajouter</button>
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
    <script src="/js/app/risk.js"></script>
@endsection
