
on('.btn-add-restraint', 'click', (el, e) => {
    let all = el.closest('div').querySelectorAll('li')
    console.log(all)
    if (all[all.length - 2] !== undefined && all[all.length - 2] !== el.closest('li') && all[all.length - 2].querySelector('textarea').value === ''){
        all[all.length - 2].querySelector('textarea').focus();
    }else{
        let restraints = $('li.res-pro')
        if (restraints.length === 0){
            el.closest('td').querySelector('.nothing_restraint_pro').remove();
        }
        let content ='<input type="checkbox" class="btn-check" data-on="false" data-id="none" data-tab="none" checked>\n' +
            '<textarea class="form-control auto-resize" placeholder="" name="restraint_proposed[checked][]"></textarea>\n' +
            '<button type="button" class="btn btn-text btn-small btn-delete-restraint"><i class="far fa-times-circle"></i></button>'
        let li = document.createElement('li');
        li.setAttribute('class','res-pro')
        li.innerHTML = content;
        all[all.length - 1].after(li);
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

on('.btn-modal-add', 'click', (el,e)=>{

    let values = el.closest("div").querySelector('input').value.split(",");

    for (let i = 0; i < values.length ; i++) {
        let content = '<input type="checkbox" value="'+ values[i] +'" data-name="'+ values[i] +'" name="list_items[]" >\n' +
            '<span class="checkmark">'+ values[i] +'</span>'
        let label = document.createElement("label");
        label.setAttribute('class','contain')
        label.innerHTML = content;
        let all = $('#modal-list', document, 0).querySelectorAll('label')
        all[all.length - 1].after(label);
    }

})


on('.level', 'change', (el, e) =>{
    BIG();
})

function BIG(){
    let all = $('.level')

    all = all.sort(function compareNumbers(a, b) {
        return a.options[a.selectedIndex].dataset.value - b.options[b.selectedIndex].dataset.value;
    });

    $("#nd", document, 0).value = all[all.length - 1].value;
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

    console.log(`${vent} | ${con} | ${time} | ${pro} | ${nd}`)

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

    $('#ir', document, 0).value = text

}


let translate = {
    "H315" : 2,
    "H317" : 2,
    "H335" : 2,
    "H362" : 2,
    "EUH066" : 2,
    "EUH203" : 2,
    "EUH204" : 2,
    "EUH205" : 2,
    "H302" : 3,
    "H312" : 3,
    "H319" : 3,
    "H332" : 3,
    "H334" : 3,
    "H336" : 3,
    "H373" : 3,
    "H301" : 4,
    "H304" : 4,
    "H311" : 4,
    "H314" : 4,
    "H318" : 4,
    "H331" : 4,
    "H372" : 4,
    "EUH029" : 4,
    "EUH031" : 4,
    "EUH070" : 4,
    "EUH071" : 4,
    "EUH206" : 4,
    "EUH207" : 4,
    "H300" : 5,
    "H310" : 5,
    "H330" : 5,
    "H370" : 5,
    "EUH032" : 5,
    "H341" : 6,
    "H351" : 6,
    "H361" : 6,
    "CMR2" : 6,
    "H340" : 6,
    "H350" : 6,
    "H360" : 6,
    "H363" : 6,
    "CMR1A" : 6,
    "CMR1B" : 6
}
