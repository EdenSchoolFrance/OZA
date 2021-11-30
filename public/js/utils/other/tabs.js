on('.nav-tabs-group .btn-tabs', 'click', (el, e) => {
    console.log(el.dataset.tabs)
    let tabs = $('.tabs-content')
    let nav = $('.btn-tabs')
    for (let i = 0; i < tabs.length ; i++) {
        if (tabs[i].id === el.dataset.tabs){
            tabs[i].classList.remove('none')
        }else{
            tabs[i].classList.add('none')
        }
    }
    for (let i = 0; i < nav.length ; i++) {
        if (nav[i].dataset.tabs === el.dataset.tabs){
            nav[i].classList.add('active')
        }else{
            nav[i].classList.remove('active')
        }
    }
});
