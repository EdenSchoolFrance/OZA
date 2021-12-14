@extends('app')

@section('content')
    <div class="content">
        <div class="card card--users">
            <div class="card-header">
                <div></div>
                <a href="{{ route('admin.client.create') }}" class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN CLIENT</a>
            </div>
            <div class="card-body">
                <form class="row row--filter" method="GET">
                    <input type="text" class="form-control" name="filter[client]" id="input_filter_client" value="{{ isset($filter) ? $filter['client'] : '' }}" placeholder="Recherche par nom de client">
                    <select id="input_filter_status" class="form-control" name="filter[status]">
                        <option value="">Status</option>
                        <option value="in_progress" {{ isset($filter) && ($filter['status'] == 'in_progress') ? 'selected' : '' }}>En cours</option>
                        <option value="archived" {{ isset($filter) && ($filter['status'] == 'archived') ? 'selected' : '' }}>Archivé</option>
                    </select>
                    <button class="btn" type="submit">Rechercher</button>
                </form>
                <table class="table table--users table-sortable">
                    <thead>
                        <tr>
                            <th class="th_name th-sort">Client</th>
                            <th class="th_expert th-sort">Expert Oza</th>
                            <th class="th_nb_client th-sort">Numéro de client</th>
                            <th class="th_status th-sort">Status</th>
                            <th class="th_actions"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td class="td_name">{{ $client->name }}</td>
                                <td class="td_expert">{{ $client->expert->firstname }} {{ $client->expert->lastname }}</td>
                                <td class="td_nb_client">{{ $client->client_number }}</td>
                                <td class="td_status">{{ $client->archived == 1 ? 'Archivé' : 'En cours' }}</td>
                                <td class="td_actions">
                                    <i class="fas fa-trash"></i>
                                    <a href="{{ route('admin.client.edit', [$client->id]) }}"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach

                        @if (count($clients) == 0)
                            <tr class="no-data no-data--centered">
                                <td colspan="5">Aucun client</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $clients->links() }}
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.client.create') }}" class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN CLIENT</a>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
