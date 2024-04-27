$(document).ready(function(){
    var tareaNombre = $('#tareas').val();
    var botonBuscar = $('#busquedaTareas');
    botonBuscar.click(function(){
        const url = "http://localhost/proyectos/public/tarea/buscar/";
        $.get(url+'?tarea='+tareaNombre,function(data){
            console.log(data);
        })
    })
})


/* 
function botonAccion(boton,accion,texto){
    const url = "http://localhost/proyectos/public/tarea/buscar/";
    const eventos = {
        'buscar':function(){
            boton.click(function(){
                $.get(url+texto,function(data){
                    console.log(data);http://localhost/proyectos/public/tarea/
                })
            })
        }
    }
    eventos.buscar;
} */