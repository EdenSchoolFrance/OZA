
$('body').on('click','.card-dropdown .btn-card-drop', function (e){

    if (e.currentTarget.dataset.drop === "open"){
        $(this).closest('form').find(".card-body").fadeOut()
        $(this).attr('data-drop',"close").addClass("rotate")
    }else if (e.currentTarget.dataset.drop === "close"){
        $(this).closest('form').find(".card-body").fadeIn()
        $(this).attr('data-drop',"open").removeClass("rotate")
    }else{
        console.log("error")
    }
});

$(function () {
    $('[data-toggle="toolHelp"]').tooltip()
})
