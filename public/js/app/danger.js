on('.btn-add-reflection', 'click', (el, e) => {
    let all = el.closest('ul').querySelectorAll('li')
    if (all[all.length - 3] !== undefined && all[all.length - 3] !== el.closest('li') && all[all.length - 3].querySelector('textarea').value === ''){
        all[all.length - 3].querySelector('textarea').focus();
    }else {
        let content = '<button type="button" class="btn btn-text btn-small btn-delete"><i class="far fa-times-circle"></i></button>\n' +
            '<textarea class="form-control auto-resize" name="reflection[]" placeholder=""></textarea>'
        let li = document.createElement('li');
        li.innerHTML = content;
        el.closest('li').before(li);
        li.querySelector('textarea').focus();
    }
});

on('.btn-delete', 'click', (el, e) => {
    el.closest('li').remove();
});
