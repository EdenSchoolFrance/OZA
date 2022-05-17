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
        }, 1);
    }
});

on('.modal:not([data-backdrop="static"])', 'click', (el, e) => {
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


/*==============================
              Tooltip
==============================*/
on('[data-toggle="tooltip"]:not([data-tooltip])', 'mouseover', (el, e) => {
    console.log('pass tooltip')
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
    if (!el.contains(e.toElement)) {
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

        console.log(el.getBoundingClientRect())
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
        "'": '&#039;'
    };

    return text.replace(/[&<>"']/g, function(m) { return map[m]; });
}
