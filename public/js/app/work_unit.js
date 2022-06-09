on('.btn-delete', 'click', (el, e) => {
    if (el.closest('ul.list-content') && el.closest('ul.list-content').querySelectorAll('li.list-item').length == 1) {
        let nothing = document.createElement('li');
        nothing.innerHTML = '<p class="nothing">Néant</p>';

        el.closest('ul.list-content').appendChild(nothing);
    }

    el.closest('li').remove();
});

on('[data-modal=".modal--work_unit"]', 'click', (el, e) => {
    let modal = $(el.dataset.modal, document, 0);

    $('div[data-id="' + el.dataset.list + '"]', modal, 0).style.display = "flex";
    $('.title', modal, 0).innerText = 'Modifier la liste des ' + el.dataset.item + ' de ' + el.dataset.sub;

    $('.btn-modal-valid', modal, 0).setAttribute('data-list',el.dataset.list);
    $('.btn-modal-add', modal, 0).setAttribute('data-list',el.dataset.list);
    $('.btn-modal-check', modal, 0).setAttribute('data-list',el.dataset.list);
    $('.btn-modal-uncheck', modal, 0).setAttribute('data-list',el.dataset.list);
    $('[data-dismiss="modal"]', modal, 0).setAttribute('data-list',el.dataset.list);

    let input = $('input', el.closest('ul.list-main'))
    let check = $('.modal div[data-id="' + el.dataset.list + '"] input')

    for (let i = 0; i < check.length ; i++) {
        check[i].checked = false

        for (let j = 0; j < input.length ; j++) {
            if (input[j].value === check[i].dataset.name){
                check[i].checked = true
            }
        }
    }
});

on('.modal--work_unit .btn-add', 'click', (el, e) => {
    $('.modal')[0].style.display = 'flex';
    $('.modal div[data-id="' + el.dataset.list + '"]', document, 0).style.display = "flex";
    $('.modal .title')[0].innerText = 'Modifier la liste des ' + el.dataset.item + ' de ' + el.dataset.sub
    $('.btn-modal-valid')[0].setAttribute('data-list',el.dataset.list)
    $('.btn-modal-add')[0].setAttribute('data-list',el.dataset.list)
    $('.btn-modal-check')[0].setAttribute('data-list',el.dataset.list)
    $('.btn-modal-uncheck')[0].setAttribute('data-list',el.dataset.list)
    $('.btn-modal-close')[0].setAttribute('data-list',el.dataset.list)
    let input = $('input', el.closest('ul.list-main'))
    let check = $('.modal div[data-id="' + el.dataset.list + '"] input')
    for (let i = 0; i < check.length ; i++) {
        check[i].checked = false
        for (let j = 0; j < input.length ; j++) {
            if (input[j].value === check[i].dataset.name){
                check[i].checked = true
            }
        }
    }
});

on('.modal--work_unit .btn-modal-add', 'click', (el, e) => {
    let name = el.closest('.modal-input').getElementsByTagName('input')[0].value.split(',')
    let check = $('.modal div[data-id="' + el.dataset.list + '"]', document, 0)
    for (let i = 0; i < name.length ; i++) {
        if (name[i] && name[i] != " ") {
            let label = document.createElement('label');
            let input = document.createElement('input');
            let span = document.createElement('span');
            label.setAttribute('class', 'contain');
            input.setAttribute('type', 'checkbox');
            input.setAttribute('value', name[i] + Date.now());
            input.setAttribute('data-name',name[i])
            input.checked = true
            span.setAttribute('class', 'checkmark');
            span.innerText = name[i]
            label.appendChild(input);
            label.appendChild(span);
            check.appendChild(label);
        }
    }
    el.closest('.modal-input').getElementsByTagName('input')[0].value = "";
});

on('.modal--work_unit .btn-modal-check', 'click', (el, e) => {
    let check = $('.modal div[data-id="' + el.dataset.list + '"] input')
    for (let i = 0; i < check.length; i++) {
        check[i].checked = true
    }
});

on('.modal--work_unit .btn-modal-uncheck', 'click', (el, e) => {
    let check = $('.modal div[data-id="' + el.dataset.list + '"] input')
    for (let i = 0; i < check.length; i++) {
        check[i].checked = false
    }
});

