on('.card .btn-edit-card', 'click', (el, e) => {
    let card = el.closest('form.card');

    card.classList.add('card-editable');

    $('input, textarea, select', card).forEach(element => {
        element.disabled = false;
    });
});

on('.card .btn-cancel-edit', 'click', (el, e) => {
    let card = el.closest('form.card');

    card.classList.remove('card-editable');

    $('input, textarea, select', card).forEach(element => {
        element.disabled = true;
    });

    card.reset();
});

on('.btn-group-number .btn-num', 'click', (el, e) => {
    if (el.dataset.value === "more"){
        let number = el.closest("div").querySelector('input');
        number.value = parseInt(number.value)+1;
    }else if(el.dataset.value === "less") {
        let number = el.closest("div").querySelector('input');
        if (number.value != 0) {
            number.value = parseInt(number.value) - 1;
        }
    }else{
        console.log('crash')
    }
});
