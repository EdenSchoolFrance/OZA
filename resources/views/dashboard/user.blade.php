@extends('app')

@section('content')
<div class="body">
    <div class="card card--users">
        <div class="card-header">
            <div></div>
            <button class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN UTILISATEUR</button>
        </div>
        <div class="card-body">
            <table class="table table--users table-sortable" style="width:100%">
                <thead>
                    <tr>
                        <th class="th-sort th-sort-desc" data-para="0">Nom</th>
                        <th class="th-sort" data-para="1">Prénom</th>
                        <th class="th-sort" data-para="2">Email</th>
                        <th class="th-sort" data-para="3">Accès</th>
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
        <div class="card-footer">
            <button class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN UTILISATEUR</button>
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

        document.querySelectorAll(".table-sortable th.th-sort").forEach(headerCell => {
            headerCell.addEventListener("click", () => {
                const tableElement = headerCell.parentElement.parentElement.parentElement;
                const headerIndex = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
                const currentIsAscending = headerCell.classList.contains("th-sort-asc");

                sortTableByColumn(tableElement, headerIndex, !currentIsAscending);
            });
        });
    </script>
@endsection
