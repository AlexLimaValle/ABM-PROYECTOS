$(document).ready(function(){
    $('#enviar').click(function(e){
        let nombre = $("#name").val();
        let apellido = $('#surname').val();
        let fecha = $("#dates").val();
        let email = $("#mail").val();
        let rol = $("#roles").val();
        let observaciones = $("#observacion").val();
        let valores = [nombre,apellido,fecha,email,rol];
        let faltantes = '';
        $.each(valores, function (indexInArray, valueOfElement) { 
            if(valueOfElement.length == 0){
                switch(indexInArray){
                    case 0:
                        faltantes += 'Nombre\n';
                    break;
                    case 1:
                        faltantes += 'Apellido\n';
                    break;
                    case 2:
                        faltantes += 'Fecha\n';
                    break;
                    case 3:
                        faltantes += 'Email\n';
                    break;
                    case 4:
                        faltantes += 'Rol\n';
                    break;
                }
            }
        });
        if(faltantes.length > 0){
            swal({
                title: "Faltan datos",
                text: faltantes,
                icon: "warning",
                dangerMode: true,
            })
        }
    })

})

