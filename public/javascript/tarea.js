$(document).ready(function () {
    var contenidoTabla = $('#tareaContenido');
    var botonBuscar = $('#busquedaTareas');
    var botonBorrado = $("#borrarTodo");
    var buscadorInput = $("#tareas");

    buscadorInput.bind("keyup",apiTarea);

    botonBorrado.click(function (e) {
        $('#tareas').val("");
        apiTarea();
    })
    botonBuscar.click(apiTarea);

    function apiTarea() {
        let tareaNombre = $('#tareas').val();
        console.log(tareaNombre);
        const url = "http://localhost/proyectos/public/tarea/buscar/";
        $.get(url + '?tarea=' + tareaNombre, function (data) {
            var datosParseados = $.parseJSON(data);
            var resultados = parsearHTML(datosParseados);
            console.log(resultados);
            contenidoTabla.html(resultados);
        })
    }

    function parsearHTML(data) {
        var str = "";
        console.log(data);
        $.each(data, function (index, items) {
            str += "<tr>";
            str += "<td>" + (index + 1) + "</td>";
            str += "<td>" + (items.nombreProyecto) + "</td>";
            str += "<td>" + (items.tareaNombre) + "</td>";
            str += "<td>" + (items.fecha_inicio) + "</td>";
            str += "<td>" + (items.fecha_fin) + "</td>";
            if (items.estadoProyecto == "pendiente") {
                str += "<td><p class='badge text-bg-secondary'>" + items.estadoProyecto + "</p></td>";
            } else if (items.estadoProyecto == "realizado") {
                str += "<td><p class='badge text-bg-success'>" + items.estadoProyecto + "</p></td>";
            } else {
                str += "<td><p class='badge text-bg-danger'>" + items.estadoProyecto + "</p></td>";
            }

            if (items.estadoTarea == 'Pendiente') {
                str += "<td><p class='badge text-bg-secondary'>" + items.estadoTarea + "</p></td>";
            } else if (items.estadoTarea == 'En proceso') {
                str += "<td><p class='badge text-bg-success'>" + items.estadoTarea + "</p></td>";
            } else {
                str += "<td><p class='badge text-bg-danger'>" + items.estadoTarea + "</p></td>";
            }

            str += "<td>";
            str += "<div class='btn-group'>";
            str += "<button type='button' class='btn btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>Acciones</button>";
            str += "<ul class='dropdown-menu'>";
            str += "<li><a class='dropdown-item' href='http://localhost/proyectos/public/tarea/borrar/" + items.idTarea + "'>Borrar</a></li>";
            str += "<li><a class='dropdown-item' href='#'>Actualizar</a></li>";
            str += "</ul>";
            str += "</div>";
            str += "</td>";
            str += "</tr>"
        })

        return str;
    }
})


