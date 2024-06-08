$(document).ready(function(){

    $("#buscador").bind("keyup",function(e){
        if(e.code == "Enter"){
            let buscador = $("#buscador").val();
            console.log(buscador);
            $.ajax({
                "type":"GET",
                "url":"http://localhost/proyectos/public/personal/buscador",
                "data":{buscador}
            ,success:function(data){
                var decodear = jQuery.parseJSON(data);
                $('#mi_tabla').html(decodear)
            }})
        }
    })

    $("button[id|='personal']").on("click",function(e){
            let boton = $(this).attr("id");
            const modal = $("#contenido");
            let buscador = boton.substring(boton.indexOf("-")+1,boton.length);
            $.ajax({
                url:"http://localhost/proyectos/public/personal/buscador",
                method:"GET",
                data:{buscador},
                success:function(data){
                    const datos = jQuery.parseJSON(data);
                    console.log(datos);
                    $constenido = formatearHTML(datos);
                    modal.html($constenido);
                }
            })
    })


    function formatearHTML(json){
        let html = '<div class="modal-header">';
        html += '<h3 class="model-title">'+json.nombre+' '+json.apellidos+'</h3>';
        html += '<button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
        html += '</div>';
        html += '<div class="modal-body">';
        html += '<div class="container">';
        html += '<div class="row justify-content-evenly">';
        html += '<div class="col-5">';
        html += '<div class="row justify-content-center">';
        html += '<div class="col-7">';
        html += '<img class="rounded mt-2" style="height:200px;width:200px" src="data:image/*;base64,'+json.imagen+'"/>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-6">';
        html += '<ul class="list-group">';
        html += '<li class="list-group-item"> Nombre y apellido <span class="badge bg-primary">'+(json.nombre)+' '+json.apellidos+'</span></li>';
        html += '<li class="list-group-item"> Email: <span class="badge bg-primary">'+json.email+'</span></li>';
        html += '<li class="list-group-item"> Fecha Nacimiento: <span class="badge bg-primary">'+json.fecha_nacimiento+'</span></li>';
        html += '<li class="list-group-item"> Edad: <span class="badge bg-primary">'+json.edad+'</span></li>';
        html += '<li class="list-group-item">Informacion: <textarea class="form-control" disabled>'+json.informacion+'</textarea></li>';
        html += '</ul>';
        html += '<div class="modal-footer">';
        html += '<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Atras</button>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        return html;
    }

})