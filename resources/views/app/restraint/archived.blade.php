@extends('app')

@section('content')
    <div class="content">
        <div class="card card--work_units">
            <div class="card-body">
                <table class="table table--restraint">
                    <thead>
                        <tr>
                            <th class="th_work_unit">Unité de travail</th>
                            <th class="th_danger">Danger</th>
                            <th class="th_risk">Risque</th>
                            <th class="th_restraint">Mesure(s) réalisée(s)</th>
                            <th class="th_date">Date de réalisation</th>
                            @if(Auth::user()->hasAccess('oza'))
                                <th class="th_actions"></th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sd_restraints_archived as $sd_restraint_archived)
                            <tr>
                                <td class="td_work_unit">{{ $sd_restraint_archived->sd_work_unit_name }}</td>
                                <td class="td_danger">{{ $sd_restraint_archived->danger_name }}</td>
                                <td class="td_risk">{{ $sd_restraint_archived->sd_risk_name }}</td>
                                <td class="td_restraint">{{ $sd_restraint_archived->name }}</td>
                                <td class="td_date">{{ date("d/m/Y", strtotime($sd_restraint_archived->date)) }}</td>
                                @if(Auth::user()->hasAccess('oza'))
                                    <td class="td_actions">
                                        <button data-modal=".modal--delete" data-id="{{ $sd_restraint_archived->id }}"><i class="fas fa-trash"></i></button>
                                    </td>
                                @endif
                            </tr>
                        @endforeach

                        @if (count($sd_restraints_archived) == 0)
                            <tr class="no-data no-data--centered">
                                <td colspan="5">Aucune mesure archivée</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        @if(Auth::user()->hasAccess('oza'))
            <div class="modal modal--delete">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{ route('restraint.archived.delete', [$single_document->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="modal-header">
                            <p class="title">Confirmer la suppression</p>
                            <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <p>Êtes-vous sûr.e du vouloir supprimer cette mesure archivée ?</p>
                            <div>
                                <button type="submit" class="btn btn-yellow">Supprimer</button>
                                <button type="button" class="btn btn-inv btn-yellow btn-small" data-dismiss="modal"> Annuler</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('script')
    <script src="/js/app/restraint.js"></script>
@endsection
