on('.btn-resize-row', 'click', (el, e) => {
    let row = el.closest('tr');
    let elements = $('div.table-resizable', row);

    if (row.classList.contains('tr_resized')) {
        elements.forEach(element => {
            DOMAnimations.slideDown(element, '300', '100px');
        });

        row.classList.remove('tr_resized');
    } else {
        elements.forEach(element => {
            DOMAnimations.slideUp(element, '300', '100px');
        });

        row.classList.add('tr_resized');
    }
});

on('.btn-resize-all', 'click', (el, e) => {
    let card = el.closest('.card');
    let rows;

    if (card.classList.contains('card--resized')) {
        rows = $('table tr.tr_resized', card);
    } else {
        rows = $('table tr:not(.tr_resized)', card);
    }

    rows.forEach(row => {
        let elements = $('div.table-resizable', row);

        if (row.classList.contains('tr_resized')) {
            elements.forEach(element => {
                DOMAnimations.slideDown(element, '300', '100px');
            });
        } else {
            elements.forEach(element => {
                DOMAnimations.slideUp(element, '300', '100px');
            });
        }

        row.classList.toggle('tr_resized');
    });

    card.classList.toggle('card--resized');
});