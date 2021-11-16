on('.sidebar .nav-sidebar .sidebar-nav-link', 'click', (el, e) => {
    let $this = el;
    let checkElement = $this.nextSibling;
    let parent = el.closest('.sidebar-nav-item');

    while(checkElement && checkElement.nodeType != 1) {
        checkElement = checkElement.nextSibling;
    }

    if (checkElement && checkElement.classList.contains('sub-group-menu')) {
        e.preventDefault();

        if (parent.classList.contains('active')) {
            DOMAnimations.slideUp(checkElement, '300');
            parent.classList.remove('active');
        } else if (!parent.classList.contains('active')) {
            let oldEl = $('.sidebar>.nav-sidebar>.sidebar-nav-item.active')[0];

            if (oldEl) {
                DOMAnimations.slideUp($('.sub-group-menu', oldEl)[0], '300');
                oldEl.classList.remove('active');
            }
            DOMAnimations.slideDown(checkElement, '300');
            parent.classList.add('active');
        }
    }
});
