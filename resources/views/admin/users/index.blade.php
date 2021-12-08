@extends('app')

@section('content')
    <div class="content">
        <div class="card card--users">
            <div class="card-header">
                <div></div>
                <a class="btn btn-yellow" href="{{ route('admin.user.create') }}"><i class="fas fa-plus"></i> AJOUTER UN UTILISATEUR</a>
            </div>
            <div class="card-body">
                <table class="table table--users table-sortable">
                    <thead>
                        <tr>
                            <th class="th_lastname th-sort" data-para="0">Nom</th>
                            <th class="th_firstname th-sort" data-para="1">Prénom</th>
                            <th class="th_email th-sort" data-para="2">Email</th>
                            <th class="th_access th-sort" data-para="3">Accès</th>
                            <th class="th_actions"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="td_lastname">{{ $user->lastname }}</td>
                                <td class="td_firstname">{{ $user->firstname }}</td>
                                <td class="td_email">{{ $user->email }}</td>
                                <td class="td_access">{{ $user->role->name }}</td>
                                <td class="td_actions">
                                    <i class="fas fa-trash"></i>
                                    <a href="{{ route('admin.user.edit', [$user->id]) }}"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a class="btn btn-yellow" href="{{ route('admin.user.create') }}"><i class="fas fa-plus"></i> AJOUTER UN UTILISATEUR</a>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
