@extends('app')

@section('content')
    <div class="content">
        <div class="card card--users">
            @if (Auth::user()->hasPermission('ADMIN'))
                <div class="card-header">
                    <div></div>
                    <a class="btn btn-yellow" href="{{ route('admin.user.create') }}"><i class="fas fa-plus"></i> AJOUTER UN UTILISATEUR</a>
                </div>
            @endif
            <div class="card-body">
                <table class="table table--users table-sortable">
                    <thead>
                        <tr>
                            <th class="th_lastname th-sort">Nom</th>
                            <th class="th_firstname th-sort">Prénom</th>
                            <th class="th_email th-sort">Email</th>
                            <th class="th_access th-sort">Accès</th>
                            @if (Auth::user()->hasPermission('ADMIN'))
                                <th class="th_actions"></th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="td_lastname">{{ $user->lastname }}</td>
                                <td class="td_firstname">{{ $user->firstname }}</td>
                                <td class="td_email">{{ $user->email }}</td>
                                <td class="td_access">{{ $user->role->name }}</td>
                                @if (Auth::user()->hasPermission('ADMIN'))
                                    <td class="td_actions">
                                        <i class="fas fa-trash"></i>
                                        <a href="{{ route('admin.user.edit', [$user->id]) }}"><i class="far fa-edit"></i></a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if (Auth::user()->hasPermission('ADMIN'))
                <div class="card-footer">
                    <a class="btn btn-yellow" href="{{ route('admin.user.create') }}"><i class="fas fa-plus"></i> AJOUTER UN UTILISATEUR</a>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
@endsection
