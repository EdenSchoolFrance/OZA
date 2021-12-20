@extends('app')

@section('content')
    <div class="content">
        <div class="card card--users">
            <div class="card-header">
                <div></div>
                <a href="{{ route('user.client.create', [$single_document->id]) }}" class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN UTILISATEUR</a>
            </div>
            <div class="card-body">
                <table class="table table--users table-sortable" style="width:100%">
                    <thead>
                        <tr>
                            <th class="th_lastname th-sort">Nom</th>
                            <th class="th_firstname th-sort">Prénom</th>
                            <th class="th_email th-sort">Email</th>
                            <th class="th_access th-sort">Accès</th>
                            <th class="th_actions"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="td_lastname">{{$user->lastname}}</td>
                                <td class="td_firstname">{{$user->firstname}}</td>
                                <td class="td_email">{{$user->email}}</td>
                                <td class="td_access">{{$user->role->name}}</td>
                                <td class="td_actions">
                                    <a href=""><i class="fas fa-trash"></i></a>
                                    <a href="{{ route('user.client.edit', ['user'=>$user->id, 'single_document' => $single_document->id]) }}"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{ route('user.client.create', [$single_document->id]) }}" class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN UTILISATEUR</a>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
