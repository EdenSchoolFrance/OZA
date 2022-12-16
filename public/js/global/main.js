const $ = (value, context = document, mutiple = true) => {
    if (mutiple) {
        return [].slice.call(context.querySelectorAll(value));
    } else {
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

const scrollTo = (selector, nav = true, behavior = "auto", element = window) => {
    let top;

    if (nav) {
        top = $(selector, document, 0).getBoundingClientRect().top - ($("nav.nav", document, 0).getBoundingClientRect().height + 15);
    } else {
        top = $(selector, document, 0).getBoundingClientRect().top;
    }

    element.scrollTo({
        top: top,
        behavior: behavior
    });
}

Array.prototype.pluck = function(key) {
    return this.map(function(object) { return object[key]; });
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


$('textarea.auto-resize').forEach(el => {
    if (el.scrollHeight > 0){
        el.style.height = "auto";
        el.style.height = el.scrollHeight + "px";
    }
})

/*==============================
              Modal
==============================*/
on('[data-modal]', 'click', showModal);

function showModal(el) {
    $('body', document, 0).classList.add('modal-openned');
    let modal = $(el.dataset.modal, document, 0);

    if (modal) {
        modal.style.display = "block"

        setTimeout(() => {
            modal.classList.add('show')
        }, 1);
    }
}

on('.modal:not([data-backdrop="static"])', 'click', (el, e) => {

    if (!$('.modal-content', el, 0).contains(e.target)) {
        el.classList.remove('show');
        $('body', document, 0).classList.remove('modal-openned');
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
    $('body', document, 0).classList.remove('modal-openned');
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


/*==============================
              Tooltip
==============================*/
on('[data-toggle="tooltip"]:not([data-tooltip])', 'mouseover', (el, e) => {
    let tooltip = document.createElement('div');
    let tooltip_uuid = 'tooltip-' + Math.random().toString().slice(2, 15) + Math.random().toString().slice(2, 15);

    el.dataset.tooltip = "." + tooltip_uuid;
    if (!el.dataset.title) {
        el.dataset.title = el.title;
        el.removeAttribute('title');
    }

    tooltip.className = "tooltip " + tooltip_uuid;
    tooltip.innerHTML = el.dataset.title;

    document.body.appendChild(tooltip);

    showTooltip(el, e);
});

on('[data-tooltip]', 'mouseover', (el, e) => {
    showTooltip(el, e);
});

on('[data-tooltip]', 'mouseout', (el, e) => {
    if (!el.contains(e.relatedTarget)) {
        let tooltip = $(el.dataset.tooltip, document, 0);

        if (tooltip) {
            tooltip.classList.remove('show');

            setTimeout(() => {
                tooltip.style.display = "none";

                if (el.dataset.toggle && el.dataset.toggle === "tooltip") {
                    delete el.dataset.tooltip;
                    tooltip.remove();
                }
            }, 150);
        }
    }
});

function showTooltip(el, e) {
    let tooltip = $(el.dataset.tooltip, document, 0);
    let placement = el.dataset.placement || "bottom";
    let left, top;

    if (tooltip) {
        tooltip.dataset.placement = placement;
        tooltip.style.display = "block";
        let rect = el.getBoundingClientRect();

        if (el.dataset.tooltable === "true"){

            switch (placement) {
                case "top":
                    top = (rect.top - tooltip.offsetHeight - 15) + 'px';
                    left = (rect.left + ((rect.width / 2) - (tooltip.offsetWidth / 2))) + 'px';
                    break;
                case "bottom":
                    top = (rect.top + rect.height + 15) + 'px';
                    left = (rect.left + ((rect.width / 2) - (tooltip.offsetWidth / 2))) + 'px';
                    break;
                case "left":
                    top = (rect.top + (rect.height / 2) - (tooltip.offsetHeight / 2)) + 'px';
                    left = (rect.left - tooltip.offsetWidth - 15) + 'px';
                    break;
                case "right":
                    top = (rect.top + (rect.height / 2) - (tooltip.offsetHeight / 2)) + 'px';
                    left = (rect.left + rect.width + 15) + 'px';
                    break;
            }
        }else{
            switch (placement) {
                case "top":
                    top = (el.offsetTop - tooltip.offsetHeight - 15) + 'px';
                    left = (el.offsetLeft + ((el.offsetWidth / 2) - (tooltip.offsetWidth / 2))) + 'px';
                    break;
                case "bottom":
                    top = (el.offsetTop + el.offsetHeight + 15) + 'px';
                    left = (el.offsetLeft + ((el.offsetWidth / 2) - (tooltip.offsetWidth / 2))) + 'px';
                    break;
                case "left":
                    top = (el.offsetTop + (el.offsetHeight / 2) - (tooltip.offsetHeight / 2)) + 'px';
                    left = (el.offsetLeft - tooltip.offsetWidth - 15) + 'px';
                    break;
                case "right":
                    top = (el.offsetTop + (el.offsetHeight / 2) - (tooltip.offsetHeight / 2)) + 'px';
                    left = (el.offsetLeft + el.offsetWidth + 15) + 'px';
                    break;
            }
        }

        tooltip.style.top = top;
        tooltip.style.left = left;

        setTimeout(() => {
            tooltip.classList.add('show')
        }, 1);
    }
}

function escapeHtml(text) {
    let map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;',
        " ": '\n',
    };

    return text.replace(/[&<>"']/g, function(m) { return map[m]; });
}


/*==============================
        Copy to clipboard
==============================*/

on('[data-clipboard]', 'click', (el, e) => {
    navigator.clipboard.writeText(el.dataset.copy);
});



/*==============================
        Eye for password
==============================*/

on('.eye-password', 'click', (el, e) => {
    let type = el.closest('div').querySelector('input');
    let classlist = el.classList;
    if (type.type === "text"){
        type.type = "password";
        classlist.add('fa-eye-slash');
        classlist.remove('fa-eye');
    }else {
        type.type = "text";
        classlist.remove('fa-eye-slash');
        classlist.add('fa-eye');
    }
});


/*==============================
       Button Group Number
==============================*/

on('.btn-group-number .btn-num', 'click', (el, e) => {
    let input = $('input', el.closest('.btn-group-number'), 0);

    let min = false;
    let max = false;
    let change = false;
    let step = parseFloat(input.step) || 1;

    if (input.min != "") {
        min = parseFloat(input.min);
    }

    if (input.max != "") {
        max = parseFloat(input.max);
    }

    if (el.dataset.value === 'less') {
        if (min === false || input.value > min) {
            input.value = parseFloat(input.value) - step;
            change = true;
        }
    } else if (el.dataset.value === 'more'){
        if (max === false || input.value < max) {
            input.value = parseFloat(input.value) + step;
            change = true;
        }
    }

    if (change) {
        input.dispatchEvent(new Event('change', { bubbles: true }));
    }
});

document.addEventListener('paste', (event) => {

    event.preventDefault();

    let temp = encodeURI(event.clipboardData.getData('text'))
    temp = temp.replace("e%CC%80", '%C3%A8');
    temp = temp.replace("a%CC%80", '%C3%A0');
    temp = temp.replace("e%CC%81", '%C3%A9');
    window.document.execCommand('insertText', false, decodeURI(temp));

});
