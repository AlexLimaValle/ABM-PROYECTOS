<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    #main{
        width:85%;
        height:100vh;
    }
</style>
<body>
    <?= view_cell('App\Controllers\Home::index') ?>
    <main id="main">
        <div class="row justify-content-center align-content-center mt-5" style="height:70%;">
            <div class="col-11 d-flex justify-content-end mt-2 border-top border-4 border-success p-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Nuevo personal</button>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Personal</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="" class="row">
                        <div class="col-5">
                            <label for="names" class="form-label">Nombre:</label>
                            <input type="text" name="nombre_personal" id="names" class="form-control">
                        </div>
                        <div class="col-5">
                            <label for="surname" class="form-label">Apellido:</label>
                            <input type="text" name="apellido_personal" id="surname" class="form-control">
                        </div>
                        <div class="col-5">
                            <label for="gmail" class="form-label">Email:</label>
                            <input type="email"  placeholder="example@gmail.com" name="email_personal" id="gmail" class="form-control">
                        </div>
                        <div class="col-3">
                            <label for="fecha" class="form-label">Fecha Nacimiento:</label>
                            <input type="date" name="fecha_personal" min="0" max="70" id="fecha" class="form-control">
                        </div>
                        <div class="col-3">
                            <label for="rola" class="form-label">Rol:</label>
                            <select name="roles" id="rola" class="form-select">
                                <?php foreach($roles as $rol):?>
                                    <option value="<?=$rol->id_rol?>"><?=$rol->nombre?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="information" class="form-label">Informacion:</label>
                            <textarea name="informacion_personal" id="information" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                          <button type="button" id="agregar" class="btn btn-primary">Agregar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-11 mt-2 d-flex justify-content-end border-top border-success p-1" style="height:10%;">
                <input type="text" name="" id="buscador" class="form-control w-25">
                <button class="btn btn-success me-1 ms-1"><i class="fa-solid fa-magnifying-glass"></i></button>
                <button id='borrarTodo' class="btn btn-danger"><i class="fa-solid fa-repeat"></i></button>
            </div>
            <div class="col-11 border border-dark rounded mt-2 p-3">
                <div class="card">
                    <!-- <div class="card-header"></div> -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Rol</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaPersona">
                                    <?php foreach($personal as $persona):?>
                                        <tr class="">
                                            <td><?=$persona['id']?></td>
                                            <td><?=$persona['nombre']?></td>
                                            <td><?=$persona['correo']?></td>
                                            <td><?=$persona['rol']?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-info dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Acciones</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="<?=base_url().'eliminar/'.$persona['id']?>">Eliminar</a></li>
                                                        <li><a class="dropdown-item" href="<?=base_url()?>Personal/updatePersona?id=<?=$persona['id']?>">Modificar</a></li>
                                                        <li><a class="dropdown-item" href="#">Ver</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function () {
            $('#agregar').click(function(e){
                var nombre = $('#names').val();
                var apellido = $('#surname').val();
                var email = $('#gmail').val();
                var fecha = $('#fecha').val();
                var rol = $('#rola').val();
                var informacion = $('#information').val();
                $.ajax({
                    'type':'POST',
                    'url':'http://localhost/proyectos/public/addPersonal',
                    'data':{'nombre':nombre,
                            'apellido':apellido,
                            'email':email,
                            'fecha':fecha,
                            'rol':rol,
                            'informacion':informacion
                            },
                    success:function(response){
                        console.log(response);
                        var arrayResultado = $.parseJSON(response);
                        $('#tablaPersona').html(arrayResultado);
                    }
                })
            })
            $("#buscador").keypress(function (e) { 
                if(e.key == 'Enter'){
                    var valorBuscar = $(this).val();
                    $.get("http://localhost/proyectos/public/personal/buscar/",{valorBuscar},function(data,status){
                        var arrayResultado = $.parseJSON(data);
                        $('#tablaPersona').html(arrayResultado);
                    })
                }
            });
            $('#borrarTodo').click(function(e){
                $.get("<?=base_url()?>personal/busqueda/",{valorBuscar:''},function(data,status){
                    console.log(data);
                    let resultados = $.parseJSON(data);
                    $('#tablaPersona').html(resultados);
                })
            })
        });
    </script>
</body>
</html>