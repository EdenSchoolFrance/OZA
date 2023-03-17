
on('.btn-add-restraint', 'click', (el, e) => {
    let all = el.closest('div').querySelectorAll('li')
    console.log(all)
    if (all[all.length - 2] !== undefined && all[all.length - 2] !== el.closest('li') && all[all.length - 2].querySelector('textarea').value === ''){
        all[all.length - 2].querySelector('textarea').focus();
    }else{
        let restraints = $('li.res-pro')

        let content ='<input type="checkbox" class="btn-check" data-on="false" data-id="none" data-tab="none" checked>\n' +
            '<textarea class="form-control auto-resize" placeholder="" name="restraint_proposed[checked][]"></textarea>\n' +
            '<button type="button" class="btn btn-text btn-small btn-delete-restraint"><i class="far fa-times-circle"></i></button>'
        let li = document.createElement('li');
        li.setAttribute('class','res-pro')
        li.innerHTML = content;
        if (restraints.length === 0) el.closest('div').querySelector('ul').appendChild(li);
        else all[all.length - 1].after(li);
        li.querySelector("textarea").focus();

    }
});

on('.btn-add-restraint-edit', 'click', (el, e) => {
    let all = el.closest('div').querySelectorAll('li')
    console.log(all)
    if (all[all.length - 2] !== undefined && all[all.length - 2] !== el.closest('li') && all[all.length - 2].querySelector('textarea').value === ''){
        all[all.length - 2].querySelector('textarea').focus();
    }else{
        let restraints = $('li.res-pro')

        let content ='<input type="checkbox" class="btn-check-edit" data-on="false" data-id="'+el.dataset.id+'" data-tab="new" checked>\n' +
            '<textarea class="form-control auto-resize" placeholder="" name="restraint_proposed_'+el.dataset.id+'[checked][new][]"></textarea>\n' +
            '<button type="button" class="btn btn-text btn-small btn-delete-restraint"><i class="far fa-times-circle"></i></button>'
        let li = document.createElement('li');
        li.setAttribute('class','res-pro')
        li.innerHTML = content;
        if (restraints.length === 0) el.closest('div').querySelector('ul').appendChild(li);
        else all[all.length - 1].after(li);
        li.querySelector("textarea").focus();

    }
});

on('.btn-add-prevention', 'click', (el, e) => {
    let all = el.closest('div').querySelectorAll('li')
    console.log(all)
    if (all[all.length - 2] !== undefined && all[all.length - 2] !== el.closest('li') && all[all.length - 2].querySelector('textarea').value === ''){
        all[all.length - 2].querySelector('textarea').focus();
    }else{
        let restraints = $('li.res-pro')

        let content ='<input type="checkbox" class="btn-check-prevention" data-on="false" data-id="none" data-tab="none" checked>\n' +
            '<textarea class="form-control auto-resize" placeholder="" name="prevention_proposed[checked][]"></textarea>\n' +
            '<button type="button" class="btn btn-text btn-small btn-delete-restraint"><i class="far fa-times-circle"></i></button>'
        let li = document.createElement('li');
        li.setAttribute('class','res-pro')
        li.innerHTML = content;
        if (restraints.length === 0) el.closest('div').querySelector('ul').appendChild(li);
        else all[all.length - 1].after(li);
        li.querySelector("textarea").focus();

    }
});

on('.btn-add-prevention-edit', 'click', (el, e) => {
    let all = el.closest('div').querySelectorAll('li')
    console.log(all)
    if (all[all.length - 2] !== undefined && all[all.length - 2] !== el.closest('li') && all[all.length - 2].querySelector('textarea').value === ''){
        all[all.length - 2].querySelector('textarea').focus();
    }else{
        let restraints = $('li.res-pro')

        let content ='<input type="checkbox" class="btn-check-prevention-edit" data-on="false" data-id="'+el.dataset.id+'" data-tab="new" checked>\n' +
            '<textarea class="form-control auto-resize" placeholder="" name="prevention_proposed_'+el.dataset.id+'[checked][new][]"></textarea>\n' +
            '<button type="button" class="btn btn-text btn-small btn-delete-restraint"><i class="far fa-times-circle"></i></button>'
        let li = document.createElement('li');
        li.setAttribute('class','res-pro')
        li.innerHTML = content;
        if (restraints.length === 0) el.closest('div').querySelector('ul').appendChild(li);
        else all[all.length - 1].after(li);
        li.querySelector("textarea").focus();

    }
});

on('.btn-delete-restraint', 'click', (el, e) => {

    el.closest('li').remove();

});

on('.btn-check', 'click', (el, e) => {

    if (el.checked){
        el.closest('li').querySelector('textarea').removeAttribute('name')
        el.closest('li').querySelector('textarea').setAttribute('name', 'restraint_proposed[checked][]')
    }else{
        el.closest('li').querySelector('textarea').removeAttribute('name')
        el.closest('li').querySelector('textarea').setAttribute('name', 'restraint_proposed[not-checked][]')
    }
});

on('.btn-check-edit', 'click', (el, e) => {

    if (el.checked){
        el.closest('li').querySelector('textarea').removeAttribute('name')
        el.closest('li').querySelector('textarea').setAttribute('name', 'restraint_proposed_'+el.dataset.id+'[checked]['+el.dataset.tab+'][]')
    }else{
        el.closest('li').querySelector('textarea').removeAttribute('name')
        el.closest('li').querySelector('textarea').setAttribute('name', 'restraint_proposed_'+el.dataset.id+'[not-checked]['+el.dataset.tab+'][]')
    }
});

