$(document).ready(function () {
    $(".miembro").each(function(e){
        $(this).click(function(){
            $(this).toggleClass("badge text-bg-primary");
        })
    })
});

