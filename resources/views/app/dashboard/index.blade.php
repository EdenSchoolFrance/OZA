@extends('app')

@section('content')
    <div class="content dashboard">
        <div class="row">
            <form class="card card--dashboard">
                <div class="card-header">
                    <h2 class="title">Risque brut moyen</h2>
                </div>
                <div class="card-body">
                    <div class="row row--center">
                        <label class="{{ $single_document->color($single_document->moyenneRB()) }}">{{ $single_document->moyenneRB() }}</label>
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
                        <label class="text-color-green">{{ $single_document->discountRisk() }} %</label>
                    </div>
                </div>
            </form>
            <form action="#" class="card card--dashboard">
                <div class="card-header">
                    <h2 class="title">Risque résiduel moyen</h2>
                </div>
                <div class="card-body">
                    <div class="row row--center">
                        <label class="{{ $single_document->color($single_document->moyenneRR()) }}">{{ $single_document->moyenneRR() }}</label>
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
                    @if (Auth::user()->hasPermission(['ADMIN', 'EXPERT', 'MANAGER']))
                        <div class="row">
                            <a data-modal=".modal--pdf" class="btn btn-success">Générer un DU à date</a>
                        </div>
                    @endif
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
                <table class="table table--history-single-document table-sortable">
                    <thead>
                    <tr>
                        <th class="th_resp th-sort" data-para="0">Responsable</th>
                        <th class="th_work th-sort" data-para="1">Travail réalisé</th>
                        <th class="th_date th-sort" data-para="2">Date d’émission</th>
                        <th class="th_actions"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($single_document->histories as $historie)
                            <tr>
                                <td class="td_resp">{{ $historie->user->firstname }} {{ $historie->user->lastname }}</td>
                                <td class="td_work">{{ $historie->work }}</td>
                                <td class="td_date">{{ date("d/m/Y",strtotime($historie->date)) }}</td>
                                <td class="td_actions">
                                    <a href="{{ asset('/storage/'.$single_document->client->id.'/du/'.$historie->id.'.pdf') }}" download="{{ 'OzaDocumentUnique_'.$single_document->client->name.'_'.date("d/m/Y",strtotime($historie->date)).'.pdf' }}" class="text-color-green">Télécharger le PDF</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal modal--pdf">
            <div class="modal-dialog">
                <form class="modal-content" action="{{ route('history.store', [$single_document->id]) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <p class="title">Actualisation du PDF</p>
                        <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="line">
                                <div class="left">
                                    <label for="work">Travail réalisé sur le DU</label>
                                </div>
                                <div class="right">
                                    <textarea class="form-control" id="work" placeholder="Mise à jour annuelle, mise à jour des actions, mise à jour des évaluations, ajout ou retrait de risques ou de préventions, ..." name="work_history"></textarea>
                                    <span class="info-pdf-modal"></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success btn-modal-pdf-submit">Générer un DU à date</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/js/libs/chart.min.js"></script>
    <script>
        let tabData =[{!! $single_document->graphique()[0] !!},{!! $single_document->graphique()[1] !!},{!! $single_document->graphique()[2] !!},{!! $single_document->graphique()[3] !!}];
        let tab = [75,25,0,0]
    </script>
    <script src="/js/app/dashboard.js"></script>
@endsection
