on('.card .btn-radio', 'click', (el, e) => {
    let form = el.closest('form');

    $('input[name="checked"]', form, 0).value = el.dataset.value;
});

on('.card.card--risk.card--risk-stretchable>.card-header .title', 'click', (el, e) => {
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
        el.removeAttribute('data-id');
        let tech = $('.radio-bar-tech input:checked',document,0).value || 'null'
        let orga = $('.radio-bar-orga input:checked',document,0).value || 'null'
        let human = $('.radio-bar-human input:checked',document,0).value || 'null'
        let title = $('#nameRisk', document, 0).value || "Mesure"
        editRestraint(tech,orga,human,title,id)
    }else{
        let tech = $('.radio-bar-tech input:checked',document,0).value || 'null'
        let orga = $('.radio-bar-orga input:checked',document,0).value || 'null'
        let human = $('.radio-bar-human input:checked',document,0).value || 'null'
        let title = $('#nameRisk', document, 0).value || "Mesure"
        createRestraint(tech,orga,human,title,id)
    }

});

on('.btn-edit-modal-risk', 'click', (el, e) => {
    $('.modal-add-risk .title',document, 0).innerText = "Modifier la mesure déjà mise en place"
    $('.btn-modal-risk-add', document, 0).setAttribute('data-id',el.dataset.id)
    let tech = $('.radio-bar-tech input')
    let orga = $('.radio-bar-orga input')
    let human = $('.radio-bar-human input')
    let data = el.closest('li').querySelector('input').value.split('|')
    $('#nameRisk', document, 0).value = data[3]
    for (let i = 0; i < tech.length ; i++) {
        tech[i].checked = tech[i].value === data[0];
    }
    for (let i = 0; i <orga.length ; i++) {
        orga[i].checked = orga[i].value === data[1];
    }
    for (let i = 0; i < human.length ; i++) {
        human[i].checked = human[i].value === data[2];
    }
    $('textarea.auto-resize').forEach(el => {
        if (el.scrollHeight > 0){
            el.style.height = "auto";
            el.style.height = el.scrollHeight + "px";
        }
    })
});

on('.btn-open-risk', 'click', (el, e) => {
    $('.modal-add-risk .title',document, 0).innerText = "Mesure de prévention existante"
    let tech = $('.radio-bar-tech input')[0].checked = true
    let orga = $('.radio-bar-orga input')[0].checked = true
    let human = $('.radio-bar-human input')[0].checked = true
    $('#nameRisk', document, 0).value = ''
    let btn_add = $('.btn-modal-risk-add', document, 0)
    if (btn_add.dataset.id) btn_add.removeAttribute('data-id');

});

