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
    let tech = $('.radio-bar-tech input:checked',document,0).value
    let orga = $('.radio-bar-orga input:checked',document,0)
    let human = $('.radio-bar-human input:checked',document,0)
    console.log(tech)
    let content =
        '                <div class="line">\n' +
        '                    <div class="left">\n' +
        '                    </div>\n' +
        '                    <div class="right">\n' +
        '                        <ul>\n' +
        '                            <li>\n' +
        '                                <p>\n' +
        '                                    <i class="far fa-times-circle"></i>\n' +
        '                                    Matériels conformes, utilisés et entretenus dans les règles de l’art, en respectant les préconisations de la notice du constructeur\n' +
        '                                    <button data-modal=".modal--delete" data-id="{{ $restrain->id }}"><i class="far fa-edit text-color-yellow"></i></button>\n' +
        '                                </p>\n' +
        '                            </li>\n' +
        '\n' +
        '                            <li>\n' +
        '                                Technique : <span class="text-color-green bold">BON</span>\n' +
        '                            </li>\n' +
        '                            <li>\n' +
        '                                Organisationnelle : <span class="text-color-green bold">BON</span>\n' +
        '                            </li>\n' +
        '                            <li>\n' +
        '                                Humain : <span class="text-color-red bold">NULLE</span>\n' +
        '                            </li>\n' +
        '                        </ul>\n' +
        '                    </div>\n' +
        '                </div>\n'
    let row = document.createElement('div')
});
