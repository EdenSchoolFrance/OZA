on('.btn-delete', 'click', (el, e) => {
    el.closest('li').remove();
});

on('.btn-add', 'click', (el, e) => {
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
            if (input[j].dataset.id === check[i].value){
                check[i].checked = true
            }
        }
    }
});

on('.btn-modal-add', 'click', (el, e) => {
    let name = el.closest('.modal-input').getElementsByTagName('input')[0].value.split(',')
    let check = $('.modal div[data-id="' + el.dataset.list + '"]', document, 0)
    for (let i = 0; i < name.length ; i++) {
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

});

on('.btn-modal-check', 'click', (el, e) => {
    let check = $('.modal div[data-id="' + el.dataset.list + '"] input')
    for (let i = 0; i < check.length; i++) {
        check[i].checked = true
    }
});

on('.btn-modal-uncheck', 'click', (el, e) => {
    let check = $('.modal div[data-id="' + el.dataset.list + '"] input')
    for (let i = 0; i < check.length; i++) {
        check[i].checked = false
    }
});

on('.btn-modal-close', 'click', (el, e) => {
    let modal = document.getElementsByClassName('modal')
    for (let i = 0; i < modal.length ; i++) {
        modal[i].style.display = 'none';
    }
});

on('.btn-modal-valid', 'click', (el, e) => {
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
    $('.modal',document,0).style.display = 'none';
    $('.modal div[data-id="' + el.dataset.list + '"]', document, 0).style.display = "none";
});


on('.btn-add-activity', 'click', (el, e) => {
    let content ='<button type="button" class="btn btn-text btn-small btn-delete"><i class="far fa-times-circle"></i></button>\n' +
        '<textarea class="form-control auto-resize" name="activitie[]" placeholder=""></textarea>'
    let li = document.createElement('li');
    li.innerHTML = content;
    el.closest('li').before(li);
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



on('.btn-open-modal-oza', 'click', (el, e) => {
    $('.modal--oza')[0].style.display = 'flex';
});
