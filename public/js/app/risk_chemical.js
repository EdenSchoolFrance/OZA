on('.btn-add-restraint-v2', 'click', (el, e) => {
    let all = el.closest('ul').querySelectorAll('li')
    if (all[all.length - 2] !== undefined && all[all.length - 2] !== el.closest('li') && all[all.length - 2].querySelector('textarea').value === ''){
        all[all.length - 2].querySelector('textarea').focus();
    }else{
        let restraints = $('li.res-pro')
        if (restraints.length === 0){
            el.closest('td').querySelector('.nothing_restraint_pro').remove();
        }
        let content ='<button type="button" class="btn btn-text btn-small btn-delete-restraint"><i class="far fa-times-circle"></i></button>\n' +
            '<textarea class="form-control auto-resize" placeholder="" name="restraint_proposed_'+el.dataset.id+'[]"></textarea>'
        let li = document.createElement('li');
        li.setAttribute('class','res-pro')
        li.innerHTML = content;
        el.closest('li').before(li);
    }
});

on('.btn-add-restraint', 'click', (el, e) => {
    let all = el.closest('ul').querySelectorAll('li')
    if (all[all.length - 2] !== undefined && all[all.length - 2] !== el.closest('li') && all[all.length - 2].querySelector('textarea').value === ''){
        all[all.length - 2].querySelector('textarea').focus();
    }else{
        let restraints = $('li.res-pro')
        if (restraints.length === 0){
            el.closest('td').querySelector('.nothing_restraint_pro').remove();
        }
        let content ='<input type="checkbox" class="btn-check" data-on="false" data-id="'+el.dataset.id+'" data-tab="none" checked>\n' +
            '<textarea class="form-control auto-resize" placeholder="" name="restraint_proposed_'+el.dataset.id+'[checked][none][]"></textarea>\n' +
            '<button type="button" class="btn btn-text btn-small btn-delete-restraint"><i class="far fa-times-circle"></i></button>'
        let li = document.createElement('li');
        li.setAttribute('class','res-pro')
        li.innerHTML = content;
        el.closest('li').before(li);
    }
});

on('.btn-delete-restraint', 'click', (el, e) => {
    let t = el.closest('tr').querySelector('.restraint-proposed');

    el.closest('li').remove();
    let restraints = $('li.res-pro')
    if (restraints.length === 0){
        let content = `<li>Aucune mesure proposée</li>`;
        let ul = document.createElement('ul')
        ul.setAttribute('class','nothing_restraint_pro');
        ul.innerHTML = content;
        t.before(ul)
    }
});

on('.btn-check', 'click', (el, e) => {

    if (el.checked){
        el.closest('li').querySelector('textarea').removeAttribute('name')
        el.closest('li').querySelector('textarea').setAttribute('name', 'restraint_proposed_'+el.dataset.id+'[checked]['+ el.dataset.tab +'][]')
    }else{
        el.closest('li').querySelector('textarea').removeAttribute('name')
        el.closest('li').querySelector('textarea').setAttribute('name', 'restraint_proposed_'+el.dataset.id+'[not-checked]['+ el.dataset.tab +'][]')
    }
});
