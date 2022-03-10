on('a[data-modal=".modal--duplicate"]', 'click', (el, e) => {
    $('.modal--duplicate input[name="id"]', document, 0).value = el.dataset.id
});
