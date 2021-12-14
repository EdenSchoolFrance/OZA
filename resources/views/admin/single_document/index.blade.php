@extends('app')

@section('content')
    <div class="content">
        <div class="card">
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
                            <th class="th_name th-sort">Intitulé du DU</th>
                            <th class="th_client th-sort">Client</th>
                            <th class="th_access th-sort">Status</th>
                            <th class="th_actions"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($single_documents as $du)
                            <tr>
                                <td class="td_name">{{ $du->name }}</td>
                                <td class="td_client">{{ $du->client->name }}</td>
                                <td class="td_access">{{ $du->archived == 1 ? 'Archivé' : 'En cours' }}</td>
                                <td class="td_actions">
                                    <i class="fas fa-trash"></i>
                                    <i class="far fa-edit"></i>
                                    <a href="{{ route('dashboard', [$du->id]) }}"><i class="far fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach

                        @if (count($single_documents) == 0)
                            <tr class="no-data no-data--centered">
                                <td colspan="5">Aucun client</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $single_documents->links() }}
            </div>
        </div>
    </div>
    {{-- <div class="content">
        <div class="card card--users">
            <div class="card-header">
                <div></div>
                <button class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN CLIENT</button>
            </div>
            <div class="card-body">
                <div class="row row--right">
                    <input type="email" class="form-control" id="workName" placeholder="Recherche par nom de client">
                    <select name="status" class="form-control">
                        <option value="">Status</option>
                    </select>
                </div>
                <table class="table table--users table-sortable" style="width:100%">
                    <thead>
                    <tr>
                        <th class="th_lastname th-sort">Intitulé</th>
                        <th class="th_firstname th-sort">Date de création</th>
                        <th class="th_email th-sort">Statut</th>
                        <th class="th_actions"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="td_lastname">Intitulé du DU 1</td>
                        <td class="td_firstname">12/12/2021</td>
                        <td class="td_email">En cours</td>
                        <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i><i class="far fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td class="td_lastname">Intitulé du DU 2</td>
                        <td class="td_firstname">12/12/2021</td>
                        <td class="td_email">En cours</td>
                        <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i><i class="far fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td class="td_lastname">Intitulé du DU 3</td>
                        <td class="td_firstname">12/12/2021</td>
                        <td class="td_email">En cours</td>
                        <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i><i class="far fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td class="td_lastname">Intitulé du DU 4</td>
                        <td class="td_firstname">12/12/2021</td>
                        <td class="td_email">En cours</td>
                        <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i><i class="far fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td class="td_lastname">Intitulé du DU 5</td>
                        <td class="td_firstname">12/12/2021</td>
                        <td class="td_email">En cours</td>
                        <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i><i class="far fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td class="td_lastname">Intitulé du DU 6</td>
                        <td class="td_firstname">12/12/2021</td>
                        <td class="td_email">En cours</td>
                        <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i><i class="far fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td class="td_lastname">Intitulé du DU 7</td>
                        <td class="td_firstname">12/12/2021</td>
                        <td class="td_email">En cours</td>
                        <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i><i class="far fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td class="td_lastname">Intitulé du DU 8</td>
                        <td class="td_firstname">12/12/2021</td>
                        <td class="td_email">En cours</td>
                        <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i><i class="far fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td class="td_lastname">Intitulé du DU 9</td>
                        <td class="td_firstname">12/12/2021</td>
                        <td class="td_email">En cours</td>
                        <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i><i class="far fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td class="td_lastname">Intitulé du DU 10</td>
                        <td class="td_firstname">12/12/2021</td>
                        <td class="td_email">En cours</td>
                        <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i><i class="far fa-eye"></i></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <button class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN CLIENT</button>
            </div>
        </div>
    </div> --}}
@endsection

@section('script')
@endsection
