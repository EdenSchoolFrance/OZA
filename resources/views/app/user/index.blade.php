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
                                    @if ((($user->hasPermission('ADMIN') && Auth::user()->hasPermission('ADMIN')) || (!$user->hasPermission('ADMIN'))) && Auth::user()->id != $user->id)
                                        <button data-modal=".modal--delete" data-id="{{ $user->id }}"><i class="fas fa-trash"></i></button>
                                    @endif
                                    <a href="{{ route('user.client.edit', [$single_document->id, $user->id]) }}"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach

                        @if (count($users) == 0)
                            <tr class="no-data no-data--centered">
                                <td colspan="5">Aucun utilisateur</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{ route('user.client.create', [$single_document->id]) }}" class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN UTILISATEUR</a>
            </div>
        </div>

        <div class="modal modal--delete">
            <div class="modal-dialog">
                <form class="modal-content" action="{{ route('user.client.delete', [$single_document->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="">
                    <div class="modal-header">
                        <p class="title">Confirmer la suppression</p>
                        <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <p>Êtes-vous sûr du vouloir supprimer cet utilisateur ?</p>
                        <div>
                            <button type="submit" class="btn btn-danger btn-text">Supprimer</button>
                            <button type="button" class="btn btn-inv btn-yellow btn-small" data-dismiss="modal"> Annuler</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
