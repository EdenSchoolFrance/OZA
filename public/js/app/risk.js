on('.card .btn-radio', 'click', (el, e) => {
    let form = el.closest('form');

    $('input[name="checked"]', form, 0).value = el.dataset.value;
});

on('.card.card--risk.card--risk-stretchable .title', 'click', (el, e) => {
    let card = el.closest('.card');

    if (card.classList.contains('card--risk-opened')) {

        DOMAnimations.slideUp($('.card-body', card, 0), '300');
        card.classList.remove('card--risk-opened');
    } else {

        DOMAnimations.slideDown($('.card-body', card, 0), '300');
        card.classList.add('card--risk-opened');
    }
});

on('.modal--risk .btn-modal-risk-add', 'click', (el, e) => {
    let id = Date.now();
    console.log(el.dataset.id)
    if (el.dataset.id){
        id = el.dataset.id
        $('button[data-id="'+el.dataset.id+'"]', document, 0).closest('div.row').remove();
        el.removeAttribute('data-id');
    }
    let tech = $('.radio-bar-tech input:checked',document,0).value
    let orga = $('.radio-bar-orga input:checked',document,0).value
    let human = $('.radio-bar-human input:checked',document,0).value
    let title = $('#nameRisk', document, 0).value
    let restraint = $('.restraint', document, 0)
    let content =
        '<div class="line">\n' +
        ' <div class="left">\n' +
        ' </div>\n' +
        ' <div class="right">\n' +
        '  <ul>\n' +
        '   <li>\n' +
        '    <p>\n' +
        '     <i class="far fa-times-circle btn-delete"></i>\n' +
        '     '+title+'\n' +
        '     <button data-modal=".modal--risk" data-id="'+id+'" class="btn btn-yellow btn-text btn-edit-modal-risk" type="button"><i class="far fa-edit text-color-yellow"></i></button>\n' +
        '     <input type="hidden" value="'+tech+'|'+orga+'|'+human+'|'+title+'" name="restraint[]">' +
        '    </p>\n' +
        '   </li>\n' +
        '   \n' +
        '   <li>\n' +
        '    Technique :&nbsp;<span class="text-color-'+color(tech)+' bold">'+translate(tech)+'</span>\n' +
        '   </li>\n' +
        '   <li>\n' +
        '    Organisationnelle :&nbsp;<span class="text-color-'+color(orga)+' bold">'+translate(orga)+'</span>\n' +
        '   </li>\n' +
        '   <li>\n' +
        '    Humain :&nbsp;<span class="text-color-'+color(human)+' bold">'+translate(human)+'</span>\n' +
        '   </li>\n' +
        '  </ul>\n' +
        ' </div>\n' +
        '</div>\n'
    let row = document.createElement('div')
    row.setAttribute('class','row');
    row.innerHTML = content;
    restraint.appendChild(row)
});

on('.btn-edit-modal-risk', 'click', (el, e) => {
    $('.btn-modal-risk-add', document, 0).setAttribute('data-id',el.dataset.id)
    let tech = $('.radio-bar-tech input')
    let orga = $('.radio-bar-orga input')
    let human = $('.radio-bar-human input')
    let data = el.closest('p').querySelector('input').value.split('|')
    $('#nameRisk', document, 0).value = el.closest('p').innerText;
    for (let i = 0; i < tech.length ; i++) {
        tech[i].checked = tech[i].value === data[0];
    }
    for (let i = 0; i <orga.length ; i++) {
        orga[i].checked = orga[i].value === data[1];
    }
    for (let i = 0; i < human.length ; i++) {
        human[i].checked = human[i].value === data[2];
    }
});

on('.btn-open-risk', 'click', (el, e) => {
    let tech = $('.radio-bar-tech input')[0].checked = true
    let orga = $('.radio-bar-orga input')[0].checked = true
    let human = $('.radio-bar-human input')[0].checked = true
    $('#nameRisk', document, 0).value = ''
    let btn_add = $('.btn-modal-risk-add', document, 0)
    if (btn_add.dataset.id) btn_add.removeAttribute('data-id');

});

on('.btn-delete', 'click', (el, e) => {
    el.closest('div.row').remove();
});

on('.btn-delete-restraint', 'click', (el, e) => {
    el.closest('li').remove();
});

on('.btn-add-restraint', 'click', (el, e) => {
    let content ='<button type="button" class="btn btn-text btn-small btn-delete-restraint"><i class="far fa-times-circle"></i></button>\n' +
        '<textarea class="form-control auto-resize" placeholder="" name="restraint_proposed[]"></textarea>'
    let li = document.createElement('li');
    li.innerHTML = content;
    el.closest('li').before(li);
});


function translate(word){
    if (word === 'very good') return 'Très bien'
    else if (word === 'good') return 'Bien'
    else if (word === 'medium') return 'Moyen'
    else if (word === 'null') return 'Nulle'
}

function color(word){
    if (word === 'very good') return 'green'
    else if (word === 'good') return 'green'
    else if (word === 'medium') return 'orange'
    else if (word === 'null') return 'red'
}

