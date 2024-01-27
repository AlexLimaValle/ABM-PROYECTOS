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
                <a name="" id="" class="btn btn-primary" href="#" role="button">+ nuevo usuario</a>
            </div>
            <div class="col-11 mt-2 d-flex justify-content-end border-top border-success p-1" style="height:10%;">
                <input type="text" name="" id="" class="form-control w-25">
                <button class="btn btn-success me-1 ms-1"><i class="fa-solid fa-magnifying-glass"></i></button>
                <button class="btn btn-danger"><i class="fa-solid fa-repeat"></i></button>
            </div>
            <div class="col-11 border border-secondary mt-2 p-3">
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
                                <tbody>
                                    
                                    <tr class="">
                                        <td scope="row">R1C1</td>
                                        <td>R1C2</td>
                                        <td>R1C3</td>
                                        <td>R1C3</td>
                                        <td>
                                            <select class="form-select" name="" id="">
                                                <option value="">Eliminar</option>
                                                <option value="">Modificar</option>
                                                <option value="">Ver</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>