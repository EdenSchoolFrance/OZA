on('.btn-group-dropdown .btn.toggle-dropdown', 'click', (el, e) => {
    let btnGroup = el.closest('.btn-group-dropdown');

    btnGroup.classList.toggle('open');
});
