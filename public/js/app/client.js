
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