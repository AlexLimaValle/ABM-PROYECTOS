$(document).ready(function(){
    $('#enviar').click(function(e){
        let id = $("#personaID").val();
        let nombre = $("#name").val();
        let apellido = $("#surname").val();
        let fecha = $("#dates").val();
        let email = $("#mail").val();
        let rol = $("#roles").val();
        let imagen = $("#imagenes").val();
        console.log(imagen);
        console.log('por aca');
        console.log(id);
        let observaciones = $("#observacion").val();
        $.ajax({
            url:"http://localhost/proyectos/public/personal/actualizar/",
            method:'POST',
            data:{id,nombre,apellido,fecha,email,rol,imagen,observaciones},
            success:function(data){
                window.location.replace("http://localhost/proyectos/public/personal");
            }
        })
    })
})