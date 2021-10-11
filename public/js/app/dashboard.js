
$('body').on('click','.content .btn-main-inv', function (e){
    let form = $(this).closest('form')
    let parent = form.find("input ,select ,textarea")
    parent.prop("disabled", false)
    form.find(".btn-main-inv").addClass('d-none')
    $(this).closest('form').find(".btn-foot").removeClass('d-none')
});

$('body').on('click','.content .btn-cancel', function (e){
    let form = $(this).closest('form')
    let parent = form.find("input ,select ,textarea")
    parent.attr("disabled", true)
    form[0].reset()
    form.find(".btn-main-inv").removeClass('d-none');
    $(this).closest('form').find(".btn-foot").addClass('d-none')
});
