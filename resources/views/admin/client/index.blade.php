@extends('app')

@section('content')
<div class="content">
    <div class="card card--users">
        <div class="card-header">
            <div></div>
            <a href="{{route('admin.client.add')}}" class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN CLIENT</a>
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
                        <th class="th_lastname th-sort" data-para="0">Client</th>
                        <th class="th_firstname th-sort" data-para="1">Expert Oza</th>
                        <th class="th_email th-sort" data-para="2">Numéro de client</th>
                        <th class="th_access th-sort" data-para="3">Status</th>
                        <th class="th_actions"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td_lastname">NOM du client 1</td>
                        <td class="td_firstname">Nom prénom</td>
                        <td class="td_email">0000000000</td>
                        <td class="td_access">En cours</td>
                        <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                    </tr>
                    <tr>
                        <td class="td_lastname">NOM du client 2</td>
                        <td class="td_firstname">Nom prénom</td>
                        <td class="td_email">0000000000</td>
                        <td class="td_access">Archivé</td>
                        <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                    </tr>
                    <tr>
                        <td class="td_lastname">NOM du client 3</td>
                        <td class="td_firstname">Nom prénom</td>
                        <td class="td_email">0000000000</td>
                        <td class="td_access">Archivé</td>
                        <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                    </tr>
                    <tr>
                        <td class="td_lastname">NOM du client 4</td>
                        <td class="td_firstname">Nom prénom</td>
                        <td class="td_email">0000000000</td>
                        <td class="td_access">Archivé</td>
                        <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                    </tr>
                    <tr>
                        <td class="td_lastname">NOM du client 5</td>
                        <td class="td_firstname">Nom prénom</td>
                        <td class="td_email">0000000000</td>
                        <td class="td_access">Archivé</td>
                        <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{route('admin.client.add')}}" class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN CLIENT</a>
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
