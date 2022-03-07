@extends('app')

@section('content')
    <div class="content">
        <div class="card card--work_units">
            <div class="card-body">
                <table class="table table--work_units">
                    <thead>
                        <tr>
                            <th class="th_danger">Danger</th>
                            <th class="th_risk">Risque</th>
                            <th class="th_frequency">Fréquence</th>
                            <th class="th_probability">Probabilité</th>
                            <th class="th_gravity">Gravité</th>
                            <th class="th_impact">Impact</th>
                            <th class="th_domain">Domaine d'activité</th>
                            <th class="th_actions"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($risks) === 0)
                            <tr class="no-data no-data--centered">
                                <td colspan="{{ 8 }}">
                                    Aucun risque
                                </td>
                            </tr>
                        @endif
                        @foreach($risks as $risk)
                            <tr>
                                <td class="td_danger">
                                    <div class="table-resizable">
                                        <p>{{ $risk->danger->name }}</p>
                                    </div>
                                </td>
                                <td class="td_risk">
                                    <div class="table-resizable">
                                        {{ $risk->name }}
                                    </div>
                                </td>
                                <td class="td_frequency">
                                    <div class="table-resizable">
                                        {{ $risk->translate($risk->frequency,"frequency") }}
                                    </div>
                                </td>
                                <td class="td_probability">
                                    <div class="table-resizable">
                                        {{ $risk->translate($risk->probability,"probability") }}
                                    </div>
                                </td>
                                <td class="td_gravity">
                                    <div class="table-resizable">
                                        {{ $risk->translate($risk->gravity,"gravity") }}
                                    </div>
                                </td>
                                <td class="td_impact">
                                    <div class="table-resizable">
                                        {{ $risk->translate($risk->impact,"impact") }}
                                    </div>
                                </td>
                                <td class="td_domain">
                                    <div class="table-resizable">
                                        {{ $risk->domain_activitie->name }}
                                    </div>
                                </td>
                                <td class="td_actions">
                                    @if (Auth::user()->hasPermission(['ADMIN']))
                                        <a href="{{ route('admin.help.risk.edit', [$risk->id]) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <button data-modal=".modal--delete" data-id="{{ $risk->id }}"><i class="fas fa-trash"></i></button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @if (Auth::user()->hasPermission(['ADMIN']))
            <div class="modal modal--delete">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{ route('admin.help.risk.delete') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="modal-header">
                            <p class="title">Confirmer la suppression</p>
                            <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <p>Êtes-vous sûr.e du vouloir supprimer cette unité de travail (complétion) ?</p>
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
    <script src="/js/app/work.js"></script>
@endsection
