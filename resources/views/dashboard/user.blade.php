@extends('app')

@section('content')

<div class="container-fluid main workunit">
    @include('utils/header')
    <div class="row body">

        <div class="col-12">
            <div class="side">
                @php
                    $sidebar = "structure";
                    $sousSidebar = "user";
                @endphp
                @include('utils.sidebar')
            </div>
            <div class="content">
                <div class="row header">
                    <div class="col-12">
                        <h1>Utilisateurs</h1>
                    </div>
                    <div class="col-12 d-flex justify-content-start header-icon header-info">
                        <div class="ml-3 mr-4"><i class="fas fa-info-circle"></i></div>
                        <div>
                            <p>
                                Seul le responsable du DU peut valider la finalisation du DU
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-end ">
                        <button class="btn-main mb-3">+ AJOUTER UN UTILISATEUR</button>
                    </div>
                    <div class="col-12 ">
                        <div class="card">
                            <div class="card-body">
                                <div class="row pb-3 pt-3 table table--user">
                                    <table id="userTable" class="table-sortable" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th class="th-sort-desc" data-para="0">Nom</th>
                                            <th data-para="1">Prénom</th>
                                            <th data-para="2">Email</th>
                                            <th data-para="3">Accès</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>NOM</td>
                                            <td>Prénom</td>
                                            <td>nom.prénom@email.com</td>
                                            <td>Lecteur</td>
                                            <td><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                                        </tr>
                                        <tr>
                                            <td>NOM</td>
                                            <td>Prénom</td>
                                            <td>nom.prénom@email.com</td>
                                            <td>Lecteur</td>
                                            <td><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                                        </tr>
                                        <tr>
                                            <td>NOM</td>
                                            <td>Prénom</td>
                                            <td>nom.prénom@email.com</td>
                                            <td>Lecteur</td>
                                            <td><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                                        </tr>
                                        <tr>
                                            <td>NOM</td>
                                            <td>Prénom</td>
                                            <td>nom.prénom@email.com</td>
                                            <td>Lecteur</td>
                                            <td><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                                        </tr>
                                        <tr>
                                            <td>NOM</td>
                                            <td>Prénom</td>
                                            <td>nom.prénom@email.com</td>
                                            <td>Lecteur</td>
                                            <td><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                                        </tr>
                                        <tr>
                                            <td>NOM</td>
                                            <td>Prénom</td>
                                            <td>nom.prénom@email.com</td>
                                            <td>Lecteur</td>
                                            <td><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                                        </tr>
                                        <tr>
                                            <td>NOM</td>
                                            <td>Prénom</td>
                                            <td>nom.prénom@email.com</td>
                                            <td>Lecteur</td>
                                            <td><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                                        </tr>
                                        <tr>
                                            <td>NOM</td>
                                            <td>Prénom</td>
                                            <td>nom.prénom@email.com</td>
                                            <td>Lecteur</td>
                                            <td><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                                        </tr>
                                        <tr>
                                            <td>Michel</td>
                                            <td>Prénom</td>
                                            <td>nom.prénom@email.com</td>
                                            <td>Lecteur</td>
                                            <td><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end ">
                        <button class="btn-main mt-3">+ AJOUTER UN UTILISATEUR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>



        function sortTableByColumn(table, column, asc = true) {
            const dirModifier = asc ? 1 : -1;
            const tBody = table.tBodies[0];
            const rows = Array.from(tBody.querySelectorAll("tr"));

            // Sort each row
            const sortedRows = rows.sort((a, b) => {
                const aColText = a.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();
                const bColText = b.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();

                return aColText > bColText ? (1 * dirModifier) : (-1 * dirModifier);
            });

            // Remove all existing TRs from the table
            while (tBody.firstChild) {
                tBody.removeChild(tBody.firstChild);
            }

            // Re-add the newly sorted rows
            tBody.append(...sortedRows);

            // Remember how the column is currently sorted
            table.querySelectorAll("th").forEach(th => th.classList.remove("th-sort-asc", "th-sort-desc"));
            table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-asc", asc);
            table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-desc", !asc);
        }

        document.querySelectorAll(".table-sortable th").forEach(headerCell => {
            headerCell.addEventListener("click", () => {
                const tableElement = headerCell.parentElement.parentElement.parentElement;
                const headerIndex = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
                const currentIsAscending = headerCell.classList.contains("th-sort-asc");

                sortTableByColumn(tableElement, headerIndex, !currentIsAscending);
            });
        });
    </script>
@endsection
