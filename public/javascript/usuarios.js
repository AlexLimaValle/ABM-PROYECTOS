$(document).ready(function(){
    $("#subir").click(function(e){
        let usuario = $("#usuario").val();
        let password1 = $("#password").val();
        let password2 = $("#repassword").val();
        let personas = $("#persona").val();
        if(usuario.length === 0){
            Swal.fire({
                icon:"error",
                title:"Falta Nombre",
                text:"No se ingreso ningun nombre",
                footer:"<a href='http://localhost/proyectos/public/usuario'>Volver a menu?</a>"
            })
        }else if(password1.length === 0){
            Swal.fire({
                icon:"error",
                title:"Falta ingresar password",
                text:"Debe ingresar una password"
            })
        }else if(password2.length === 0){
            Swal.fire({
                icon:"error",
                title:"Falta confirmar la password",
                text:"Debe ingresar una password para confirmar",
            })
        }else if(!personas){
            Swal.fire({
                icon:"error", 
                title:"Debe seleccionar a una persona",
                text:"Seleccione a una persona",
            })            
        }else if(password1 !== password2){
            Swal.fire({
                icon:"error",
                title:"No coincide la password ingresada",
                text:"Vuelva a intentar"
            })
        }else{
            $.ajax({
                url:"http://localhost/proyectos/public/usuario/crear",
                method:"POST",
                data:{usuario,password1,password2,personas},
                success:function(data){
                    Swal.fire({
                        icon:"success",
                        title:data,
                        showConfirmButton:false,
                        timer:1500,
                    })
                }
            })
        }
    })
})