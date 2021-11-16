on('.card .btn-radio', 'click', (el, e) => {
    let form = el.closest('form');

    $('input[name="checked"]', form)[0].value = el.dataset.value;
});

on('.card.card--risk.card--risk-stretchable .title', 'click', (el, e) => {
    let card = el.closest('.card');

    if (card.classList.contains('card--risk-opened')) {
        
        DOMAnimations.slideUp($('.card-body', card)[0], '300');
        card.classList.remove('card--risk-opened');
    } else {

        DOMAnimations.slideDown($('.card-body', card)[0], '300');
        card.classList.add('card--risk-opened');
    }
});