on('.modal--work_unit [data-dismiss="modal"]', 'click', (el, e) => {
    let modal = el.closest('.modal');

    $('div[data-id="' + el.dataset.list + '"]', modal, 0).style.display = "none";
});

on('.modal--work_unit .btn-modal-valid', 'click', (el, e) => {
    let ul = $('.list-content[data-list="' + el.dataset.list + '"]', document, 0)
    ul.innerHTML = ""
    let inputAdd = $('.modal div[data-id="' + el.dataset.list + '"] input:checked')
    for (let i = 0; i < inputAdd.length ; i++) {
        let content =
            '            <button type="button" class="btn btn-text btn-small btn-delete" data-value="' + inputAdd[i].dataset.name + '"><i\n' +
            '                class="far fa-times-circle"></i></button>\n' +
            '            <p>' + inputAdd[i].dataset.name + '</p>\n' +
            '            <input type="hidden" class="btn-item" name="' + el.dataset.list + '[]" value="' + inputAdd[i].dataset.name + '" data-id="' + inputAdd[i].value + '">'
        let li = document.createElement('li');
        li.innerHTML = content;
        li.className = 'list-item'
        ul.appendChild(li);
    }
    $('.modal div[data-id="' + el.dataset.list + '"]', document, 0).style.display = "none";
});


on('.btn-add-activity', 'click', (el, e) => {
    let all = el.closest('ul').querySelectorAll('li')
    if (all[all.length - 3] !== undefined && all[all.length - 3] !== el.closest('li') && all[all.length - 3].querySelector('textarea').value === ''){
        all[all.length - 3].querySelector('textarea').focus();
    }else {
        let content = '<button type="button" class="btn btn-text btn-small btn-delete"><i class="far fa-times-circle"></i></button>\n' +
            '<textarea class="form-control auto-resize" name="activities[]" placeholder=""></textarea>'
        let li = document.createElement('li');
        li.innerHTML = content;
        el.closest('li').before(li);
        li.querySelector('textarea').focus();
    }
});


on('.btn-add-item', 'click', (el, e) => {
    let all = el.closest('ul').querySelector('.list-content').querySelectorAll('li')
    if (all[all.length - 1] !== undefined && all[all.length - 1] !== el.closest('li') && all[all.length - 1].querySelector('textarea').value === ''){
        all[all.length - 1].querySelector('textarea').focus();
    }else {
        let content = '<button type="button" class="btn btn-text btn-small btn-delete"><i class="far fa-times-circle"></i></button>\n' +
            '<textarea class="form-control auto-resize" name="new_child['+el.dataset.id+'_'+Date.now()+']" placeholder=""></textarea>'
        let li = document.createElement('li');
        li.innerHTML = content;
        if (all.length === 0){
            el.closest('ul').querySelector('.list-content').appendChild(li)
        }else{
            el.closest('ul').querySelector('.list-content').querySelectorAll('li')[all.length - 1].after(li);
        }
        li.querySelector('textarea').focus();
    }
});


on('.btn-num', 'click', (el, e) => {
    let input = el.closest('div').getElementsByTagName('input')[0];

    if (el.dataset.value === 'less'){
        if (input.value > 0) input.value = parseInt(input.value)-1
    }else if (el.dataset.value === 'more'){
        input.value = parseInt(input.value)+1
    }
});


on('.btn-validate', 'click', (el, e) => {
    $('#inputTypeWorkUnit', document,0).value = "false"
    $('#formWorkUnit', document, 0).submit();
});

on('.btn-send', 'click', (el, e) => {
    $('#inputTypeWorkUnit', document, 0).value = "true";
    $('#formWorkUnit', document, 0).submit();
});

let filter_sa = document.getElementById('filter-sa');
let filter_ut = document.getElementById('filter-ut');

if (filter_sa) {
    filter_sa.addEventListener('change', filter);
}
if (filter_ut) {
    filter_ut.addEventListener('keyup', filter);
}

function filter(){
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
                if (json[i].id === workUnit){
                    let content = '<a href="#" class="checked">'+json[i].name+'</a>'
                    li.innerHTML = content;
                }else{
                    let content = '<a href="/'+single_document_id+'/work/create/'+json[i].id+'">'+json[i].name+'</a>'
                    li.innerHTML = content;
                }
                list.appendChild(li);
            }
        }
    });
}
