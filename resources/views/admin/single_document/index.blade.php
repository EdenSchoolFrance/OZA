@extends('app')

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form class="row row--filter" method="GET">
                    <input type="text" class="form-control" name="filter[client]" id="input_filter_client" value="{{ isset($filter) ? $filter['client'] : '' }}" placeholder="Recherche par nom de client">
                    <select id="input_filter_status" class="form-control" name="filter[status]">
                        <option value="">Statut</option>
                        <option value="in_progress" {{ isset($filter) && ($filter['status'] == 'in_progress') ? 'selected' : '' }}>En cours</option>
                        <option value="archived" {{ isset($filter) && ($filter['status'] == 'archived') ? 'selected' : '' }}>Archivé</option>
                    </select>
                    <button class="btn" type="submit">Rechercher</button>
                </form>
                <table class="table table--users table-sortable">
                    <thead>
                        <tr>
                            <th class="th_name th-sort">Intitulé du DU</th>
                            <th class="th_client th-sort">Client</th>
                            <th class="th_access th-sort">Statut</th>
                            <th class="th_actions"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($single_documents as $sd)
                            <tr>
                                <td class="td_name">{{ $sd->name }}</td>
                                <td class="td_client">{{ $sd->client->name }}</td>
                                <td class="td_access">{{ $sd->archived ? 'Archivé' : 'En cours' }}</td>
                                <td class="td_actions">
                                    @if (Auth::user()->hasPermission('ADMIN'))
                                        @if ($sd->archived)
                                            <button data-modal=".modal--unarchive" data-id="{{ $sd->id }}"><i class="fas fa-box-open"></i></button>
                                        @else
                                            <button data-modal=".modal--archive" data-id="{{ $sd->id }}"><i class="fas fa-archive"></i></button>
                                        @endif
                                    @endif
                                    <a data-modal=".modal--duplicate" data-client="{{ $sd->client->id }}" data-id="{{ $sd->id }}" ><i class="far fa-clone"></i></a>
                                    <a href="{{ route('admin.single_document.edit', [$sd->client->id, $sd->id]) }}"><i class="far fa-edit"></i></a>
                                    <a href="{{ route('dashboard', [$sd->id]) }}"><i class="far fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach

                        @if (count($single_documents) == 0)
                            <tr class="no-data no-data--centered">
                                <td colspan="5">Aucun document unique</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $single_documents->links() }}
            </div>
        </div>

        @if (Auth::user()->hasPermission('ADMIN'))
            <div class="modal modal--archive">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{ route('admin.single_document.archive') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="modal-header">
                            <p class="title">Confirmer l'archivage</p>
                            <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <p>Êtes-vous sûr du vouloir archiver ce document unique ?</p>
                            <div>
                                <button type="submit" class="btn btn-yellow">Archiver</button>
                                <button type="button" class="btn btn-inv btn-yellow btn-small" data-dismiss="modal"> Annuler</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal modal--unarchive">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{ route('admin.single_document.unarchive') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="modal-header">
                            <p class="title">Confirmer le désarchivage</p>
                            <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <p>Êtes-vous sûr.e du vouloir désarchiver ce document unique ?</p>
                            <div>
                                <button type="submit" class="btn btn-yellow">Désarchiver</button>
                                <button type="button" class="btn btn-inv btn-yellow btn-small" data-dismiss="modal"> Annuler</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif

        <div class="modal modal--duplicate">
            <div class="modal-dialog">
                <form class="modal-content" action="{{ route('admin.single_document.duplicate') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="">
                    <div class="modal-header">
                        <p class="title">Dupliquer le document unique</p>
                        <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <p>Sélectionner un client</p>
                        <select name="client_select" class="form-control">
                            <option value="all">Tous</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                        </select>
                        <div>
                            <button type="submit" class="btn btn-yellow">Dupliquer</button>
                            <button type="button" class="btn btn-danger btn-text" data-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/js/app/single_document.js"></script>
@endsection
