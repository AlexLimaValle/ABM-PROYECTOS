$(document).ready(function(){

    $("#buscador").bind("keyup",function(e){
        if(e.code == "Enter"){
            let buscador = $("#buscador").val();
            console.log(buscador);
            $.ajax({
                "type":"GET",
                "url":"http://localhost/proyectos/public/buscador",
                "data":{buscador}
            ,success:function(data){
                console.log(data);
            }})
        }
    })

})