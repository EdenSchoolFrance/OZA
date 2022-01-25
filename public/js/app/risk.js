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
    if (el.dataset.id){
        id = el.dataset.id
        $('button[data-id="'+el.dataset.id+'"]', document, 0).closest('div.row').remove();
        el.removeAttribute('data-id');
    }
    let tech = $('.radio-bar-tech input:checked',document,0).value
    let orga = $('.radio-bar-orga input:checked',document,0).value
    let human = $('.radio-bar-human input:checked',document,0).value
    let title = $('#nameRisk', document, 0).value
    createRestraint(tech,orga,human,title,id)
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
    let all = el.closest('ul').querySelectorAll('li')
    if (all[all.length - 2] !== undefined && all[all.length - 2] !== el.closest('li') && all[all.length - 2].querySelector('textarea').value === ''){
        all[all.length - 2].querySelector('textarea').focus();
    }else{
        let content ='<button type="button" class="btn btn-text btn-small btn-delete-restraint"><i class="far fa-times-circle"></i></button>\n' +
            '<textarea class="form-control auto-resize" placeholder="" name="restraint_proposed[]"></textarea>'
        let li = document.createElement('li');
        li.innerHTML = content;
        el.closest('li').before(li);
    }

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


on('.btn-open-risk-restraint-oza', 'click', (el, e) => {
    el.classList.remove('btn-open-risk-restraint-oza');
    el.classList.add('btn-open-risk');
    el.removeAttribute('data-modal')
    el.setAttribute('data-modal','.modal--risk')
});

on('.btn-restraint-modal-oza', 'click', (el, e) => {
    if (el.checked === true){
        el.closest('.content-modal-oza').querySelector('.restraint-modal-content').style.display = 'block'
    }else{
        el.closest('.content-modal-oza').querySelector('.restraint-modal-content').style.display = 'none'
    }
});

on('.btn-modal-risk-oza-add', 'click', (el, e) => {

    let all = $('.modal--risk-restraint-oza .content-modal-oza')
    for (let i = 0; i < all.length ; i++) {
        if (all[i].querySelector('.btn-restraint-modal-oza').checked === true){
            let id = Date.now();
            let tech = all[i].querySelector('.radio-bar-tech input:checked').value || 'null'
            let orga = all[i].querySelector('.radio-bar-orga input:checked').value || 'null'
            let human = all[i].querySelector('.radio-bar-human input:checked').value || 'null'
            let title = all[i].querySelector('.con').innerText
            createRestraint(tech,orga,human,title,id);
        }else{
            let title = all[i].querySelector('.con').innerText
            createRestraintProposed(title);
        }
    }
});

on('.radio-bar .con input', 'click', (el, e) => {
    let total = $('.btn-calcul-risk', document, 0)
    total.innerText = riskCalcul()
    total.removeAttribute('class');
    total.setAttribute('class','btn btn-small btn-calcul-risk')
    setColor(total,riskCalcul());
});

on('.btn-check-work-unit', 'click', (el, e) => {
    el.closest('form').querySelector('input[name="checked"]').value = el.dataset.value
    el.closest('form').submit()
});


on('a[data-modal=".modal--duplicate"]', 'click', (el, e) => {
    $('.modal--duplicate input[name="id_risk"]', document, 0).value = el.dataset.risk
});

on('a[data-modal=".modal--delete"]', 'click', (el, e) => {
    $('.modal--delete input[name="id_risk"]', document, 0).value = el.dataset.risk
});

/*==============================
          Calcul function
==============================*/


function riskCalcul(){
    let frequency = $('.radio-bar-frequency input:checked',document,0).value
    let probability = $('.radio-bar-probability input:checked',document,0).value
    let gravity = $('.radio-bar-gravity input:checked',document,0).value

    switch (frequency) {
        case 'day' :
            frequency = 5;
            break;
        case 'week' :
            frequency = 4;
            break;
        case 'month' :
            frequency = 3;
            break;
        case 'year' :
            frequency = 2;
            break;
        case 'year+' :
            frequency = 1;
            break;
    }

    switch (probability) {
        case 'very high' :
            probability = 5;
            break;
        case 'high' :
            probability = 4;
            break;
        case 'medium' :
            probability = 3;
            break;
        case 'weak' :
            probability = 2;
            break;
        case 'very weak' :
            probability = 0.5;
            break;
    }

    switch (gravity) {
        case 'death' :
            gravity = 5;
            break;
        case 'ipp' :
            gravity = 4;
            break;
        case 'aaa' :
            gravity = 3;
            break;
        case 'asa' :
            gravity = 2;
            break;
        case 'weak impact' :
            gravity = 1;
            break;
    }
    return (frequency + probability) * gravity;
}

function restraintCalcul(){

    let all = $('input[name="restraint[]"]')
    for (let i = 0; i < all.length; i++) {
        let temp = all[i].value.split('|');
        for (let j = 0; j < temp.length - 1; j++) {
            switch (temp[i]) {
                case 'very good' :
                    gravity = 5;
                    break;
                case 'ipp' :
                    gravity = 4;
                    break;
                case 'aaa' :
                    gravity = 3;
                    break;
                case 'asa' :
                    gravity = 2;
                    break;
                case 'weak impact' :
                    gravity = 1;
                    break;
            }
        }
    }

}

function setColor(el,total){
    switch (true) {
        case (total <= 15) :
            el.classList.add('btn-success');
            break
        case (total < 20) :
            el.classList.add('btn-warning');
            break;
        case (total < 30) :
            el.classList.add('btn-warning');
            break;
        case (total >= 30) :
            el.classList.add('btn-danger');
            break;
    }
}


/*==============================
        Create Restraint
==============================*/


function createRestraint(tech,orga,human,title,id){
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
}

function createRestraintProposed(title){
    let content ='<button type="button" class="btn btn-text btn-small btn-delete-restraint"><i class="far fa-times-circle"></i></button>\n' +
        '<textarea class="form-control auto-resize" placeholder="" name="restraint_proposed[]">'+title+'</textarea>'
    let li = document.createElement('li');
    li.innerHTML = content;
    $('.btn-add-restraint',document, 0).closest('li').before(li);
}


/*==============================
      Modal filter function
==============================*/


function filterRisk(){
    let filterSelect = $('#filter-sa')[0].value
    let filterInput = $('#filter-ut')[0].value

    fetch(url, {
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": document.head.querySelector("[name=csrf-token][content]").content
        },
        method: 'post',
        body: JSON.stringify ({
            filterSa: filterSelect,
            filterUt: filterInput
        })
    }).then(response => {
        return response.json()
    }).then(json => {
        let list = $('.list-ut-template', document, 0)
        list.innerHTML = "";
        if (json.length === 0){
            let li = document.createElement('li');
            let content = '<a href="#">Aucune données trouvé</a>'
            li.innerHTML = content;
            list.appendChild(li);
        }else{
            for (let i = 0; i < json.length ; i++) {
                let li = document.createElement('li');
                if (json[i].id === risk){
                    let content = '<a href="#" class="checked">'+json[i].name+'</a>'
                    li.innerHTML = content;
                }else{
                    let content = '<a href="/'+single_document_id+'/work/create/'+workUnit+'/'+json[i].id+'">'+json[i].name+'</a>'
                    li.innerHTML = content;
                }
                list.appendChild(li);
            }
        }
    });
}




