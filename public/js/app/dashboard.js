
$('body').on('click','.content .btn-main--inv', function (e){
    let form = $(this).closest('form')
    let parent = form.find("input ,select ,textarea")
    parent.prop("disabled", false)
    form.find(".btn-main--inv").addClass('d-none')
    $(this).closest('form').find(".btn-foot").removeClass('d-none')
});

$('body').on('click','.content .btn-main--cancel', function (e){
    let form = $(this).closest('form')
    let parent = form.find("input ,select ,textarea")
    parent.attr("disabled", true)
    form[0].reset()
    form.find(".btn-main--inv").removeClass('d-none');
    $(this).closest('form').find(".btn-foot").addClass('d-none')
});

$('[data-toggle="dropdown"]').dropdown();


$('body').on('click','.create .btn-main--number', function (e){
    if (e.currentTarget.dataset.value === "more"){
        let number = $(this).closest("div").find('input')
        number.val(parseInt(number.val())+1)
    }else if(e.currentTarget.dataset.value === "less") {
        let number = $(this).closest("div").find('input')
        if (number.val() != 0){
            number.val(parseInt(number.val()) - 1)
        }
    }else{
        console.log('crash')
    }
})
