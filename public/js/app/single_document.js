on('a[data-modal=".modal--duplicate"]', 'click', (el, e) => {
    $('.modal--duplicate input[name="id"]', document, 0).value = el.dataset.id
    let opt = $('.modal--duplicate select[name="client_select"] option')
    for (let i = 0; i < opt.length ; i++) {
        if (opt[i].value === el.dataset.client) opt[i].setAttribute('selected','true')
    }
    $('.modal--duplicate input[name="single_document_name"]', document, 0).value = el.closest('tr').querySelector('td.td_name').textContent + '-copie';
});
