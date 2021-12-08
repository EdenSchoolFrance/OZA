@extends('app')

@section('content')
    <div class="content">
        <div class="card card--users">
            <div class="card-header">
                <div></div>
                <a href="{{route('admin.client.create')}}" class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN CLIENT</a>
            </div>
            <div class="card-body">
                <form class="row row--filter" method="GET">
                    <input type="text" class="form-control" name="client" id="input_filter_client" placeholder="Recherche par nom de client">
                    <select name="status" id="input_filter_status" class="form-control">
                        <option value="">Status</option>
                        <option value="in_progress">En cours</option>
                        <option value="end">En cours</option>
                    </select>
                </form>
                <table class="table table--users table-sortable">
                    <thead>
                        <tr>
                            <th class="th_lastname th-sort">Client</th>
                            <th class="th_firstname th-sort">Expert Oza</th>
                            <th class="th_email th-sort">Numéro de client</th>
                            <th class="th_access th-sort">Status</th>
                            <th class="th_actions"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td class="td_lastname">{{ $client->name }}</td>
                                <td class="td_firstname">{{ $client->experts[0]->firstname }} {{ $client->experts[0]->lastname }}</td>
                                <td class="td_email">{{ $client->client_number }}</td>
                                <td class="td_access">{{ $client->archived == 1 ? 'Archivé' : 'En cours' }}</td>
                                <td class="td_actions">
                                    <i class="fas fa-trash"></i>
                                    <a href="{{ route('admin.client.edit', [$client->id]) }}"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.client.create') }}" class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN CLIENT</a>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
