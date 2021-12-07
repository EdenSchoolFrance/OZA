@extends('app')

@section('content')
<div class="content">
    <div class="card card--users">
        <div class="card-header">
            <div></div>
            <button class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN UTILISATEUR</button>
        </div>
        <div class="card-body">
            <table class="table table--users table-sortable" style="width:100%">
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
                            <td class="td_lastname">NOM 1</td>
                            <td class="td_firstname">Prénom</td>
                            <td class="td_email">nom.prénom@email.com</td>
                            <td class="td_access">Experts</td>
                            <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <button class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN UTILISATEUR</button>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
