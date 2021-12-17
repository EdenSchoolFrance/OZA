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

on('[data-modal]', 'click', (el, e) => {
    let modal = $(el.dataset.modal, document, 0);

    if (modal) {
        modal.classList.add('show');
    }
});

on('[data-dismiss="modal"]', 'click', (el, e) => {
    let modal = el.closest('modal');

    if (modal) {
        modal.classList.remove('show');
    }
});

// const tooltip = (selector, element = document) =>{
//     element.addEventListener("mouseover", (e)=>{
//         if (e.target.closest(selector)){

//         }
//     })
// }
