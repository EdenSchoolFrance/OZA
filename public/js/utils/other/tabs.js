on('.nav-tabs-group .btn-tabs', 'click', (el, e) => {
    let tabs = $('.tabs-content');
    let nav = $('.btn-tabs');

    tabs.forEach((tab) => {
        if (tab.id === el.dataset.tabs) {
            tab.classList.remove('none')
        } else {
            tab.classList.add('none')
        }
    });

    nav.forEach((nav) => {
        if (nav.dataset.tabs === el.dataset.tabs){
            nav.classList.add('active')
        } else {
            nav.classList.remove('active')
        }
    });
});
