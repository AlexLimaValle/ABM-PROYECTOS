$(document).ready(function(){
    const ENTER = "Enter";
    let tbody = $("#table_body");
    let buscar = $("input[id='buscador']");
    buscar.on("keyup",function(e){
        let valor = buscar.val();
            $.ajax({
                url:"http://localhost/proyectos/public/proyectos/consulta",
                method:"GET",
                data:{valor},
                success:function(data){
                    var formatear = jQuery.parseJSON(data);
                    $htmlParseado = formatearHTML(formatear);
                    tbody.html($htmlParseado);
                }
            })
    })

    function formatearHTML(json){
        let html = '';
        const URL = 'http://localhost/proyectos/public/';
        for(let i=0;i<json.length;i++){
            html += '<tr>';
            html += '<td>'+(i+1)+'</td>';
            html += '<td>'+json[i].nombreProyecto+'</td>';
            html += '<td>'+json[i].fechaInicio+'</td>';
            html += '<td>'+json[i].fechaFin+'</td>';
            html += '<td><span class="'+badgeColor(json[i].nombreEstado)+'">'+json[i].nombreEstado+'</span>'+'</td>';
            html += '<td><a class="btn btn-success me-1" href="'+URL+'verProyecto/'+json[i].proyectoId+'" role="button">Ver</a>';
            html += '<a class="btn btn-primary me-1" href="'+URL+'eliminarProyecto/'+json[i].proyectoId+'" role="button">Editar</a>';
            html += '<a class="btn btn-danger" href="'+URL+'eliminarProyecto/'+json[i].proyectoId+'" role="button">Eliminar</a></td>';
            html += '</tr>';
        }
        return html;
    }

    function badgeColor(estado){
        let clase = null;
        switch(estado){
            case "pendiente":
                clase = "badge bg-secondary";
                break;
            case "realizado":
                clase = "badge bg-success";
                break;
            case "cancelado":
                clase = "badge bg-danger";
                break;
            default:
                clase = "badge bg-info";
        }

        return clase;
    }
})