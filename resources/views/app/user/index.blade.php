@extends('app')

@section('content')
    <div class="content">
        <div class="card card--users">
            <div class="card-header">
                <div></div>
                <a href="#" class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN UTILISATEUR</a>
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
                        <tr>
                            <td class="td_lastname">NOM 1</td>
                            <td class="td_firstname">Prénom</td>
                            <td class="td_email">nom.prénom@email.com</td>
                            <td class="td_access">Lecteur</td>
                            <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                        </tr>
                        <tr>
                            <td class="td_lastname">NOM 2</td>
                            <td class="td_firstname">Prénom</td>
                            <td class="td_email">nom.prénom@email.com</td>
                            <td class="td_access">Lecteur</td>
                            <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                        </tr>
                        <tr>
                            <td class="td_lastname">NOM 3</td>
                            <td class="td_firstname">Prénom</td>
                            <td class="td_email">nom.prénom@email.com</td>
                            <td class="td_access">Lecteur</td>
                            <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                        </tr>
                        <tr>
                            <td class="td_lastname">NOM 4</td>
                            <td class="td_firstname">Prénom</td>
                            <td class="td_email">nom.prénom@email.com</td>
                            <td class="td_access">Lecteur</td>
                            <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                        </tr>
                        <tr>
                            <td class="td_lastname">NOM 5</td>
                            <td class="td_firstname">Tom</td>
                            <td class="td_email">nom.prénom@email.com</td>
                            <td class="td_access">Lecteur</td>
                            <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN UTILISATEUR</a>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
