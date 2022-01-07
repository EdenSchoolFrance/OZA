const $ = (value, context = document, mutiple = true) => {
    if (mutiple) {
        return [].slice.call(context.querySelectorAll(value));
    } else {
        return context.querySelector(value);
    }
};

const on = (selector, event, handler, element = document) => {
    element.addEventListener(event, (e) => {
        if (e.target.closest(selector)) {
            handler(e.target.closest(selector), e);
        }
    });
};


on('.btn-group-dropdown .btn.toggle-dropdown:not(.disabled)', 'click', (el, e) => {
    let btnGroup = el.closest('.btn-group-dropdown');

    btnGroup.classList.toggle('open');
});

on('.btn-group-dropdown .btn.toggle-dropdown:not(.disabled)', 'focusout', (el, e) => {
    let btnGroup = el.closest('.btn-group-dropdown');

    if (!btnGroup.contains(e.relatedTarget)) {
        btnGroup.classList.remove('open');
    }
});

on('textarea.auto-resize', 'input', (el, e) => {
    el.style.height = "auto";
    el.style.height = el.scrollHeight + "px";
});

on('input[type="file"]', 'change', (el, e) => {
    let file = el.closest('.form-control--file');

    $('span:first-of-type', file, false).innerHTML = el.files[0].name;
});


/*==============================
              Modal
==============================*/
on('[data-modal]', 'click', (el, e) => {
    let modal = $(el.dataset.modal, document, 0);

    if (modal) {
        modal.style.display = "block"

        setTimeout(() => {
            modal.classList.add('show')
        }, 150);
    }
});

on('.modal', 'click', (el, e) => {
    if (!$('.modal-content', el, 0).contains(e.target)) {
        el.classList.remove('show');

        setTimeout(() => {
            el.style.display = "none"
        }, 150);
    }
});

on('[data-modal=".modal--archive"], [data-modal=".modal--unarchive"], [data-modal=".modal--delete"]', 'click', (el, e) => {
    let modal = $(el.dataset.modal, document, 0);

    if (modal && el.dataset.id) {
        $('input[name="id"]', modal, 0).value = el.dataset.id;
    }
});


on('[data-dismiss="modal"]', 'click', (el, e) => {
    let modal = el.closest('.modal');

    if (modal) {
        modal.classList.remove('show');

        setTimeout(() => {
            modal.style.display = "none"
        }, 150);
    }
});

on('[data-dismiss="alert"]', 'click', (el, e) => {
    let alert = el.closest('.alert');

    if (alert) {
        alert.classList.add('hide');

        setTimeout(() => {
            alert.remove();
        }, 150);
    }
});
