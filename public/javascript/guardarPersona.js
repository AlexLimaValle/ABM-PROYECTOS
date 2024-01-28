$(document).ready(function(){
    $('#enviar').click(function(e){
        let nombre = $("#name").val();
        let apellido = $('#surname').val();
        let fecha = $("#dates").val();
        let email = $("#mail").val();
        let rol = $("#roles").val();
        let observacion = $("#observacion").val();
        
    })
    $("#dialog").dialog({
        autoOpen:false,
        modal:true,
    })
    $("#dialogo").click(function(){
        $("#dialog").dialog("open")
    })
})

