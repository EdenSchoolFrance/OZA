on('nav.nav button.nav-link--burger-menu', 'click', (el, e) => {
    let sidebar = $('.sidebar', document, 0);
    
    el.classList.toggle('open');
    sidebar.classList.toggle('open');
});


on('nav.nav button.nav-link--extension', 'click', (el, e) => {
    let nav = $('nav.nav', document, 0);

    nav.classList.toggle('extension-open');
});