on('.btn-delete', 'click', (el, e) => {
    el.closest('div.row').remove();
    calculRestraintColorDisplay();
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

on('.btn-add-restraint-exist', 'click', (el, e) => {
    let all = el.closest('ul').querySelectorAll('li')
    if (all[all.length - 2] !== undefined && all[all.length - 2] !== el.closest('li') && all[all.length - 2].querySelector('textarea').value === ''){
        all[all.length - 2].querySelector('textarea').focus();
    }else{
        let content ='<button type="button" class="btn btn-text btn-small btn-delete-restraint"><i class="far fa-times-circle"></i></button>\n' +
            '<textarea class="form-control auto-resize" placeholder="" name="restraint[]"></textarea>'
        let li = document.createElement('li');
        li.innerHTML = content;
        el.closest('li').before(li);
    }

});


function translate(word){
    if (word === 'very good') return 'Très bien'
    else if (word === 'good') return 'Bien'
    else if (word === 'medium') return 'Moyen'
    else if (word === 'null') return 'Inexistante'
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
            let title = all[i].querySelector('.con').innerText || "Mesure"
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
    setColor(total,riskCalcul());
    total.classList.add('btn-small', 'btn-calcul-risk')
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
    let frequencyEl = $('.radio-bar-frequency input:checked',document,0)
    let probabilityEl = $('.radio-bar-probability input:checked',document,0)
    let gravityEl = $('.radio-bar-gravity input:checked',document,0)
    let frequency;
    let probability;
    let gravity;
    if (frequencyEl && probabilityEl && gravityEl){
        frequencyEl = frequencyEl.value
        probabilityEl = probabilityEl.value
        gravityEl = gravityEl.value
    }else{
        return '10'
    }
    switch (frequencyEl) {
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

    switch (probabilityEl) {
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

    switch (gravityEl) {
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

function calculRestraintColorDisplay(){
    let total = restraintCalcul()
    let statusNumber = $('button[data-id="status-number"]', document, 0)
    let status = $('button[data-id="status"]', document, 0)
    setColor(statusNumber,total);
    statusNumber.innerText = total;
    totalEnd(status,total)
    setColor(status,total);
}

function restraintCalcul(){
    let RB = riskCalcul();
    let totalEnd = 0;
    let count = 0;
    let all = $('input[name="restraint[]"]');
    if (all.length <= 0) return RB;
    for (let i = 0; i < all.length ; i++) {
        let allValue = all[i].value.split('|');
        let tech;
        let orga;
        let human;

        switch (allValue[0]){
            case "very good" :
                tech = 4
                break
            case "good" :
                tech = 3
                break
            case "medium" :
                tech = 2
                break
            case "null" :
                tech = 0
                break
        }
        switch (allValue[1]){
            case "very good" :
                orga = 3
                break
            case "good" :
                orga = 2
                break
            case "medium" :
                orga = 1
                break
            case "null" :
                orga = 0
                break
        }
        switch (allValue[2]){
            case "very good" :
                human = 3
                break
            case "good" :
                human = 2
                break
            case "medium" :
                human = 1
                break
            case "null" :
                human = 0
                break
        }
        let total = tech + orga + human;
        let result = 0;
        switch (total){
            case 10 :
                result = 0.2
                break
            case 9 :
                result = 0.25
                break
            case 8 :
                result = 0.3
                break
            case 7 :
                result = 0.35
                break
            case 6 :
                result = 0.4
                break
            case 5 :
                result = 0.5
                break
            case 4 :
                result = 0.6
                break
            case 3 :
                result = 0.7
                break
            case 2 :
                result = 0.8
                break
            case 1 :
                result = 0.9
                break
        }
        totalEnd = totalEnd+result;
        count++;
    }
    return Math.ceil((RB * totalEnd) / count);
}

function setColor(el,total){
    el.className = ""
    el.classList.add('btn')
    switch (true) {
        case (total <= 15) :
            el.classList.add('btn-success');
            break
        case (total < 20) :
        case (total < 30) :
            el.classList.add('btn-warning');
            break;
        case (total >= 30) :
            el.classList.add('btn-danger');
            break;
    }
}

function totalEnd(el,number){
    switch (true){
        case (number <= 15) :
            el.innerText = "Acceptable"
            break
        case (number < 20) :
            el.innerText = "A améliorer"
            break
        case (number < 30) :
            el.innerText = "Agir vite"
            break
        case (number >= 30) :
            el.innerText = "STOP"
            break
    }
}


/*==============================
        Create Restraint
==============================*/


function createRestraint(tech,orga,human,title,id){
    let restraint = $('.restraint', document, 0)
    let content =
        '  <ul>\n' +
        '   <li>\n' +
        '    <p>\n' +
        '     <i class="far fa-times-circle btn-delete"></i>\n' +
        '     <p class="title-restraint"></p> \n' +
        '     <button data-modal=".modal--risk" data-id="'+id+'" class="btn btn-yellow btn-text btn-edit-modal-risk" type="button"><i class="far fa-edit text-color-yellow"></i></button>\n' +
        '     <input type="hidden" value="'+tech+'|'+orga+'|'+human+'|'+escapeHtml(title)+'|'+id+'" name="restraint[]">' +
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
        '  </ul>\n'
    let row = document.createElement('div')
    row.setAttribute('class','row');
    row.innerHTML = content;
    restraint.appendChild(row)
    row.querySelector('.title-restraint').innerText = title;
    calculRestraintColorDisplay();
}

function editRestraint(tech,orga,human,title,id){
    let rest = $('button[data-id="'+id+'"]', document, 0).closest('div.row')
    rest.querySelector('ul').remove();
    let content =
        '  <ul>\n' +
        '   <li>\n' +
        '    <p>\n' +
        '     <i class="far fa-times-circle btn-delete"></i>\n' +
        '     <p class="title-restraint"></p> \n' +
        '     <button data-modal=".modal--risk" data-id="'+id+'" class="btn btn-yellow btn-text btn-edit-modal-risk" type="button"><i class="far fa-edit text-color-yellow"></i></button>\n' +
        '     <input type="hidden" value="'+tech+'|'+orga+'|'+human+'|'+escapeHtml(title)+'|'+id+'" name="restraint[]">' +
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
        '  </ul>\n'
    rest.innerHTML = content;
    rest.querySelector('.title-restraint').innerText = title;
    calculRestraintColorDisplay();
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
                    let content = '<a href="/'+single_document_id+'/danger/'+danger+'/create/'+workUnit+'/'+json[i].id+'">'+json[i].name+'</a>'
                    li.innerHTML = content;
                }
                list.appendChild(li);
            }
        }
    });
}


/*==============================
           Exposition
==============================*/

on('.card--exposition input.exposition_convert', 'input', expositionConvert);
on('.card--exposition input.exposition_total', 'input', expositionTotal);
on('.card--exposition input.exposition_calculation', 'input', expositionCalculation);

function expositionConvert(el, e) {
    let minutes = el.value;
    let hours = $('input.input_exposition_hours', el.closest('tr'), 0);

    hours.value = Math.round(minutes / 60 * 220);

    if (hours.classList.contains("exposition_total")) {
        expositionTotal(hours, e, true);
    } else {
        if (hours.classList.contains("exposition_calculation")) {
            expositionCalculation(hours);
        }
    }
}

function expositionTotal(el, e, convert = false) {
    let total = 0;
    $('input.input_exposition_hours', el.closest('table')).forEach(el => total += +el.value);

    $('tr.result .total', el.closest('table'), 0).innerHTML = total;

    if (el.classList.contains("exposition_calculation") && convert) {
        expositionCalculation(el);
    }
}

function expositionCalculation(el) {
    let total = 0, criticity;

    let table = el.closest('table');
    let calculation = JSON.parse(table.dataset.calculation);
    let buttonCriticity = $('.btn-criticity', table, 0);

    $('.exposition_calculation', table).forEach(el => total += +el.value);

    if (total != 0) {
        for (const key in calculation) {
            if (eval(total + calculation[key])) {
                criticity = key;
            }

            if (total == 0) {
                criticity = null;
            }
        }
    }

    switch (criticity) {
        case "green":
            buttonCriticity.classList.add("btn-success");
            buttonCriticity.classList.remove("btn-warning", "btn-danger");
            buttonCriticity.innerHTML = "Acceptable";

            buttonCriticity.closest('tr').classList.remove('danger', 'nothing');
            break;
        case "orange":
            buttonCriticity.classList.add("btn-warning");
            buttonCriticity.classList.remove("btn-success", "btn-danger");
            buttonCriticity.innerHTML = "A améliorer";

            buttonCriticity.closest('tr').classList.remove('danger', 'nothing');
            break;
        case "red":
            buttonCriticity.classList.add("btn-danger");
            buttonCriticity.classList.remove("btn-success", "btn-warning");
            buttonCriticity.innerHTML = "Exposé";

            buttonCriticity.closest('tr').classList.add('danger')
            buttonCriticity.closest('tr').classList.remove('nothing');
            break;
        default:
            buttonCriticity.classList.remove("btn-danger", "btn-success", "btn-warning");
            buttonCriticity.innerHTML = "";

            buttonCriticity.closest('tr').classList.add('nothing');
            buttonCriticity.closest('tr').classList.remove('danger');
            break;
    }
}