on('.btn-check-prevention', 'click', (el, e) => {

    if (el.checked){
        el.closest('li').querySelector('textarea').removeAttribute('name')
        el.closest('li').querySelector('textarea').setAttribute('name', 'prevention_proposed[checked][]')
    }else{
        el.closest('li').querySelector('textarea').removeAttribute('name')
        el.closest('li').querySelector('textarea').setAttribute('name', 'prevention_proposed[not-checked][]')
    }
});

on('.btn-check-prevention-edit', 'click', (el, e) => {

    if (el.checked){
        el.closest('li').querySelector('textarea').removeAttribute('name')
        el.closest('li').querySelector('textarea').setAttribute('name', 'prevention_proposed_'+el.dataset.id+'[checked]['+el.dataset.tab+'][]')
    }else{
        el.closest('li').querySelector('textarea').removeAttribute('name')
        el.closest('li').querySelector('textarea').setAttribute('name', 'prevention_proposed_'+el.dataset.id+'[not-checked]['+el.dataset.tab+'][]')
    }
});

on('.btn-modal-add', 'click', (el,e)=>{

    let values = el.closest("div").querySelector('input').value.split(",");

    for (let i = 0; i < values.length ; i++) {
        let content = '<input type="checkbox" value="'+ values[i] +'" data-name="'+ values[i] +'" name="list_items[]" checked>\n' +
            '<span class="checkmark">'+ values[i] +'</span>'
        let label = document.createElement("label");
        label.setAttribute('class','contain')
        label.innerHTML = content;
        let all = $('#modal-list', document, 0).querySelectorAll('label')

        if (all.length === 0){
            $('#modal-list', document, 0).querySelector('.content-list').appendChild(label);
        }else{
            all[all.length - 1].after(label);
        }
    }
    el.closest("div").querySelector('input').value = "";

})

on('.btn-modal-check', 'click', (el, e) => {
    let check = $('#modal-list div[data-id=""] input')
    for (let i = 0; i < check.length; i++) {
        check[i].checked = true
    }
});

on('.btn-modal-uncheck', 'click', (el, e) => {
    let check = $('#modal-list div[data-id=""] input')
    for (let i = 0; i < check.length; i++) {
        check[i].checked = false
    }
});


on('.level', 'change', (el, e) =>{
    BIG();
})

function BIG(){
    let all = $('.level')

    all = all.sort(function compareNumbers(a, b) {
        return a.options[a.selectedIndex].dataset.value - b.options[b.selectedIndex].dataset.value;
    });

    $("#nd", document, 0).value = all[all.length - 1].options[all[all.length - 1].selectedIndex].dataset.value;
    $('#nd_hidden', document, 0).value = all[all.length - 1].options[all[all.length - 1].selectedIndex].dataset.value;

    let nd = all[all.length - 1].options[all[all.length - 1].selectedIndex].dataset.value;
    nd = parseInt(nd);
    let rr = $('#rr', document, 0);
    rr.removeAttribute("class")
    rr.setAttribute('class', 'btn')
    rr.innerText = "";
    if (nd < 0){
        rr.innerText = "Acceptable";
        rr.classList.add('btn-success');
    }else if (nd < 2){
        rr.innerText = "A améliorer";
        rr.classList.add('btn-warning');
    }else if (nd === 6){
        rr.innerText = "A améliorer";
        rr.classList.add('btn-warning');
    }else if (nd >= 2){
        rr.innerText = "Inacceptable";
        rr.classList.add('btn-danger');
    }

}



on('#ventilation', 'change', (el, e) =>{ IR() })
on('#concentration', 'change', (el, e) =>{ IR() })
on('#time', 'change', (el, e) =>{ IR() })
on('#protection', 'change', (el, e) =>{ IR() })



function IR() {
    let vent = $('#ventilation', document, 0).value;
    let con = $('#concentration', document, 0).value;
    let time = $('#time', document, 0).value;
    let pro = $('#protection', document, 0).value;
    let nd = $('#nd_hidden', document, 0).value;

    let cal = nd - vent - con - time - pro;
    let text = "Acceptable";

    console.log(cal)

    if (cal <= 0){
        text = "Acceptable";
    }else if(cal < 2){
        text = "A améliorer"
    }else if (cal >= 2 ){
        text = "Inacceptable"
    }

    $('#ir', document, 0).value = cal

}


on('#date-fds', 'change', (el,e)=> {

    let TWO_YEAR = 2 * 365 * 24 * 60 * 60 * 1000

    let dateNow = Date.now() - TWO_YEAR
    el.removeAttribute("class")
    el.setAttribute("class", "form-control")

    if (dateNow >= Date.parse(el.value)){
        el.classList.add('input_danger');
    }
})


on('a[data-modal=".modal--delete"]', 'click', (el, e) => {
    $('.modal--delete input[name="id_risk"]', document, 0).value = el.dataset.risk
});

function dateCheck(){
    let el = $("#date-fds", document, 0);
    let TWO_YEAR = 2 * 365 * 24 * 60 * 60 * 1000

    let dateNow = Date.now() - TWO_YEAR
    el.removeAttribute("class")
    el.setAttribute("class", "form-control")

    if (dateNow >= Date.parse(el.value)){
        el.classList.add('input_danger');
    }
}
