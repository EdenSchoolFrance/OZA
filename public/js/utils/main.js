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


on('.btn-group-dropdown .btn.toggle-dropdown', 'click', (el, e) => {
    let btnGroup = el.closest('.btn-group-dropdown');

    btnGroup.classList.toggle('open');
});

on('.btn-group-dropdown .btn.toggle-dropdown', 'focusout', (el, e) => {
    let btnGroup = el.closest('.btn-group-dropdown');

    btnGroup.classList.remove('open');
});

on('textarea.auto-resize', 'input', (el, e) => {
    el.style.height = "auto";
    el.style.height = (el.scrollHeight) + "px";
});
