
on('.select-pack', 'click', (el, e) => {
    let pack = el.dataset.pack;

    $('.item-pack[data-pack]').forEach(item => {
        if (item.dataset.pack.split(',').includes(pack)) {
            item.checked = true;
        } else {
            item.checked = false;
        }
    });
});

on('.uncheck-pack', 'click', (el, e) => $('.item-pack:checked').forEach(item => item.checked = false));


on('.btn-add-exposition', 'click', (el, e) => {
    let create = true;
    let list = $('.list-content--exposition', document, 0);

    $('.list-item', list).forEach(item => {
        if ($('input', item, 0).value == "") {
            $('input', item, 0).focus();

            create = false;
        }
    });

    if (create) {
        let newItem = document.createElement('li');
        newItem.className = 'list-item';

        let newButton = document.createElement('button');
        newButton.className = 'btn btn-text btn-small btn-delete';
        newButton.type = "button";
        newButton.innerHTML = '<i class="far fa-times-circle"></i>';

        let newInput = document.createElement('input');
        newInput.className = 'form-control';
        newInput.type = "text";
        newInput.placeholder = "Nom du groupe d'exposition homogène";
        newInput.name = "risk_psycho_exposition_groups[]";

        newItem.appendChild(newButton);
        newItem.appendChild(newInput);

        $('.list-content--exposition', document, 0).appendChild(newItem);

        newInput.focus();
    }
});

on('.list-content--exposition .list-item .btn-delete', 'click', (el, e) => {
    el.closest('.list-item').remove();
});
