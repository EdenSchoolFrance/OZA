
on('.select-pack', 'click', (el, e) => {
    let pack = ['serenity', 'tranquility', 'compliance'];
    
    pack = pack.slice(pack.indexOf(el.dataset.pack));

    pack.forEach(element => $('.item-pack[data-pack="' + element + '"]').forEach(item => item.checked = true));
});

on('.uncheck-pack', 'click', (el, e) => $('.item-pack:checked').forEach(item => item.checked = false));