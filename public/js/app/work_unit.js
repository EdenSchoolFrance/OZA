on('.btn-delete', 'click', (el, e) => {
    el.closest('.list-item').remove();
});
on('.btn-add', 'click', (el, e) => {
    let input = el.closest('.list-main').getElementsByTagName('input')
    let check = document.getElementById('modal-list').getElementsByTagName('input')
    console.log(check)
    for (let i = 0; i < check.length ; i++) {
        check[i].removeAttribute('checked')
        for (let j = 0; j < input.length ; j++) {
            console.log(input[j].dataset.id +'===' + check[i].value)
            if (input[j].dataset.id === check[i].value){
                console.log('oui')
                check[i].setAttribute('checked','checked');
            }
        }
    }
});

on('.btn-modal-check', 'click', (el, e) => {
    let check = document.getElementById('modal-list').getElementsByTagName('input')
    for (let i = 0; i < check.length; i++) {
        check[i].setAttribute('checked','')
    }
});
on('.btn-modal-uncheck', 'click', (el, e) => {
    let check = document.getElementById('modal-list').getElementsByTagName('input')
    for (let i = 0; i < check.length; i++) {
        check[i].removeAttribute('checked')
    }
});
