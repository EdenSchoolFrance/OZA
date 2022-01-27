on('a[data-modal=".modal--restraint"]', 'click', (el, e) => {
    $('.title-restraint',document,0).innerText = "Rappel de la mesure : "+el.dataset.name;
    $('input[name="id_restraint"]',document,0).value = el.dataset.id;
});
