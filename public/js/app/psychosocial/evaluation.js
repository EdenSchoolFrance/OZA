on('input[name="number_quiz"]', 'change', (el) => {
    let rows = $('.card--psychosocial-evaluation-quiz table tbody tr');

    rows.forEach(row => {
        let total = $('input[type="number"]', row).pluck('value').reduce((a, b) => parseInt(a) + parseInt(b), 0);

        if (total == el.value) {
            $('.td_total', row, 0).classList.remove('danger');
            $('.td_total', row, 0).classList.add('success');
        } else {
            $('.td_total', row, 0).classList.remove('success');
            $('.td_total', row, 0).classList.add('danger');
        }
    });
});

on('.card--psychosocial-evaluation-quiz table tbody tr input[type="number"]', 'change', (el, e) => {
    let number_quiz = $('input[name="number_quiz"]', document, 0).value;
    let row = el.closest('tr');
    let order = row.dataset.order;
    let never = parseInt($('.td_never input', row, 0).value);
    let sometimes = parseInt($('.td_sometimes input', row, 0).value);
    let often = parseInt($('.td_often input', row, 0).value);
    let always = parseInt($('.td_always input', row, 0).value);
    let total = never + sometimes + often + always;
    let intensity_level = 0;
    let priority = $('.td_priority button', row, 0);

    if (total == number_quiz) {
        $('.td_total', row, 0).classList.remove('danger');
        $('.td_total', row, 0).classList.add('success');
    } else {
        $('.td_total', row, 0).classList.remove('success');
        $('.td_total', row, 0).classList.add('danger');
    }

    $('.td_total span', row, 0).innerHTML = total;

    if (order <= 13) {
        intensity_level = ((sometimes * 3.3333) + (often * 6.6666) + (always * 10)).toFixed(1);
    } else {
        intensity_level = ((never * 10) + (sometimes * 6.6666) + (often * 3.3333)).toFixed(1);
    }

    $('.td_intensity_level', row, 0).innerHTML = intensity_level;

    if (intensity_level < 2.5) {
        priority.className = "btn btn-small btn-success";
        priority.innerHTML = "Non concerné";
    } else if (intensity_level >= 2.5 && intensity_level < 5) {
        priority.className = "btn btn-small btn-yellow";
        priority.innerHTML = "Faible";
    } else if (intensity_level >= 5 && intensity_level < 7.5) {
        priority.className = "btn btn-small btn-warning";
        priority.innerHTML = "Modéré";
    } else if (intensity_level >= 7.5) {
        priority.className = "btn btn-small btn-danger";
        priority.innerHTML = "Elevé";
    }

    if (order <= 13) {
        $('.td_extreme', row, 0).innerHTML = always;
    } else {
        $('.td_extreme', row, 0).innerHTML = never;
    }

    $('.card--psychosocial-evaluation-quiz table tfoot tr .td_extreme_all', document, 0).innerHTML = $('.card--psychosocial-evaluation-quiz table tbody tr .td_extreme').pluck('innerText').reduce((a, b) => parseInt(a) + parseInt(b), 0);
});

on('.btn-submit', 'click', (el, e) => {
    $('input[name="checked"]', el.closest('form'), 0).value = el.dataset.value;
});