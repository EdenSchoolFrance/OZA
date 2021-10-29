@extends('app')

@section('content')

<div class="container-fluid main">
    @include('utils/header')
    <div class="row body">
        <div class="col-2">
            @php
                $sidebar = "risk-pro";
                $sousSidebar = "accident";
            @endphp
            @include('utils.sidebar')
        </div>
        <div class="col-10 content risk risk--accident">
            <div class="row header">
                <div class="col-12 mt-5 mb-5">
                    <h1>Evaluation des risques professionnels</h1>
                </div>
                <div class="col-12 d-flex justify-content-start mb-3">
                    <div class="ml-3 mr-4"><h3>Danger :</h3></div>
                    <div>
                        <h3>
                            Accident, presqu’accident et maladie du travail non ou mal analysés et prévenus pouvant générer la répétition de ces faits.
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="card reflex">
                        <form action="#">
                            <div class="card-body">
                                <div class="row pb-3 pt-3">
                                    <div class="col-1 d-flex justify-content-center">
                                        <i class="far fa-question-circle"></i>
                                    </div>
                                    <div class="col-4 mt-2">
                                        <h3>Pistes de réflexion :</h3>
                                        <ul>
                                            <li>Y-a-t-il des SST</li>
                                            <li>Y-a-t-il une trousse de secours à disposition</li>
                                            <li>Combien</li>
                                            <li>Où est elle (sont-elles)</li>
                                            <li>Est-elle vérifiée régulièrement</li>
                                        </ul>
                                    </div>
                                    <div class="col-7">
                                        <div class="form-group">
                                            <textarea class="form-control" id="com" rows="6" placeholder="Commentaire"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-3 pt-3">
                                    <div class="col-12 d-flex justify-content-end btn-foot">
                                        <p>Ce danger concerne quelqu’un au sein de l’entreprise ?</p>
                                        <button type="button" class="btn-main btn-main--green">OUI</button>
                                        <button type="button" class="btn-main btn-main--red" disabled>NON</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="card card-dropdown">
                        <form action="#">
                            <div class="card-header">
                                <h2><i class="fas fa-angle-down btn-card-drop" data-drop="open"></i> UT <span>TOUS</span></h2>
                                <div class="d-flex justify-content-end btn-foot">
                                    <p>Existe-t-il un risque commun à toutes les UT ?</p>
                                    <button type="button" class="btn-main btn-main--green">OUI</button>
                                    <button type="button" class="btn-main btn-main--red" disabled>NON</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table--accident">
                                    <thead>
                                        <tr>
                                            <th>Risque identifié</th>
                                            <th>Caractéristiques</th>
                                            <th></th>
                                            <th>Mesures</th>
                                            <th>criticité</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="mb-5">Exposition au sang de la victime en prodiguant des soins à un accidenté du travail.</p>
                                                <p class="mb-5">Rappel engin : Exposition au sang de la victime en prodiguant des soins à un accidenté du travail.</p>
                                            </td>
                                            <td>
                                                <ul>
                                                    <li>RB <span class="btn-main btn-main--yellow">10</span></li>
                                                    <li><span class="light-grey">F</span> An</li>
                                                    <li><span class="light-grey">P</span> Faible</li>
                                                    <li><span class="light-grey">GP</span> ASA</li>
                                                    <li><span class="light-grey">ID</span> NON</li>
                                                </ul>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <div class="point point--green"></div>
                                                    <p>Pas d’antécédent connu d’accident du travail et / ou de maladie professionnelle généré par le CO2.</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-start mb-5">
                                                    <div class="point point--yellow"></div>
                                                    <p>Obligation réglementaire : Mettre en place une ventilation mécanique assurant en permanence un débit de 25 m3/h/occupant dans les bureaux et de 30 m3/h/occupant dans les salles de réunion</p>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <div class="point point--yellow"></div>
                                                    <p>Réaliser l’évaluation détaillée du risque chimique selon les prescriptions réglementaires.</p>
                                                </div>
                                            </td>
                                            <td>
                                                <ul>
                                                    <li class="mb-3">RR <span class="btn-main btn-main--green">10</span></li>
                                                    <li class="mb-3"><button type="button" class="btn-main btn-main--green">Acceptable</button></li>
                                                </ul>
                                            </td>
                                            <td><i class="far fa-edit"></i><i class="fas fa-trash"></i></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>► Activités au cours de la crise sanitaire liée à la pandémie de COVID-19. Toutes les activités professionnelles au contact d’autres personnes (collègues, collaborateurs, clients, public) pouvant être atteintes de la COVID-19, et, ou, tous les contacts avec des surfaces et ou matières infectées par le virus de la COVID-19.</p>
                                            </td>
                                            <td></td>
                                            <td>
                                                <ul>
                                                    <li><span class="light-grey">F</span> An <span class="btn-main btn-main--green ml-4">10</span><span class="btn-main btn-main--red ml-4">24</span></li>
                                                    <li><span class="light-grey">P</span> Faible</li>
                                                    <li><span class="light-grey">GP</span> ASA</li>
                                                    <li><span class="light-grey">ID</span> NON</li>
                                                </ul>
                                            </td>
                                            <td colspan="2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="point point--inv"></div>
                                                    <p class="text-green">Existante(s)</p>
                                                </div>
                                                <div class="d-flex justify-content-start mb-5">
                                                    <div class="point point--cancel"></div>
                                                    <p>Absence de mesure mises en place</p>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <div class="point point--inv"></div>
                                                    <p class="text-yellow">Proposée(s)</p>
                                                </div>
                                                <div class="d-flex justify-content-start mb-5">
                                                    <div class="point point--yellow"></div>
                                                    <p>Obligation réglementaire : Mettre en place une ventilation mécanique assurant en permanence un débit de 25 m3/h/occupant dans les bureaux et de 30 m3/h/occupant dans les salles de réunion</p>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <div class="point point--yellow"></div>
                                                    <p>Réaliser l’évaluation détaillée du risque chimique selon les prescriptions réglementaires.</p>
                                                </div>
                                            </td>
                                            <td><i class="far fa-edit"></i><i class="fas fa-trash"></i></td>
                                        </tr>
                                        <tr>
                                            <td><a href="/risk/accident/create" class="btn-main btn-main--text">+ AJOUTER UN RISQUE</a></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
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
    <script src="/js/app/accident.js"></script>
@endsection
