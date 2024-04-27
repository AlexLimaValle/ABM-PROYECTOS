<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">          
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="d-flex flex-row justify-content-between">
<div class="row" style="height:100vh;width:20%">
    <div class="col-12 bg-dark">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-row justify-content-center">
                    <img src="https://png.pngtree.com/element_our/sm/20180704/sm_5b3c90258d55d.png" alt="dragon" class="w-50 h-75">
                </div>
            </div>
            <div class="col-12 d-flex flex-column justify-content-center" style="height:65vh">
                <ul class="list-group text-light">
                    <li class="list-group-items mt-2">
                        <a
                            name=""
                            id=""
                            class="btn btn-primary w-100"
                            href="<?=base_url('/')?>"
                            role="button"
                            ><i class="fa-solid fa-gauge pe-2"></i>Dashboard</a
                        >
                        
                    </li>
                    <li class="list-group-items mt-2">
                        <a
                            name=""
                            id=""
                            class="btn btn-primary w-100"
                            href="<?=base_url("/proyectos")?>"
                            role="button"
                            >Proyectos</a
                        >
                        
                    </li>
                    <li class="list-group-items mt-2">
                        <a
                            name=""
                            id=""
                            class="btn btn-primary w-100"
                            href="<?=base_url('/tarea/')?>"
                            role="button"
                            >Tareas</a
                        >
                        
                    </li>
                    <li class="list-group-items mt-2">
                        <a
                            name=""
                            id=""
                            class="btn btn-primary w-100"
                            href="<?=base_url('/usuario/')?>"
                            role="button"
                            >Usuarios</a
                        >
                        
                    </li>
                    <li class="list-group-items mt-2">
                        <a
                            name=""
                            id=""
                            class="btn btn-primary w-100"
                            href="<?=base_url('/personal')?>"
                            role="button"
                            >Personal</a
                        >
                    </li>
                </ul>
            </div>
            <div class="col-12">
                <h6 class="text-light text-center"><span class="me-2"><i class="fa-solid fa-user"></i></span><?php
                    $session = \Config\Services::session();
                    echo $session->get('usuario')
                ?></h6>
                <a name="" id="" class="btn btn-primary w-100 m-1" href="<?=base_url('cerrar')?>" role="button">Cerrar session</a>
            </div>
        </div>
    </div>
</div>
<div class="row bg-light align-content-between" style="height:100vh;width:80%">
    <div class="col-12 bg-primary" style="height:10%">
            <!-- sidebar -->
    </div>

