function sortTableByColumn(table, column, asc) {
    const dirModifier = asc ? 1 : -1;
    const tBody = table.tBodies[0];
    const rows = Array.from($('tr', tBody));

    // Sort each row
    const sortedRows = rows.sort((a, b) => {
        const aCol = $(`td:nth-child(${ column + 1 })`, a, false);
        const bCol = $(`td:nth-child(${ column + 1 })`, b, false);

        let aColText = aCol.dataset.sort || aCol.innerText;
        let bColText = bCol.dataset.sort || bCol.innerText;

        if (!isNaN(aColText)) {
            aColText = parseFloat(aColText);
        }
        if (!isNaN(bColText)) {
            bColText = parseFloat(bColText);
        }

        return aColText > bColText ? 1 * dirModifier : -1 * dirModifier;
    });

    // Remove all existing TRs from the table
    tBody.innerHTML = "";

    // Re-add the newly sorted rows
    tBody.append(...sortedRows);

    // Remember how the column is currently sorted
    $('th', table).forEach(th => th.classList.remove("th-sort-asc", "th-sort-desc"));
    $(`th:nth-child(${ column + 1})`, table, false).classList.toggle("th-sort-asc", asc);
    $(`th:nth-child(${ column + 1})`, table, false).classList.toggle("th-sort-desc", !asc);
}

on('.table-sortable th.th-sort', 'click', (el, e) => {
    let table = el.closest('table');
    let pos = Array.prototype.indexOf.call(el.parentElement.children, el);
    let isAscending = el.classList.contains("th-sort-asc");

    sortTableByColumn(table, pos, !isAscending);
});