$(document).ready(function(){
    $('#enviar').click(function(e){
        let id = $("#personaID").val();
        let nombre = $("#name").val();
        let apellido = $("#surname").val();
        let fecha = $("#dates").val();
        let email = $("#mail").val();
        let rol = $("#roles").val();
        console.log('por aca');
        console.log(id);
        let observaciones = $("#observacion").val();
        $.get("http://localhost/proyectos/public/actulizar/",{id,nombre,apellido,fecha,email,rol,observaciones},function(data,success){
            window.location.replace("http://localhost/proyectos/public/personal");
        })
    })
})