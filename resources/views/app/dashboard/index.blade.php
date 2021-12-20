@extends('app')

@section('content')
    <div class="content dashboard">
        <div class="row">
            <form class="card card--dashboard">
                <div class="card-header">
                    <h2 class="title">Risque Brut moyen</h2>
                </div>
                <div class="card-body">
                    <div class="row row--center">
                        <label class="text-color-red">15.0</label>
                    </div>
                    <div class="row row--center">
                        <p>Maxi = 50</p>
                    </div>
                </div>
            </form>
            <form class="card card--dashboard">
                <div class="card-header">
                    <h2 class="title">Réduction du risque</h2>
                </div>
                <div class="card-body">
                    <div class="row row--center">
                        <label class="text-color-green">24.7 %</label>
                    </div>
                </div>
            </form>
            <form action="#" class="card card--dashboard">
                <div class="card-header">
                    <h2 class="title">Risque résiduel moyen</h2>
                </div>
                <div class="card-body">
                    <div class="row row--center">
                        <label class="">11.3</label>
                    </div>
                    <div class="row row--center">
                        <p>Maxi = 50</p>
                    </div>
                </div>
            </form>
            <form action="#" class="card card--dashboard">
                <div class="card-header">
                    <h2 class="title">Actualisation en cours</h2>
                </div>
                <div class="card-body">
                   <div class="row">
                       <p>Date de création :  10/10/2022</p>
                   </div>
                    <div class="row">
                        <p>Statut  :  En cours d’édition</p>
                    </div>
                    <div class="row">
                        <button class="btn btn-success">Générer un DU à date</button>
                    </div>
                    <div class="row">
                        <a href="#" class="btn btn-text btn-yellow"><i class="far fa-edit"></i> Pré-remplir le DU sur la base d’un autre DU du compte</a>
                    </div>
                </div>
            </form>
            <form action="#" class="card card--dashboard-double">
                <div class="card-header">
                    <h2 class="title">Risque résiduel en cours</h2>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </form>
        </div>
        <div class="card card--full">
            <div class="card-header">
                <h2 class="title">Historique du document unique</h2>
            </div>
            <div class="card-body">
                <table class="table table--users table-sortable">
                    <thead>
                    <tr>
                        <th class="th_resp th-sort" data-para="0">Responsable</th>
                        <th class="th_work th-sort" data-para="1">Travail réalisé</th>
                        <th class="th_date th-sort" data-para="2">Date d’émission</th>
                        <th class="th_actions"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="td_resp">Prénom NOM</td>
                            <td class="td_work">Réalisation initiale du DU</td>
                            <td class="td_date">10/10/2021</td>
                            <td class="td_actions">
                                <a href="#" class="text-color-green">Télécharger le PDF</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="td_resp">Prénom NOM</td>
                            <td class="td_work">Modification du risque accident</td>
                            <td class="td_date">15/10/2021</td>
                            <td class="td_actions">
                                <a href="#" class="text-color-green">Télécharger le PDF</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="td_resp">Prénom NOM</td>
                            <td class="td_work">Modification du risque xxx</td>
                            <td class="td_date">21/10/2021</td>
                            <td class="td_actions">
                                <a href="#" class="text-color-green">Télécharger le PDF</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/js/libs/chart.min.js"></script>
    <script>
        let tabData = [75,25,0,0]
    </script>
    <script src="/js/app/dashboard.js"></script>
@endsection
