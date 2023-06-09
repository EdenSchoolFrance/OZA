@extends('app')

@section('content')
    <div class="content dashboard">
        <div class="row">
            <form class="card card--dashboard">
                <div class="card-header">
                    <h2 class="title">Risque brut moyen</h2><i class="far fa-question-circle" data-tooltip=".tooltip--RBM" data-placement="bottom"></i>
                </div>
                <div class="card-body">
                    <div class="row row--center">
                        <label class="{{ $colorRB }}">{{ $moyenneRB }}</label>
                    </div>
                    <div class="row row--center">
                        <p>Maxi = 50</p>
                    </div>
                </div>
            </form>
            <form class="card card--dashboard">
                <div class="card-header">
                    <h2 class="title">Réduction du risque</h2><i class="far fa-question-circle" data-tooltip=".tooltip--RR" data-placement="bottom"></i>
                </div>
                <div class="card-body">
                    <div class="row row--center">
                        <label class="text-color-green">{{ $discountRisk }} %</label>
                    </div>
                </div>
            </form>
            <form action="#" class="card card--dashboard">
                <div class="card-header">
                    <h2 class="title">Risque résiduel moyen</h2><i class="far fa-question-circle" data-tooltip=".tooltip--RRM" data-placement="bottom"></i>
                </div>
                <div class="card-body">
                    <div class="row row--center">
                        <label class="{{ $colorRR }}">{{ $moyenneRR }}</label>
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
                      <p>Date de création : {{ date("d/m/Y",strtotime($single_document->created_at)) }}</p>
                   </div>
                    <div class="row">
                        <p>Statut : {{ $single_document->archived === 0 ? "En cours d’édition" : "Archivé" }}</p>
                    </div>
                    @if (Auth::user()->hasPermission(['ADMIN', 'EXPERT', 'MANAGER']))
                        <div class="row">
                            <a data-modal=".modal--pdf" id="historyBtn" class="btn btn-success">Générer un DU à date</a>
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

        @if(count($single_document->histories) > 0)
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
                            @foreach($single_document->histories->sortByDesc('date') as $historie)
                                <tr>
                                    <td class="td_resp">{{ $single_document->firstname }} {{ $single_document->lastname }}</td>
                                    <td class="td_work">{{ $historie->work }}</td>
                                    <td class="td_date">{{ date("d/m/Y",strtotime($historie->date)) }}</td>
                                    <td class="td_actions">
                                        <a href="{{ route('history.download', [$single_document->id, $historie->id]) }}" class="text-color-green">Télécharger le PDF </a>
                                        @if (Auth::user()->hasPermission(['ADMIN', 'EXPERT']))
                                            <button data-modal=".modal--delete" data-id="{{ $historie->id }}" class="delete-btn"><i class="fas fa-trash"></i></button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="infos">
                        <i class="fas fa-info-circle"></i>
                        <p>L’employeur se doit de conserver les versions successives du document unique d’évaluation des risques professionnels au sein de l’entreprise, sous la forme d’un document papier ou dématérialisé, pendant une durée de 40 ans à compter de leur élaboration</p>
                    </div>
                </div>
            </div>
        @endif

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
                                    @error('work_history')
                                        <p class="message-error">{{ $message }}</p>
                                    @enderror
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

        @if (Auth::user()->hasPermission(['ADMIN', 'EXPERT']))
            <div class="modal modal--delete">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{ route('history.delete', [$single_document->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="modal-header">
                            <p class="title">Confirmer la suppression</p>
                            <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <p>Vous êtes sur le point de supprimer définitivement une version historique de ce document unique. Êtes-vous sûr.e de vouloir continuer ?</p>
                            <div>
                                <button type="submit" class="btn btn-yellow">Supprimer le document</button>
                                <button type="button" class="btn btn-inv btn-yellow btn-small" data-dismiss="modal"> Annuler</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif

        <div class="tooltip tooltip--RBM">
            <p>
                RISQUE BRUT MOYEN :
                Permet de situer le niveau de risque total de la structure, évalué sans prendre en compte les mesures de prévention ; sur une échelle de zéro (risque nul) à 50 (risque maximal).
            </p>
        </div>

        <div class="tooltip tooltip--RR">
            <p>
                RÉDUCTION DU RISQUE BRUT grâce aux mesures de prévention existantes : met en évidence les efforts de prévention de la structure
            </p>
        </div>

        <div class="tooltip tooltip--RRM">
            <p>
                RISQUE RESIDUEL MOYEN :
                Permet de situer le niveau de risque actuel de la structure, en prenant en compte les mesures de prévention existantes ; sur une échelle de zéro (risque nul) à 50 (risque maximal).
            </p>
        </div>

    </div>
@endsection

@section('script')
    <script src="/js/libs/chart.min.js"></script>
    <script>
        const tabData = {{ Illuminate\Support\Js::from($single_document->graphique()) }};
    </script>
    <script src="/js/app/dashboard.js"></script>
    @if (session('error') == 'history')
        <script>
            showModal(document.getElementById('historyBtn'));
        </script>
    @endif
@endsection
